<?php

include "../connect.php";

$babyname = filterRequest("baby_name");
$gender = filterRequest("gender");
$date_of_birth = filterRequest("date_of_birth");
$baby_weight = filterRequest("baby_weight");
$baby_height = filterRequest("baby_height");
$baby_head = filterRequest("baby_head");
$userid = filterRequest("complete_info_user_authorization");

// Check if a photo was uploaded
if (!empty($_FILES['file']['name'])) {
    $imagename = imageUpload("file");
} else {
    $imagename = ''; // Set an empty string if no photo was uploaded
}

// Check if the image upload was successful or if a photo was provided
if ($imagename !== 'fail' || !empty($imagename)) {
    // Check if there's an activated baby for this user
    $stmtCheckActiveBaby = $con->prepare("SELECT * FROM complete_info WHERE complete_info_user_authorization = ? AND active = 1");
    $stmtCheckActiveBaby->execute([$userid]);
    $activeBaby = $stmtCheckActiveBaby->fetch(PDO::FETCH_ASSOC);

    if ($activeBaby) {
        // If there's an activated baby, use its ID to insert data
        $info_id = $activeBaby['info_id'];
    } else {
        // If there's no activated baby, set the first baby as active
        $stmtActivateFirstBaby = $con->prepare("UPDATE complete_info SET active = 1 WHERE complete_info_user_authorization = ? ORDER BY info_id ASC LIMIT 1");
        $stmtActivateFirstBaby->execute([$userid]);

        // Get the ID of the first baby
        $stmtGetFirstBabyId = $con->prepare("SELECT info_id FROM complete_info WHERE complete_info_user_authorization = ? ORDER BY info_id ASC LIMIT 1");
        $stmtGetFirstBabyId->execute([$userid]);
        $firstBabyId = $stmtGetFirstBabyId->fetch(PDO::FETCH_COLUMN);

        $info_id = $firstBabyId;
    }

    // Prepare SQL statement based on whether a photo was uploaded
    if (!empty($imagename)) {
        $stmt = $con->prepare("INSERT INTO `complete_info`(`baby_name`, `gender`, `date_of_birth`,`baby_weight`,`baby_height`,`baby_head`,`complete_info_user_authorization`, `photo`, `active`) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        
        $stmt->execute(array($babyname, $gender, $date_of_birth, $baby_weight, $baby_height, $baby_head, $userid, $imagename, 0));
    } else {
        $stmt = $con->prepare("INSERT INTO `complete_info`(`baby_name`, `gender`, `date_of_birth`,`baby_weight`,`baby_height`,`baby_head`,`complete_info_user_authorization`, `active`) 
        VALUES (?,?,?,?,?,?,?,?)");
        
        $stmt->execute(array($babyname, $gender, $date_of_birth, $baby_weight, $baby_height, $baby_head, $userid, 0));
    }

    $count = $stmt->rowCount();

    if ($count > 0) {
        $lastInsertId = $con->lastInsertId();
        // Check if it's the first baby being added
        if (!$activeBaby) {
            // If it's the first baby, activate it
            $stmtActivateFirstBaby = $con->prepare("UPDATE complete_info SET active = 1 WHERE info_id = ?");
            $stmtActivateFirstBaby->execute([$lastInsertId]);
            $info_id = $lastInsertId;
        }
        $response = array("status" => "success", "info_id" => $info_id);
        echo json_encode($response);
    } else {
        echo json_encode(array("status" => "failed"));
    }
} else {
    echo json_encode(array("status" => "failed to upload photo"));
}

?>

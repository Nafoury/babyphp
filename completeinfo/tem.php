<?php

include "../connect.php";

// Assuming filterRequest is a function that validates and sanitizes input
$babyname = filterRequest("baby_name");
$gender = filterRequest("gender");
$date_of_birth = filterRequest("date_of_birth");
$baby_weight = filterRequest("baby_weight");
$baby_height = filterRequest("baby_height");
$baby_head = filterRequest("baby_head");
$userid = filterRequest("complete_info_user_authorization");

try {
    $con->beginTransaction();

    // Check if there's an activated baby for this user
    $stmtCheckActiveBaby = $con->prepare("SELECT info_id FROM complete_info WHERE complete_info_user_authorization = ? AND active = 1");
    $stmtCheckActiveBaby->execute([$userid]);
    $activeBabyId = $stmtCheckActiveBaby->fetch(PDO::FETCH_COLUMN); // Fetching just the info_id

    if (!$activeBabyId) {
        // If there's no activated baby, set the first baby as active
        $stmtActivateFirstBaby = $con->prepare("UPDATE complete_info SET active = 1 WHERE complete_info_user_authorization = ? AND info_id = (SELECT MIN(info_id) FROM complete_info WHERE complete_info_user_authorization = ?)");
        $stmtActivateFirstBaby->execute([$userid, $userid]);
        
        // Get the ID of the first baby
        $stmtGetFirstBabyId = $con->prepare("SELECT info_id FROM complete_info WHERE complete_info_user_authorization = ? AND active = 1");
        $stmtGetFirstBabyId->execute([$userid]);
        $firstBabyId = $stmtGetFirstBabyId->fetch(PDO::FETCH_COLUMN); // Fetching just the info_id
        $info_id = $firstBabyId;
    } else {
        // Use the ID of the active baby
        $info_id = $activeBabyId;
    }

    // Insert the new baby's information
    $stmtInsertBaby = $con->prepare("INSERT INTO `complete_info`(`baby_name`, `gender`, `date_of_birth`,`baby_weight`,`baby_height`,`baby_head`,`complete_info_user_authorization`, `active`) 
    VALUES (?,?,?,?,?,?,?,?)");
    $stmtInsertBaby->execute([$babyname, $gender, $date_of_birth, $baby_weight, $baby_height, $baby_head, $userid, $activeBabyId ? 0 : 1]); // Fixed condition here

    $con->commit();

    // Respond with success
    echo json_encode(["status" => "success", "info_id" => $info_id]);

} catch (Exception $e) {
    // Rollback the transaction on error
    $con->rollBack();

    // Log the error or provide an error message
    echo json_encode(["status" => "failed", "message" => $e->getMessage()]);
}
?>

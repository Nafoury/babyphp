<?php

include "../connect.php";

$infoid = filterRequest("info_id");

// Check if the baby being deleted is active
$stmtCheckActive = $con->prepare("SELECT * FROM complete_info WHERE info_id = ? AND active = 1");
$stmtCheckActive->execute([$infoid]);
$isActiveBaby = $stmtCheckActive->fetch(PDO::FETCH_ASSOC);

// Delete the baby
$stmtDelete = $con->prepare("DELETE FROM complete_info WHERE info_id = ?");
$stmtDelete->execute([$infoid]);

$count = $stmtDelete->rowCount();

if ($count > 0) {
    // If deletion is successful, check if the deleted baby was active
    if ($isActiveBaby) {
        // If it was active, activate the next baby
        $stmtActivateNext = $con->prepare("UPDATE complete_info SET active = 1 WHERE complete_info_user_authorization = ? ORDER BY info_id ASC LIMIT 1");
        $stmtActivateNext->execute([$isActiveBaby['complete_info_user_authorization']]);
    }
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}

?>

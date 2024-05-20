<?php

include "../connect.php";

$babyId = filterRequest("info_id");
$userId = filterRequest("complete_info_user_authorization"); // Assuming you're passing user ID when performing this operation.

// Deactivate only the currently active baby for this user
$stmtDeactivate = $con->prepare("UPDATE complete_info SET active = 0 WHERE active = 1 AND complete_info_user_authorization = ?");
$stmtDeactivate->execute([$userId]);

// Activate the selected baby for this user
$stmtActivate = $con->prepare("UPDATE complete_info SET active = 1 WHERE info_id = ? AND complete_info_user_authorization = ?");
$stmtActivate->execute([$babyId, $userId]);

$count = $stmtActivate->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "failed"));
}

?>

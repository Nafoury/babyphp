<?php

include "../connect.php";

$userId = filterRequest("id");
$imageName = filterRequest("image");

$stmt = $con->prepare("UPDATE user_authorization SET image = NULL WHERE id = ? AND image = ?");

$stmt->execute(array($userId, $imageName));

$count = $stmt->rowCount();

if ($count > 0) {
    deleteFile("../upload", $imageName);
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}

?>

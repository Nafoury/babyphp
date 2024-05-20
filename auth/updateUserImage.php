<?php

include "../connect.php";

$userId = filterRequest("id");

// Check if the "file" key exists in the $_FILES array
if(isset($_FILES['file'])){

    // Check if the "image" parameter is passed in the request
    if(isset($_POST['image'])) {
        // Delete the previous image
        deleteFile("../uplaod", $_POST['image']);
    }

    // Upload the new image
    $image = imageUpload("file");

    // Update the database with the new image
    $stmt = $con->prepare("UPDATE `user_authorization` SET `image`=? WHERE id=?");
    $stmt->execute(array($image, $userId));

    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "fail"));
    }
} else {
    echo json_encode(array("status" => "fail", "message" => "No file uploaded."));
}
?>

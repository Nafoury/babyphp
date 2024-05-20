<?php

include "../connect.php";


$imageId = filterRequest("image_id");
$date = filterRequest("date");
$image = filterRequest("face_image");

if(isset($_FILES['file'])){
    
    deleteFile("../uplaod" ,$image);
    $image=imageUpload("file");
    

}

$stmt = $con->prepare("UPDATE `face_day` SET `date`=?,`face_image`=?  WHERE image_id=?");

$stmt->execute(array($date,$image, $imageId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

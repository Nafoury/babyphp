<?php

include "../connect.php";

$date= filterRequest("date");
$babyId= filterRequest("baby_id");

$imagename=imageUpload("file");


if($imagename!='fail')
{
    $stmt = $con->prepare("INSERT INTO `face_day` (`face_image`,`date`,`baby_id`) VALUES (?,?,?)");

$stmt->execute(array($imagename,$date,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $imageId = $con->lastInsertId();
    $response = array("status" => "success", "image_id" => $imageId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}

}
else{
    echo json_encode(array("status"=>"failed"));
}




?>
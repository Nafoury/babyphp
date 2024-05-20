<?php

include "../connect.php";

$babyId= filterRequest("image_id");
$imagename=filterRequest("face_image");

$stmt=$con->prepare("DELETE FROM face_day WHERE image_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    deleteFile("../uplaod" ,$imagename);
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

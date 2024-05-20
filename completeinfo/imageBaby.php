<?php

include "../connect.php";

$imagename=imageUpload("file");
$babyId = filterRequest("id");

if($imagename!='fail')
{

$stmt = $con->prepare("UPDATE `complete_info` SET `image` = ? WHERE `info_id` = ?");

$stmt->execute(array($imagename,$babyId));

$count=$stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
}
else{
    
        echo json_encode(array("status"=>"failed"));
    }


?>
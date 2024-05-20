<?php

include "../connect.php";

$imagename=imageUpload("file");
$userId = filterRequest("id");

if($imagename!='fail')
{

$stmt = $con->prepare("UPDATE `user_authorization` SET `image` = ? WHERE `id` = ?");

$stmt->execute(array($imagename,$userId));

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
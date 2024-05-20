<?php

include "../connect.php";

$date= filterRequest("start_date");
$status= filterRequest("status");
$note=   filterRequest("note");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `diaper_changed` (`start_date`, `status`, `note`, `baby_id`) VALUES (?, ?, ?, ?) ");

$stmt->execute(array($date,$status,$note,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $changeId = $con->lastInsertId();
    $response = array("status" => "success", "change_id" => $changeId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}

?>
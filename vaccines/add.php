<?php

include "../connect.php";

$date=filterRequest("date");
$type = filterRequest("type");
$note=filterRequest("note");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `vaccine_records` (`date`, `type`, `note`,`baby_id`) VALUES (?, ?, ?,?)");

$stmt->execute(array($date,$type,$note,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $vaccineId = $con->lastInsertId();
    $response = array("status" => "success", "vaccine_id" => $vaccineId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}
?>
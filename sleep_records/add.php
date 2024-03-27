<?php

include "../connect.php";


$startdate = filterRequest("start_date");
$endate = filterRequest("end_date");
$duration = filterRequest("duration");
$note1=filterRequest("note");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `sleep_records` (`start_date`, `end_date`, `duration`, `note`,`baby_id`) VALUES (?, ?, ?, ?,?)");

$stmt->execute(array($startdate,$endate,$duration,$note1,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $sleepId = $con->lastInsertId();
    $response = array("status" => "success", "sleep_id" => $sleepId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}
?>
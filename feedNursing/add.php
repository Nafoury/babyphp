<?php

include "../connect.php";

$leftD= filterRequest("left_duration");
$date= filterRequest("date");
$side=   filterRequest("nursing_side");
$startN=filterRequest("starting_breast");
$rightD=filterRequest("right_duration");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `feed_nursing` (`left_duration`, `date`, `nursing_side`, `starting_breast`,`right_duration`,`baby_id`) VALUES (?, ?, ?, ?,?,?)");

$stmt->execute(array($leftD,$date,$side,$startN,$rightD,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $nursingId = $con->lastInsertId();
    $response = array("status" => "success", "feed_id" => $nursingId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}


?>
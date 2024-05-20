<?php

include "../connect.php";

$date= filterRequest("date");
$upper= filterRequest("upper_jaw");
$lower=   filterRequest("lower_jaw");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `baby_teeth` (`date`, `upper_jaw`, `lower_jaw`, `baby_id`) VALUES (?, ?, ?, ?)");

$stmt->execute(array($date,$upper,$lower,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $toothId = $con->lastInsertId();
    $response = array("status" => "success", "teeth_id" => $toothId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}

?>
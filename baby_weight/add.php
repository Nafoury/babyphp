<?php

include "../connect.php";

$weight=filterRequest("weight");
$date = filterRequest("date");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `baby_weight` (`weight`, `date`,`baby_id`) VALUES (?, ?, ?)");

$stmt->execute(array($weight,$date,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $weightId = $con->lastInsertId();
    $response = array("status" => "success", "weight_id" => $weightId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}
?>
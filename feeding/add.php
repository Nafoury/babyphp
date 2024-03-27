<?php

include "../connect.php";

$date= filterRequest("date");
$amount= filterRequest("amount");
$note=   filterRequest("note");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `feeding_bottle` (`date`, `amount`, `note`, `baby_id`) VALUES (?, ?, ?, ?)");

$stmt->execute(array($date,$amount,$note,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $bottleId = $con->lastInsertId();
    $response = array("status" => "success", "feed1_id" => $bottleId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}


?>
<?php

include "../connect.php";

$temp=filterRequest("temp");
$date = filterRequest("date");
$note=filterRequest("note");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `temperature_records` (`temp`, `date`, `note`,`baby_id`) VALUES (?, ?, ?,?)");

$stmt->execute(array($temp,$date,$note,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $tempId = $con->lastInsertId();
    $response = array("status" => "success", "temp_id" => $tempId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}
?>
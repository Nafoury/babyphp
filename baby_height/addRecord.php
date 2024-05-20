<?php

include "../connect.php";

$measure=filterRequest("measure");
$date = filterRequest("date");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `height_records` (`measure`, `date`,`baby_id`) VALUES (?, ?, ?)");

$stmt->execute(array($measure,$date,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $measureId = $con->lastInsertId();
    $response = array("status" => "success", "height_id" => $measureId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}
?>
<?php

include "../connect.php";

$measure=filterRequest("measure");
$date=filterRequest("date");
$babyid=filterRequest("baby_id");

$stmt= $con->prepare("INSERT INTO `baby_head` (`measure`,`date`,`baby_id`) VALUES (?,?,?) ");

$stmt->execute(array($measure,$date,$babyid));

$count=$stmt->rowCount();

if($count>0){
    $changeId = $con->lastInsertId();
    $response = array("status" => "success", "change_id" => $changeId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}

?>
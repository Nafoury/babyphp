<?php

include "../connect.php";

$leftD= filterRequest("left_duration");
$date= filterRequest("date");
$side=   filterRequest("nursing_side");
$startN=filterRequest("starting_side");
$rightD=filterRequest("right_duration");
$nursingId= filterRequest("feed_id");

$stmt = $con->prepare("UPDATE `feed_nursing1` SET `left_duration`=?, `date`=?, `nursing_side`=?, `starting_side`=?,`right_duration`=? WHERE feed_id=?");

$stmt->execute(array($leftD,$date,$side,$startN,$rightD,$nursingId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status" => "success"));
}else{
      echo json_encode(array("status"=>"failed"));
}


?>
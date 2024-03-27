<?php

include "../connect.php";

$date= filterRequest("date");
$fruits= filterRequest("fruits");
$veg=   filterRequest("veg");
$protein=filterRequest("protein");
$grains=filterRequest("grains");
$dairy=filterRequest("dairy");
$note=filterRequest("note");
$babyId= filterRequest("baby_id");

$stmt = $con->prepare("INSERT INTO `feed_Solids` (`date`, `fruits`, `veg`, `protein`,`grains`,`dairy`,`note`,`baby_id`) VALUES (?, ?, ?, ?,?,?,?,?)");

$stmt->execute(array($date,$fruits,$veg,$protein,$grains,$dairy,$note,$babyId));

$count=$stmt->rowCount();

if($count>0){
    $solidId = $con->lastInsertId();
    $response = array("status" => "success", "solid_id" => $solidId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}


?>
<?php

include "../connect.php";

$babyname= filterRequest("baby_name");
$gender=   filterRequest("gender");
$date_of_birth= filterRequest("date_of_birth");
$baby_weight= filterRequest("baby_weight");
$baby_height= filterRequest("baby_height");
$userid= filterRequest("id");

$stmt=$con->prepare("INSERT INTO `complete_info`(`baby_name`, `gender`, `date_of_birth`,`baby_weight`,`baby_height`,`complete_info_user_authorization`) 
VALUES (?,?,?,?,?,?)
");

$stmt->execute(array($babyname,$gender,$date_of_birth,$baby_weight,$baby_height,$userid));

$count=$stmt->rowCount();

if($count>0){
    $lastInsertId = $con->lastInsertId();
    $response = array("status" => "success", "info_id" => $lastInsertId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}


?>

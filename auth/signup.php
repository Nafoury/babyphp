<?php

include "../connect.php";

$email= filterRequest("email");
$firstname= filterRequest("first_name");
$password= filterRequest("password");


$stmt=$con->prepare("INSERT INTO `user_authorization`(`first_name`,`email`,`password`) VALUES (?,?,?)");

$stmt->execute(array($firstname,$email,$password));

$count=$stmt->rowCount();

if($count>0){
    $lastInsertId = $con->lastInsertId();
    $response = array("status" => "success", "id" => $lastInsertId);
    echo json_encode($response);
}else{
      echo json_encode(array("status"=>"failed"));
}


?>

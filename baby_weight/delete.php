<?php

include "../connect.php";

$weightId= filterRequest("weight_id");

$stmt=$con->prepare("DELETE FROM baby_weight WHERE weight_id=?");

$stmt->execute(array($weightId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

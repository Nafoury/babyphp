<?php

include "../connect.php";

$babyId= filterRequest("med_id");

$stmt=$con->prepare("DELETE FROM medications_records WHERE med_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

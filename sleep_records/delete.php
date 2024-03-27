<?php

include "../connect.php";

$babyId= filterRequest("sleep_id");

$stmt=$con->prepare("DELETE FROM sleep_records WHERE sleep_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

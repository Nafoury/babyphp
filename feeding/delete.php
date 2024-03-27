<?php

include "../connect.php";

$bottleId= filterRequest("feed1_id");

$stmt=$con->prepare("DELETE FROM feeding_bottle WHERE feed1_id=?");

$stmt->execute(array($bottleId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

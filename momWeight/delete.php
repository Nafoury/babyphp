<?php

include "../connect.php";

$momId= filterRequest("mom_id");

$stmt=$con->prepare("DELETE FROM mom_weight WHERE mom_id=?");

$stmt->execute(array($momId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

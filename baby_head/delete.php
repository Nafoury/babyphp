<?php

include "../connect.php";

$measureId=filterRequest("measure_id");

$stmt=$con->prepare("DELETE FROM baby_head WHERE measure_id=?");

$stmt->execute(array($measureId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>
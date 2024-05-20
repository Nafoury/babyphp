<?php

include "../connect.php";

$measureId=filterRequest("height_id");

$stmt=$con->prepare("DELETE FROM height_records WHERE height_id=?");

$stmt->execute(array($measureId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>
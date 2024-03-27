<?php

include "../connect.php";

$vaccId= filterRequest("vaccine_id");

$stmt=$con->prepare("DELETE FROM vaccine_records WHERE vaccine_id=?");

$stmt->execute(array($vaccId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

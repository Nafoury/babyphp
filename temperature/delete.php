<?php

include "../connect.php";

$babyId= filterRequest("temp_id");

$stmt=$con->prepare("DELETE FROM temperature_records WHERE temp_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

<?php

include "../connect.php";

$babyId= filterRequest("teeth_id");

$stmt=$con->prepare("DELETE FROM baby_teeth WHERE teeth_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

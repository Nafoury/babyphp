<?php

include "../connect.php";

$babyId= filterRequest("solid_id");

$stmt=$con->prepare("DELETE FROM feed_Solids WHERE solid_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

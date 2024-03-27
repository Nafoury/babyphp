<?php

include "../connect.php";

$babyId= filterRequest("change_id");

$stmt=$con->prepare("DELETE FROM diaper_changed WHERE change_id=?");

$stmt->execute(array($babyId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

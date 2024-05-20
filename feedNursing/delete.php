<?php

include "../connect.php";

$nursingId= filterRequest("feed_id");

$stmt=$con->prepare("DELETE FROM feed_nursing1 WHERE feed_id=?");

$stmt->execute(array($nursingId));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

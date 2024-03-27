<?php

include "../connect.php";

$infoid = filterRequest("id");

$stmt=$con->prepare("DELETE FROM complete_info WHERE info_id=?");

$stmt->execute(array($infoid));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

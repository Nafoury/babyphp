<?php

include "../connect.php";

$infoid = filterRequest("id");

$stmt = $con->prepare("SELECT first_name,baby_name,date_of_birth FROM complete_info WHERE complete_info_user_authorization=?");

$stmt->execute(array($infoid));

$data=$stmt ->fetch(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

<?php

include "../connect.php";

$babyId= filterRequest("baby_id");

$stmt = $con->prepare("SELECT * FROM feeding_bottle WHERE baby_id=?");

$stmt->execute(array($babyId));

$data=$stmt ->fetchAll(PDO::FETCH_ASSOC);
$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

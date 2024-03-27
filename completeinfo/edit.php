<?php

include "../connect.php";

$infoid = filterRequest("id");
$babyname= filterRequest("baby_name");
$gender=   filterRequest("gender");
$date_of_birth= filterRequest("date_of_birth");
$baby_weight= filterRequest("baby_weight");
$baby_height= filterRequest("baby_height");

$stmt=$con->prepare("UPDATE `complete_info` SET
 `baby_name`=?,`gender`=?,`date_of_birth`=?,`baby_weight`=?,`baby_height`=? WHERE info_id=?");

$stmt->execute(array($babyname,$gender,$date_of_birth,$baby_weight,$baby_height,$infoid));

$count=$stmt->rowCount();

if($count>0){
    echo json_encode(array("status"=>"success",));
}else{
      echo json_encode(array("status"=>"fail"));
}


?>

<?php

include "../connect.php";



$date = filterRequest("date");
$weight = filterRequest("weight");
$weightId = filterRequest("weight_id");



$stmt = $con->prepare("UPDATE `baby_weight` SET `date`=?, `weight`=? WHERE weight_id=?");

$stmt->execute(array($date, $weight, $weightId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

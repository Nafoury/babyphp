<?php

include "../connect.php";



$date = filterRequest("date");
$weight = filterRequest("weight");
$weightId = filterRequest("mom_id");



$stmt = $con->prepare("UPDATE `mom_weight` SET `date`=?, `weight`=? WHERE mom_id=?");

$stmt->execute(array($date, $weight, $weightId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

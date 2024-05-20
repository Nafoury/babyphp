<?php

include "../connect.php";

$date = filterRequest("date");
$upper= filterRequest("upper_jaw");
$lower=   filterRequest("lower_jaw");
$teethId = filterRequest("teeth_id");

$stmt = $con->prepare("UPDATE `baby_teeth` SET `date`=?, `upper_jaw`=?,`lower_jaw`=? WHERE teeth_id=?");

$stmt->execute(array($date, $upper,$lower, $teethId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

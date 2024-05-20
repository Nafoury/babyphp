<?php

include "../connect.php";

$measure=filterRequest("measure");
$date=filterRequest("date");
$babyid=filterRequest("baby_id");
$measureID=filterRequest("height_id");

$stmt =$con->prepare("UPDATE `height_records` SET `measure`=?,`date`=? WHERE height_id=?");

$stmt->execute(array($measure, $date, $measureID));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

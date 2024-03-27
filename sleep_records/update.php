<?php

include "../connect.php";


$sleepId = filterRequest("sleep_id");
$startdate = filterRequest("start_date");
$enddate = filterRequest("end_date");
$duration = filterRequest("duration");
$note = filterRequest("note");


$stmt = $con->prepare("UPDATE `sleep_records` SET `start_date`=?, `end_date`=?, `duration`=? , `note`=? WHERE sleep_id=?");

$stmt->execute(array($startdate, $enddate, $duration, $note,$sleepId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

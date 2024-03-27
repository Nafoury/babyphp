<?php

include "../connect.php";


$medId = filterRequest("med_id");
$date = filterRequest("date");
$type = filterRequest("type");
$note = filterRequest("note");


$stmt = $con->prepare("UPDATE `medications_records` SET `date`=?, `type`=?, `note`=? WHERE med_id=?");

$stmt->execute(array($date, $type, $note, $medId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

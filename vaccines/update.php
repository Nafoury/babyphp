<?php

include "../connect.php";


$vaccId = filterRequest("vaccine_id");
$date = filterRequest("date");
$type = filterRequest("type");
$note = filterRequest("note");


$stmt = $con->prepare("UPDATE `vaccine_records` SET `date`=?, `type`=?, `note`=? WHERE vaccine_id=?");

$stmt->execute(array($date, $type, $note, $vaccId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

<?php

include "../connect.php";


$diaperId = filterRequest("change_id");
$date = filterRequest("start_date");
$status = filterRequest("status");
$note = filterRequest("note");


$stmt = $con->prepare("UPDATE `diaper_changed` SET `start_date`=?, `status`=?, `note`=? WHERE change_id=?");

$stmt->execute(array($date, $status, $note, $diaperId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

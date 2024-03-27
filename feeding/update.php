<?php

include "../connect.php";


$feedId = filterRequest("feed1_id");
$date = filterRequest("date");
$amount = filterRequest("amount");
$note = filterRequest("note");


$stmt = $con->prepare("UPDATE `feeding_bottle` SET `date`=?, `amount`=?, `note`=? WHERE feed1_id=?");

$stmt->execute(array($date, $amount, $note, $feedId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

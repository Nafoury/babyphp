<?php

include "../connect.php";

$temp=filterRequest("temp");
$date = filterRequest("date");
$note=filterRequest("note");
$tempId= filterRequest("temp_id");

$stmt = $con->prepare("UPDATE `temperature_records` SET `temp`=?, `date`=?, `note`=? WHERE temp_id=?");

$stmt->execute(array($temp, $date, $note,$tempId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

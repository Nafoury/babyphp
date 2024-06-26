<?php

include "../connect.php";

$infoid = filterRequest("complete_info_user_authorization");

$stmt = $con->prepare("SELECT * FROM complete_info WHERE complete_info_user_authorization=?");

$stmt->execute(array($infoid));

$data = array(); // Initialize an array to store data for multiple babies

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Append each row (baby information) to the data array
    $data[] = $row;
}

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}



?>

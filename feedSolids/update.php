<?php

include "../connect.php";


$solidId = filterRequest("solid_id");
$date= filterRequest("date");
$fruits= filterRequest("fruits");
$veg=   filterRequest("veg");
$protein=filterRequest("protein");
$grains=filterRequest("grains");
$dairy=filterRequest("dairy");
$note=filterRequest("note");


$stmt = $con->prepare("UPDATE `feed_Solids` SET `date`=?, `fruits`=?,`veg`=?,`protein`=?,`grains`=?,`dairy`=?,`note`=? WHERE solid_id=?");

$stmt->execute(array($date, $fruits, $veg, $protein,$grains,$dairy,$note,$solidId));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>

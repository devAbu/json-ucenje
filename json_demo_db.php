<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "root", "", "sap");
$result = $conn->query("SELECT * FROM ".$obj->table." LIMIT ".$obj->limit);
$output = array();
$output = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($output);
?>
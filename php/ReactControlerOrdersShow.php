<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";

$sql = mysqli_query($con, "SELECT * FROM items");

$rows = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $rows[] = $row;
}

// ✅ طباعة JSON صالح
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>

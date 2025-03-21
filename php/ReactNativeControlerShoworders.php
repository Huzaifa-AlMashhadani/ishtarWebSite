<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";
$user_id = isset($_GET['user_id']) ? mysqli_real_escape_string($con, $_GET['user_id']) : '';

$sql = mysqli_query($con, "SELECT * FROM orders WHERE order_id = $user_id");

$rows = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $rows[] = $row;
}

// ✅ طباعة JSON صالح
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";
$id = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : '';

$sql = mysqli_query($con, "SELECT * FROM orders WHERE id = $id");

$info = mysqli_fetch_assoc($sql);
// ✅ طباعة JSON صالح
echo json_encode($info);
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";
$user_id = isset($_GET['user_id']) ? mysqli_real_escape_string($con, $_GET['user_id']) : '';

$sql = mysqli_query($con, "SELECT * FROM users WHERE user_id = $user_id");

$info = mysqli_fetch_assoc($sql);
// ✅ طباعة JSON صالح
echo json_encode($info);
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";
$item_id = isset($_GET['item_id']) ? mysqli_real_escape_string($con, $_GET['item_id']) : '';

$sql = mysqli_query($con, "SELECT * FROM items WHERE item_id = $item_id");

$info = mysqli_fetch_assoc($sql);
// ✅ طباعة JSON صالح
echo json_encode($info);
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";
$not_id = isset($_GET['not_id']) ? mysqli_real_escape_string($con, $_GET['not_id']) : '';

$sql = mysqli_query($con, "UPDATE notifications SET not_status = 0 WHERE id = $not_id ");

if($sql){
    echo json_encode("this Notification wes opned ");
}
// $rows = [];
// while ($row = mysqli_fetch_assoc($sql)) {
//     $rows[] = $row;
// }

// // ✅ طباعة JSON صالح
// echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>

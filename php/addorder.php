<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include_once "config.php";
session_start();

$orderNum = mysqli_real_escape_string($con, $_POST['ordernumber']);
$user_id = mysqli_real_escape_string($con, $_POST['user_id']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$number = mysqli_real_escape_string($con, $_POST['number']);
$adrese = mysqli_real_escape_string($con, $_POST['adrese']);
$ClintPrice = mysqli_real_escape_string($con, $_POST['ClintPrice']);
$descrption = mysqli_real_escape_string($con, $_POST['descrption']);

if (!empty($orderNum) && !empty($name) && !empty($number) && !empty($adrese) && !empty($ClintPrice)) {
    $upload_dir = "Orders_images/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $images = [];

    if (isset($_FILES['image1'])) {
        $image1_name = time() . "_" . basename($_FILES["image1"]["name"]);
        $target_file1 = $upload_dir . $image1_name;

        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1)) {
            $images[] = $image1_name;
        } else {
            echo json_encode(["status" => "error", "message" => "حدث خطأ في رفع الصورة الأولى."]);
            exit;
        }
    }

    if (isset($_FILES['image2'])) {
        $image2_name = time() . "_" . basename($_FILES["image2"]["name"]);
        $target_file2 = $upload_dir . $image2_name;

        if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2)) {
            $images[] = $image2_name;
        } else {
            echo json_encode(["status" => "error", "message" => "حدث خطأ في رفع الصورة الثانية."]);
            exit;
        }
    }

    $images_str = implode(",", $images);


    $sql = "INSERT INTO orders (order_id, order_images, order_number, claent_name, cclaent_number, addres, order_price, descrption, statues) 
            VALUES ('$user_id', '$images_str', '$orderNum', '$name', '$number', '$adrese', '$ClintPrice', '$descrption', '200')";
    
    if (mysqli_query($con, $sql)) {
        echo json_encode(["status" => "success", "message" => $_POST]);
    } else {
        echo json_encode(["status" => "error", "message" => "حدث خطأ أثناء إدخال البيانات."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "يرجى ملء جميع الحقول المطلوبة."]);
}





?>

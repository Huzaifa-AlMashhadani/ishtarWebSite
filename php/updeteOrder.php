<?php
include_once "config.php";
$orderName = mysqli_real_escape_string($con, $_POST["orderName"]);
$orderPhoneNumber = mysqli_real_escape_string($con, $_POST["orderPhoneNumber"]);
$orderAddrese = mysqli_real_escape_string($con, $_POST["orderAddrese"]);
$order_description = mysqli_real_escape_string($con, $_POST["order_description"]);
$order_id = mysqli_real_escape_string($con, $_POST["order_id"]);
$user_id = mysqli_real_escape_string($con, $_POST["user_id"]);


// check if the inputs empty or not 
if(!empty($orderName) && !empty($orderPhoneNumber) && !empty($orderAddrese) && !empty($order_description)){
    // check if the number has 11 num 
    if(preg_match('/^[0-9]{11,}$/', $orderPhoneNumber)){
        $orderStatuse = mysqli_query($con, "SELECT * FROM orders WHERE id = $order_id");
        $statues = mysqli_fetch_assoc($orderStatuse);
        if($statues["statues"] == 200 || $statues["statues"] == 100){
        // check if update has Image or Not 
        $orderImageName = mysqli_real_escape_string($con, $_FILES["orderImage"]["name"]);
        $sql = mysqli_query($con, "UPDATE orders SET claent_name = '{$orderName}', cclaent_number = '{$orderPhoneNumber}', addres = '{$orderAddrese}', descrption = '{$order_description}' WHERE id = $order_id ");
        if($sql){
            echo "sucses";
        }
        }else{
            echo "تمت طباعة هذا الطلب ولا يمكن تعديله الرجا التواصل مع المطبعه ";
        }


    }else{
        echo "يرحى التحقق من رقم الهاتف ";
    }

}else{
    echo "يرجى كتابة البيانات ";
}
<?php
header('Content-Type: application/json');

include_once "config.php";
$name = mysqli_real_escape_string($con, $_POST['name']);
$number = mysqli_real_escape_string($con, $_POST['number']);
$adrese = mysqli_real_escape_string($con, $_POST['adrese']);
$ClintPrice = mysqli_real_escape_string($con, $_POST['ClintPrice']);
$descrption = mysqli_real_escape_string($con, $_POST['descrption']);
$chakDescrption = mysqli_real_escape_string($con, $_POST['chakDescrption']);

if( !empty($name) && !empty($number) && !empty($adrese)){

   $images = ''; // Default value for images
   // Process image3 if it exists

   $imagePrint = $_FILES['image2']['name'];
   if(!empty($imagePrint)) {
       // Process image 3
       $imagePrint_tmp = $_FILES['image2']['tmp_name'];
       $PrintImage_explor = explode('.', $imagePrint);
       $PrintImage_ext = end($PrintImage_explor);

       $extainseein = ["jpg", "png", "jpeg","JPG", "PNG", "JPEG"];

       if(in_array($PrintImage_ext, $extainseein)) {
        $time = time();
        $new_printImage_name = $time.$imagePrint;
        move_uploaded_file($imagePrint_tmp, "Orders_images/".$new_printImage_name);

        if(preg_match('/^[0-9]{11,}$/', $number)){
            echo json_encode([
                "success" => true,
                "name" => $name,
                "number" => $number,
                "addres" => $adrese,
                "printImageName" => "php/Orders_images/".$new_printImage_name,
                "price" => $ClintPrice
            ]);

        }else{
            echo json_encode("يرحى التحقق من رقم الهاتف ");
        }
       } else {
           echo json_encode("صيغة الصورة غير مدعومه ");
           exit;
       }

   }else{
    echo json_encode("يرجى تحميل صورة  الطباعه  ");
   }



}else{
    echo json_encode("لم يتم كتابة العنوان ورقم الهاتف !");
}
?>

<?php


include_once "config.php";
if(isset($_POST['Phnumber'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $Phnumber = mysqli_real_escape_string($con, $_POST['Phnumber']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, sha1($_POST['password']));
    session_start();
    
if (!empty($name) && !empty($Phnumber)  && !empty($password)) {
   
        $sql = mysqli_query($con, "SELECT * FROM users WHERE Phnumber = '{$Phnumber}'");
        if(mysqli_num_rows($sql) > 0){
            echo "  رقم الهاتف او البريد اللكتروني موجود بل فعل  ";
        }else{
           if(preg_match('/^[0-9]{11}+$/', $Phnumber)){
            
            $sql2 =  mysqli_query($con, "INSERT INTO users (name, Phnumber , email, password)
            VALUES('{$name}','{$Phnumber}','{$email}','{$password}')");
            if($sql2){
                $sql3 = mysqli_query($con, "SELECT * FROM users WHERE Phnumber = '{$Phnumber}'");
                if(mysqli_num_rows($sql3) > 0){
                    $row = mysqli_fetch_assoc($sql3);

                   
                    $users_exp = 'ishtar';
                    $posation = strpos($name, $users_exp);
                   if($posation !== false){
                    $_SESSION['user_id'] = $row['user_id'];
           
                   }else{
                    $_SESSION['clint_id'] = $row['user_id'];
                   }
                   echo "sucses";
                }
            }else{
                echo "حدث خطا غير متوقع ";
            }
           }else{
            echo "يرجى كتابه رقم الهاتف بشكل صحيح";
           }
        }
    
} else {
    echo  "يرجى كتابة البيانات قبل الارسال";
}

}else{


// React native code 

// ✅ السماح بالطلبات من جميع المصادر (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

// ✅ التعامل مع طلبات OPTIONS (لـ CORS)
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

// ✅ استقبال البيانات بصيغة JSON من React Native
$data = json_decode(file_get_contents("php://input"), true);

if($data){
    
// ✅ استخلاص البيانات من الطلب
$name = mysqli_real_escape_string($con, $data['name']);
$email = mysqli_real_escape_string($con, $data['email']);
$Phnumber = mysqli_real_escape_string($con, $data['number']);
$password = sha1($data['password']); // 🔹 تشفير كلمة المرور

// ✅ التحقق من ملء جميع الحقول
if (empty($name) || empty($Phnumber) || empty($data['password'])) {
    echo json_encode(["message" => "يرجى إدخال جميع البيانات المطلوبة"]);
    exit();
}

// ✅ التحقق من صحة البريد الإلكتروني


// ✅ التحقق من رقم الهاتف (يجب أن يكون 11 رقمًا فقط)
if (!preg_match('/^[0-9]{11}$/', $Phnumber)) {
    echo json_encode(["message" => "يرجى إدخال رقم هاتف صحيح (11 رقمًا)"]);
    exit();
}

// ✅ التحقق من وجود المستخدم مسبقًا
$sql = mysqli_query($con, "SELECT * FROM users WHERE Phnumber = '{$Phnumber}'");
if (mysqli_num_rows($sql) > 0) {
    echo json_encode(["message" => "رقم الهاتف مسجل بالفعل"]);
    exit();
}

// ✅ إدخال المستخدم الجديد
$sql2 = mysqli_query($con, "INSERT INTO users (name, Phnumber, email, password) VALUES('{$name}', '{$Phnumber}', '{$email}', '{$password}')");

if ($sql2) {
    // ✅ جلب بيانات المستخدم بعد الإدراج
    $sql3 = mysqli_query($con, "SELECT * FROM users WHERE Phnumber = '{$Phnumber}'");
    if (mysqli_num_rows($sql3) > 0) {
        $row = mysqli_fetch_assoc($sql3);

        // ✅ تعيين جلسة المستخدم بناءً على الاسم

        // ✅ إرسال استجابة ناجحة مع بيانات المستخدم
        echo json_encode([
            "success" => true,
            "message" => "تم التسجيل بنجاح",
            "user_id" => $row['user_id'],
            "name" => $row['name']
        ]);
    }
} else {
    echo json_encode(["message" => "حدث خطأ غير متوقع أثناء التسجيل"]);
}




}
}


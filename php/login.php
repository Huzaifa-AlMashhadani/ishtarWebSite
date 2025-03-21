<?php


session_start();

include_once "config.php";

if(isset($_POST['Phnumber'])){
  $Phnumber = mysqli_real_escape_string($con, $_POST['Phnumber']);
  $password = mysqli_real_escape_string($con, sha1($_POST['password']) );

  
if(!empty($Phnumber) && !empty($password)){
  $sql = mysqli_query($con, "SELECT * FROM users WHERE Phnumber = '{$Phnumber}' AND password = '{$password}'");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
    if($row['user_id'] === "1"){
      $_SESSION['root_id_4448'] = $row['user_id'];
      $_SESSION['user_id'] = $row['user_id'];
      echo "sucses";

    }else{
      $users_exp = 'ishtar';
       $name = $row['name'];
       $posation = strpos($name, $users_exp);
      if($posation !== false){
       $_SESSION['user_id'] = $row['user_id'];

      }else{
       $_SESSION['clint_id'] = $row['user_id'];

      }
      echo "sucses";
    }
   
  }else{
    echo "رقم الهاتف او كلمة المرور غير صحصة ";
  }
}else{
  echo "يرجى ادخال رقم الهاتف وكلمة المرور ";
}

  
}else{

  
// React native 

header("Access-Control-Allow-Origin: *"); // Allow all origins
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Allow specific methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allow Content-Type header
header("Content-Type: application/json");

// Handle OPTIONS request (Preflight request)
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

// Read incoming JSON
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $Phnumber = json_encode($data['PhnumberR']);
    $password = json_encode(sha1($data['passwordR']));

      $sql = mysqli_query($con, "SELECT * FROM users WHERE Phnumber = $Phnumber AND password = $password");
      if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);

        if($row['user_id'] === "1"){
          echo json_encode([
            "success" => true,
            "message" => "تم التسجيل بنجاح",
            "user_id" => $row['user_id'],
            "name" => $row['name'],
            "image" => $row['profile_img']
        ]);
        }else{
          $users_exp = 'ishtar';
           $name = $row['name'];
           $posation = stripos($name, $users_exp);
          if($posation !== false){
           echo json_encode([
            "success" => true,
            "message" => "تم التسجيل بنجاح",
            "user_id" => $row['user_id'],
            "name" => $row['name']
        ]);
  
          }else{
            echo json_encode([
              "success" => true,
              "message" => "تم التسجيل بنجاح",
              "user_id" => $row['user_id'],
              "name" => $row['name']
          ]);
          }
          // echo  json_encode("you is scses");
        }
       
      }else{
        echo  ("رقم الهاتف او كلمة غير صحيحه ");
      }

    }



}









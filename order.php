<?php
session_start();

if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    }elseif(isset($_SESSION["clint_id"])){
        $user_id = $_SESSION["clint_id"];
    }else{
        $user_id = null;
    }
if(isset($_SESSION["root_id_4448"]) === "1"){
    if(isset($_SESSION["user_id"]) === "1"){ 

    // Root Orders php Code 
        include_once "php/config.php";



    }else{
      header("location: Signup-Login.php");
    }
}else{
  if(isset($_SESSION["user_id"]) || isset($_SESSION["clint_id"])){
        // Users And Clanits php Code 
        include_once "php/config.php";
        $id = $_GET['id'];
        $rows = mysqli_query($con, "SELECT * FROM orders WHERE id = $id AND order_id =  $user_id");
        if($rows){
               // الاستعلام تم بنجاح
                if (mysqli_num_rows($rows) > 0) {
                    $row = mysqli_fetch_assoc($rows);
     
                    $images = $row['order_images'];
               
                    $image = explode(",",$images);
               
                    $img_1 = "";
                    $img_2 = "";
                    $img_3 = "";
               
                    if(!empty($image[1])){
                     $img_1 = $image[1];
                    }
                    if(!empty($image[2])){
                     $img_2 = $image[2];
                    }
                    if(!empty($image[3])){
                     $img_3 = $image[3];
                    }
                } else {
                    header("location: index.php");
                }
        
        }else{
            header("location: index.php");
        }

  }else{
    header("location: Signup-Login.php");
  }

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Fullscreen Overlay Navigation | CodingNepal</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/normailze.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   </head>
   <body>
   <div class="LodeR"><span class="loader"></span></div>
      <!-- Nar Bar html code start  -->
      <nav class="navbar">
         <h1 class="logo">ISHTAR</h1>
         <!-- saerch section  -->
         <div class="saerch">
            <form action="#">
               <input type="search" placeholder="what are you lookin for ?">
            </form>
            <div class="filter">
               <h4>shots <i class="fa-solid fa-chevron-down"></i></h4>
               <ul>
                  <li><a href="">this is link 1</a></li>
                  <li><a href="">and this is 2</a></li>
                  <li><a href="">ther is 3</a></li>
               </ul>
            </div>
            <button class="saerchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
         </div>
        <!-- saerch section  -->
         <div class="mobile-bar-icon mobile-bar-icon-btn">
            <i class="fa-solid fa-bars"></i>
         </div>
         <!-- links section  -->
          <ul class="mnu-links">
            <li class="mnu-in-mnu">Explor <i class="fa-solid fa-chevron-down"></i></li>
            <ul>
               <li><a href="">link 1</a></li>
               <li><a href="">link 2</a></li>
               <li><a href="">link 3</a></li>
            </ul>
            <li><a href="">Find Jobs</a></li>
            <li><a href="">Blog</a></li>
          </ul>
         <!-- links section  -->
          <!-- sign up and log in section -->
           <div class="log-in-sign-up">
            <a href="#" class="sign-up">Sign Up</a>
            <a href="#" class="sign-up log-in"> Log in</a>
           </div>
          <!-- sign up and log in section -->
       </nav>
          <!-- start mobile bar  -->
         <div class="mobile-bar">
            <div class="mobile-bar-icon">
               <i class="fa-solid fa-xmark"></i>
            </div>
             <!-- links section  -->
          <ul class="mnu-links">
            <ul>
               <li><a href="">Exploer</a></li>
               <li><a href="">Our Servises</a></li>
               <li><a href="">Download App</a></li>
            </ul>
            <li><a href="">Find Jobs</a></li>
            <li><a href="">Blog</a></li>
          </ul>
         <!-- links section  -->
          <!-- sign up and log in section -->
           <div class="log-in-sign-up">
            <a href="#" class="sign-up">Sign Up</a>
            <a href="#" class="sign-up log-in"> Log in</a>
           </div>
          <!-- sign up and log in section -->
         </div>
         <!-- end mobile bar  -->
      <!-- Nar Bar html code end  -->

      <!-- Order Data vist Start  -->
       <div class="order" id="order">
         <div class="container">
            <div class="order-detiles">
               <div class="order-detelis">
                  <div class="input">
                      <h4>الأسم</h4>
                      <p><?php echo $row["claent_name"] ?> </p>
                  </div>
                  <div class="input">
                      <h4>رقم الهاتف </h4>
                      <p><?php echo $row["cclaent_number"] ?></p>
                  </div>
                  <div class="input">
                      <h4>العنوان </h4>
                      <p><?php echo $row["addres"] ?></p>
                  </div>
                  <h3 class="price-order"><?php echo $row["order_price"] / 1000 ?>,000 <span>IQD</span></h3>
                  <div class="images">
                      <img src="php/Orders_images/<?php echo $image[1] ?>" alt="" width="50">
                      <i><i class="fa-solid fa-angle-left"></i><i class="fa-solid fa-angle-left"></i><i class="fa-solid fa-angle-left"></i></i>
                      <img src="php/Orders_images/<?php echo $image[2] ?>" alt="" width="50">
                  </div>
        
              </div>
            </div>
            <form class="order-form" action="#">
               <div class="order-detelis">
                  <div class="input">
                      <h4 class="wornig_maseg" style="padding: 10px;"></h4>
                      <h4>الأسم</h4>
                     <input type="text" name="orderName" value="<?php echo $row["claent_name"] ?>"> 
                  </div>
                  <div class="input">
                      <h4>رقم الهاتف </h4>
                      <input type="text" name="orderPhoneNumber" id="" value="<?php echo $row["cclaent_number"] ?>">
                  </div>
                  <div class="input">
                     <h4> العنوان  </h4>
                      <input type="text" name="orderAddrese" id="" value="<?php echo $row["addres"] ?>">
                      <input type="text" name="user_id" id="" value="<?php echo $user_id ?>"  hidden>
                      <input type="text" name="order_id" id="" value="<?php echo $_GET["id"] ?>" hidden>
                  </div>
                  <div class="input">
                     <h4> الوصف   </h4>
                      <input type="text" name="order_description" style="height: 100px;" id="" value="<?php echo $row["descrption"] ?>">
                  </div>


                     <button type="submit">تحديث المعلومات  </button>
              </div>
            </form>
         </div>
       </div>
      <!-- Order Data vist End  -->
     <script src="js/script.js"></script>
     <script src="js/updeteOrder.js"></script>
   </body>
</html>
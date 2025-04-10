<?php 
include_once "php/config.php";
session_start();
$rows = mysqli_query($con, "SELECT * FROM items");
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $RowOrders = mysqli_query($con, "SELECT * FROM orders WHERE  order_id = $user_id");
   $sql = mysqli_query($con, "SELECT * FROM users WHERE  user_id = $user_id");

}
if(isset($_SESSION['clint_id'])){
   $user_id = $_SESSION['clint_id'];
   $RowOrders = mysqli_query($con, "SELECT * FROM orders WHERE  order_id = $user_id");
   $sql = mysqli_query($con, "SELECT * FROM users WHERE  user_id = $user_id");

}
if(isset($_SESSION['root_id_4448'])){
   $RowOrders = mysqli_query($con, "SELECT * FROM orders ORDER BY id DESC");

}

// $rows = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Ishatr | Home </title>
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
               <input type="search" placeholder="what are you lookin for ?" id="searchInput">
            </form>
            <div class="filter">
               <h4>shots <i class="fa-solid fa-chevron-down"></i></h4>
               <ul>
                  <li><a href="">this is link 1</a></li>
                  <li><a href="">and this is 2</a></li>
                  <li><a href="">ther is 3</a></li>
               </ul>
            </div>
            <button class="saerchBtn"><i class="fa-solid fa-magnifying-glass" ></i></button>
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
            <li><a href="#" class="ShowOrdersListbtn">Find Jobs <span>7</span></a></li>
            <div class="orders">
            <?php 
            if(isset($_SESSION['root_id_4448']) || isset($_SESSION['clint_id']) || isset($_SESSION['user_id'])){
               foreach($RowOrders as $order){
                  $images = $order['order_images'];
                  $statuse = $order['statues'];
                  $statusebg = "#333";
                  if($statuse === "200"){
                   $statusebg = "orange";
                     $statuse = "قيد المراجعه";
                  }elseif($statuse === "400"){
                   $statusebg = "#004505cc";
                   $statuse = "مثبت";
                  }elseif($statuse === "100"){
                   $statusebg = "#999";
                   $statuse = "قيد المعالجه";
                  }elseif($statuse === "600"){
                   $statusebg = "#000";
                   $statuse = "منجز";
                  }
                  $image = explode(",",$images);
                   echo '
                    <a href="order.php?id='.$order['id'].'">
                      <div class="order">
                         <img src="php/Orders_images/'.$image[1].'" width="50" alt="">
                         <span
                         style="background-color: '.$statusebg.'"
                         >'.$statuse.' </span>
                         <div class="order-data">
                            <h4>طباعه على الكفر</h4>
                            <h4>07811930948</h4>
                         </div>
                         <h2>17,000</h2>
                      </div>
                    </a>';
                }
            }else{
               echo '<h2 
               style="text-align: center;
               margin-top: 100px;
               font-weight: 400;">
               عليك تسجيل الدخول لمشاهدة هذا القسم 
               </h2>';
            }

         ?>

            </div>
            <li><a href="">Blog</a></li>
          </ul>
         <!-- links section  -->
          <!-- sign up and log in section -->
           <div class="log-in-sign-up">
            <?php 
            if(isset($_SESSION['root_id_4448']) || isset($_SESSION['clint_id']) || isset($_SESSION['user_id'])){
             $user = mysqli_fetch_assoc($sql);
               echo  '    
               <a href="#" class="sign-up">'. $user['name'] .' </a>
               ';

            }else{
               echo '    
               <a href="Signup-Login.php" class="sign-up">Sign Up</a>
               <a href="Signup-Login.php" class="sign-up log-in"> Log in</a>
               ';
            }
            ?>

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

      <!-- slider Images html Code Start  -->
       <div class="slider">
         <div class="container">
            <!-- slide box  -->
            <div class="slide-box">
               <img src="images/bgs.png" onerror="this.onerror=null; this.src='images/slide-df.png'" alt="" loading="lazy" >
            </div>
            <!-- slide box  -->
       
         </div>
       </div>
      <!-- slider Images html Code End  -->
       <!-- Filtter And Optins  -->
       <div class="optains">
         <h1>Popular</h1>
         <h1>Popular</h1>
         <h1>Popular</h1>
         <h1>Popular</h1>
         <select name="" id="">
          <option value="1">Popular </option>
          <option value="2">Popular </option>
          <option value="3">Popular </option>
         </select>
         <h2>Populaer</h2>
       </div>
       <!-- Filtter And Optins  -->
       <!-- Items Start  -->
        <div class="items">
         <div class="container" id="resultsList">
            <!-- item  -->
            <?php 
         foreach($rows as $row){
           $images = $row['item_images'];
           $image = explode(",",$images);
           $num = $row["item_id"] * $row["item_price"] / 800;
            echo '
            <a href="/ishtarwebsite/showItem.php?item_id='.$row["item_id"].'">
            <div class="item">
               <img src="php/Orders_images/'.$image[1].'" onerror="this.onerror=null; this.src="images/slide-df.png" alt="" loading="lazy">
               <div class="contact">
                 <div class="item-image"> 
                  <img src="images/logo.png" onerror="this.onerror=null; this.src="images/slide-df.png" alt="" loading="lazy">
               </div>
                   <p hidden> '.$row['item_title']." ".$row['item_descrption'].' </p>
                  <h4> '.$row['item_title'].' </h4>
                  <div class="liks"><i class="fa-solid fa-heart"></i> '.$row["item_price"] / 250 - $row["item_id"] + $row["item_price"] /50 .'</div>
                  <div class="views"><i class="fa-solid fa-eye"></i> '.$row["item_price"] / 250 - $row["item_id"] + $row["item_price"] /100 .'k</div>
               </div>
            </div>
            </a>';
         }
         ?>

            <!-- item  -->
         </div>
        </div>
       <!-- Items End  -->

        <script src="js/script.js"></script>
   </body>
</html>
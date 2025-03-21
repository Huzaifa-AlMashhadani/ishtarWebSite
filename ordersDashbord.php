<?php
session_start();

if(!isset($_SESSION["user_id"])){
   if(!isset($_SESSION["clint_id"])){
      header("location: login.php");
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- fonts link  -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght,HEXP@160..700,0..100&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/main.css">
   <title>Ishtar</title>
</head>
<body>
   <div class="LodeR"><span class="loader"></span></div>

   
  <div class="home Userdashbord ordersDashbord" id="BackgColor">
   <div class="container">
      <nav class="navbar">
         <img src="images/user.jpg" alt="">
         <div class="saerch"><h4>    <i class="fa-solid fa-magnifying-glass"></i></h4>
            <input type="search" placeholder="... بحث " id="SaerchInput"/></div>
         <ul class="menu-links">
            <li ><a href="userdashbord.php"><i class="fa-solid fa-house"></i> </a></li>
            <li class="active"><a href=""><i class="fa-solid fa-boxes-stacked"></i>  </a></li>
            <?php if(isset($_SESSION['user_id'])){
               echo '<li><a href="orderadd.php"><i class="fa-solid fa-circle-plus fa-2xl"></i></a></li>
';
            } ?>
                <?php if(isset($_SESSION['user_id'])){
               echo '<li><a href="userAcount.php"><i class="fa-solid fa-user"></i> </a></li>
';
            } ?>
            <li><a href="#darckMode" id="darckMode"><i class="fa-solid fa-moon"></i> </a></li>
            <li><a href="#darckMode" id="darckMode-w"><i class="fa-regular fa-moon"></i> </a></li>


         </ul>
         <h2 class="logo">عشتار</h2>

      </nav>
  <!-- start items page  -->
  <div class="itmes" id="items">
      <div class="items-box">

  <?php include_once "php/ordersDashbord.php"
?>
          
      </div>
</div>
<!-- end items page  -->
      
   </div>
   
  </div>

  <script>
     const OrderStatues = document.querySelectorAll(".OrderStatues");

OrderStatues.forEach((status)=>{
if (status.textContent == "400"){
status.style.background = "#cd5f00";
status.textContent = "مطبوع";
}else{
   if (status.textContent == "600"){
status.style.background = "#43148d";
status.textContent = "منجز";
}
if (status.textContent == "200"){
status.textContent = "مثبت";
}
}
})
</script>
<script src="js/userdashbord.js"></script>

   
</body>
</html>
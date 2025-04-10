<?php
session_start();

if($_SESSION["root_id_4448"] === "1"){
  if($_SESSION["user_id"] === "1"){
    
    include_once "php/config.php";
    $sql = mysqli_query($con, "SELECT * FROM items");
  
  }else{
    header("location: userdashbord.php");
  }
}else{
header("location: userdashbord.php");

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- fonts link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght,HEXP@160..700,0..100&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/main.css" />
    <title>Ishtar</title>
  </head>
  <body>
   <div class="LodeR"><span class="loader"></span></div>

    <div class="root-pages home Userdashbord" id="BackgColor">
      <div class="container">
        <nav class="navbar">
          <img src="images/logo.jpg" alt="" />
          <div class="saerch">
            <h4><i class="fa-solid fa-magnifying-glass"></i></h4>
            <input type="search" placeholder="... بحث " id="SaerchInput" />
          </div>
          <ul class="menu-links">
            <li ><a href="Admin-root-Dashbord.php"><i class="fa-solid fa-house"></i> </a></li>
            <li ><a href="Admin-root-orders.php"><i class="fa-solid fa-boxes-stacked"></i>  </a></li>
            <li class="active"><a href="Admin-root-items.php"><i class="fa-solid fa-box"></i></a></li>
            <li><a href="Admin-root-addOrder.php"><i class="fa-solid fa-circle-plus fa-2xl"></i></a></li>
            <li><a href="Admin-root-acount.php"><i class="fa-solid fa-arrows-rotate"></i> </a></li>
            <li><a href="Admin-root-users.php"><i class="fa-solid fa-users"></i></a></li>
            <li><a href="#darckMode" id="darckMode"><i class="fa-solid fa-moon"></i> </a></li>
            <li><a href="#darckMode" id="darckMode-w"><i class="fa-regular fa-moon"></i> </a></li>
          </ul>
          <h2 class="logo">
            <h2 class="add-order">
              <span><i class="fa-solid fa-square-plus"></i></span>
            </h2>
          </h2>
        </nav>

        <!-- start form add order  -->
        <div class="contant addorder" style="z-index: -10;">
          <div class="text-contct orderadd login-form" id="Add_Form_Order">
          <form action="#">
          <h3 class="wornig_maseg">رسالة خطا</h3>
            <div class="imageiplod">
              <label for="image1" class="imageuplod">
                <img src="images/deflot.png" alt="" id="Image1" />
              </label>
              <input
                type="file"
                accept="image/png, image/jpg, image/jpeg"
                name="image1"
                id="image1"
              />
              <label for="image2" class="imageuplod">
                <img src="images/deflot.png" alt="" id="Image2" />
              </label>
              <input
                type="file"
                accept="image/png, image/jpg, image/jpeg"
                name="image2"
                id="image2"
              />
            </div>
            <div class="imageiplod">
              <label for="image3" class="imageuplod">
                <img src="images/deflot.png" alt="" id="Image3" />
              </label>
              <input
                type="file"
                accept="image/png, image/jpg, image/jpeg"
                name="image3"
                id="image3"
              />
              <label for="image4" class="imageuplod">
                <img src="images/deflot.png" alt="" id="Image4" />
              </label>
              <input
                type="file"
                accept="image/png, image/jpg, image/jpeg"
                name="image4"
                id="image4"
              />
            </div>
            <label for="email"> اسم المنتج </label>
            <input type="text" name="itemTitle" />
            <label for="userPrice">  سعر المفرد </label>
            <input type="number" name="userPrice" />
            <label for="password"> السعر </label>
            <label for="password" id="PriceWorin"> </label>
            <input type="number" name="itemPrice" id="ClintPrice" />
            <label for="descrption" id="PriceWorin"> الوصف او الملاحضات </label>
            <textarea name="itemDescrption" id="descrption"></textarea>
            <div class="btns">
              <button type="submit" class="itemAdd">ارسال</button>
              <button type="submit" id="disbolOrder" class="DisOrderForm">
                الغاء
              </button>
            </div>
            </form>
          </div>
        </div>
        <!-- end form add order  -->
        <!-- start root items  -->
        <div class="root-items root-orders">

        <?php

        foreach($sql as $row){
          $allImage = $row['item_images'];
          $Image = explode(",", $allImage);

          echo '<div class="order">
            <a href="showItem.php?item_id='.$row["item_id"].'">
              <div class="imge-name-statues">
                <p>
                  '.$row["item_descrption"].'
                </p>
                <span class="OrderStatues">قيد المعالجة</span>
                <h1 class="OrderClantName">'.$row["item_title"].'</h1>
                <img src="php/Orders_images/'.$Image[0].'" alt="" />
              </div>
              <div class="detils">
                <span class="OrderID">
                  <a href="Admin-root-editItem.php?item_id='.$row["item_id"].'"><i class="fa-regular fa-pen-to-square"></i></a
                ></span>
                <span class="ClantNumber"> '.$row["item_price"] / 1000 . ',000 IQD</span>
                <span class="pageName">
                  <a href="php/Admin-root-deleteItme.php?item_id='.$row["item_id"].'"><i class="fa-solid fa-trash"></i></a
                ></span>
              </div>
            </a>
          </div>';
        } ?>



        </div>
        <!-- end root items  -->
      </div>
    </div>

    <script src="js/rootOrders.js"></script>
    <script src="js/Admin-root-itemAdd.js"></script>
  </body>
</html>

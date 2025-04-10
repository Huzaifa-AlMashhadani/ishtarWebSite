

<?php 
session_start();
if(isset($_SESSION["user_id"])){
   $user_id = $_SESSION["user_id"];
   }elseif(isset($_SESSION["clint_id"])){
       $user_id = $_SESSION["clint_id"];
   }else{
       $user_id = null;
   }
if(!isset($_SESSION["user_id"])){
   if(!isset($_SESSION["clint_id"])){
      header("location: Signup-Login.php");
   }

}

if($_GET['item_id']){
   
include_once "php/config.php";
$id = $_GET['item_id'];
$sql = mysqli_query($con, "SELECT * FROM items WHERE item_id = $id");


if($sql){

   $row = mysqli_fetch_assoc($sql);
   

  $imagesArry = $row['item_images'];

  if($imagesArry){
   $images = explode(",", $imagesArry);

  }else{
      header("location: index.php");

  }


}else{
   header("location: index.php");

}
}else{
   header("location: index.php");

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
            <form action="">
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
      <!-- Nar Bar html code end  -->

      <div class="showItem">
        <div class="container">
            <img src="php/Orders_images/<?php echo $images[0] ?>" alt="" class="Item_image">
            <div class="contact">
                <div class="Like-Title">
                    <h1><?php echo $row['item_title'] ?> </h1>
                    <i class="fa-regular fa-heart"></i>
                </div>
                <p> <?php echo $row['item_descrption'] ?></p>
                <div class="imagesLibiry">
                    <img src="php/Orders_images/<?php echo $images[1] ?>" alt="">
                    <img src="php/Orders_images/<?php echo $images[2] ?>" alt="">
                    <img src="php/Orders_images/<?php echo $images[3] ?>" alt="">
                    <img src="php/Orders_images/<?php echo $images[0] ?>" alt="">
                </div>
                <div class="price">
                    <h4><?php $price = $row['item_price'] / 1000; echo $price ?>,000<span>IQD</span></h4> <span class="OldPrice"><?php echo $row['item_price'] / 1000 + 16;  ?>,000</span>
                </div>
                <div class="actions">
                  <button class="btn-orderadd">اطلب الان </button>
                </div>
        </div>
      </div>
   </div>
        <!-- Items Start  -->
        <div class="items">
         <h1 class="title">مزيد من المنتجات </h1>
         <div class="container">
            <!-- item  -->
            <?php 

$rows = mysqli_query($con, "SELECT * FROM items WHERE item_id != $id");


    foreach($rows as $row_1){


       $imagesArry_2 = $row_1['item_images'];
       $Images_2 = explode("," , $imagesArry_2);

       echo '
       
       <a href="showItem.php?item_id='.$row_1['item_id'].'"><div class="item">
               <img src="php/Orders_images/' .$Images_2[0].'" onerror="this.onerror=null; this.src="images/slide-df.png"" alt="" loading="lazy">
               <div class="contact">
                  <img src="images/logo.png" onerror="this.onerror=null; this.src="images/slide-df.png"" alt="" loading="lazy">
                  <h4>'.$row['item_title'].'t </h4>
<div class="liks"><i class="fa-solid fa-heart"></i> '.$row_1["item_price"] / 250 - $row_1["item_id"] + $row_1["item_price"] /50 .'</div>
                  <div class="views"><i class="fa-solid fa-eye"></i> '.$row_1["item_price"] / 250 - $row_1["item_id"] + $row_1["item_price"] /100 .'k</div>
               </div>
            </div>
            </a>
            ';
      
    }

?>

            <!-- item  -->
         </div>
        </div>
       <!-- Items End  -->
        <!-- Start Add Order Window  -->
        <div class="add-order">
            <form action="" class="order form_sendData" enctype="multipart/form-data">
               <div class="order">
               <div class="input">
               <label for="fullName">الأسم</label>
               <label class="wornig_maseg"></label>
               <input type="text" name="name" id="fullName" placeholder="اكتب الاسم هنا .." />
               <input type="text" name="ordernumber" id="fullName" placeholder="اكتب الاسم هنا .." value="1" hidden/>
              </div>
              <div class="input">
               <label for="fullName">رقم الهاتف </label>
               <input type="number" name="number" id="fullName"  placeholder="اكتب رقم الهاتف الخاص بك .."/>
               <input type="number" name="user_id" value="<?php echo $user_id ?>" id="fullName"  placeholder="اكتب رقم الهاتف الخاص بك .." hidden/>
              </div>
              <div class="input">
               <label for="fullName">العنوان </label>
               <input type="text" name="ClintPrice" id="ClintPrice" value="<?php $price = $row['item_price'] ; echo $price ?>" hidden/>
               <input type="text" name="adrese" id="fullName" placeholder="اكتب عنوانك هنا .."/>
              </div>
              <div class="input">
               <label for="fullName">الوصف </label>
               <input type="text" name="descrption"  value="<?php echo $row["item_descrption"] ?>" id="fullName" placeholder="اكتب الوصف الكامل هنا" style="height: 200px;" hidden/>
               <input type="text" name="chakDescrption" id="fullName" placeholder="اكتب الوصف الكامل هنا" style="height: 200px;"/>
              </div>
              <div class="order-image">
               <span>ورة الطباعه</span>
               <label for="orderImage">
                  <img src="images/d.png" alt="" width="80" id="ImageOrder">
               </label>
               <span>ارفق الصورة اللتي تريد طباعتها هنا  </span>
               <input type="file"  id="orderImage" name="image2" hidden>
               <input type="text"   name="image1" value="<?php echo $images[0] ?>" hidden>
              </div>
              <button type="submit" >التالي </button>
              <button class="closedAddorder" type="button">الغاء </button>
               </div>
               <div class="payment-window">
         
         <div class="zainCash-payment">
            
            <div class="container">  

               <div class="zainCash-QR">
                  <h3>ادفع بل زين كاش </h3>
                  <ul>
                        <li>Lorem ipsum, dolor sitexpedita</li>
                        <li>Lorem ipsum, Lorem. Lorem ipsum dolor sit. expedita</li>
                        <li>Lorem ipsum, dolopedita</li>
                        <li>Lorem ipsum, dolor sit amet  Nobis expedita</li>
                        <li>Lorem ipsum, dolor sit amet consectet</li>
                  </ul>
                  
                  <h2>7811930693</h2>

                  <img src="images/images (3).png" alt="" >
                  <form action="">
                        <h4 style="text-align:center">ارفق صوره الدفع هنا </h4>
                        <label for="uploadScrrnshot"><img src="images/d.png" alt="" width="20" id="uploadScrrnshotImg"></label>
                        <input type="file" name="ZainCheckImage" id="uploadScrrnshot" hidden>
                        <button class="up-zain-btn botton_send_order"  type="submit">تم الدفع</button>
                  </form>
               </div>
               <div class="order-detelis">
                  <h1> المبلغ المطلوب  <span class="price">543543</span>,000</h1>
                  <div class="input">
                        <h4 >الأسم</h4>
                        <p class="name">Huzaifa Karim</p>
                  </div>
                  <div class="input">
                        <h4 >رقم الهاتف </h4>
                        <p class="number">07811930693</p>
                  </div>
                  <div class="input">
                        <h4 >العنوان </h4>
                        <p class="addrese">بغداد شارع الرصافه قرب الجامعه </p>
                  </div>
                  <h3 class="price-order">130,000 <span>IQD</span></h3>
                  <div class="images">
                        <img src="images/item1.jpg" alt="" class="Order_image" >
                        <i><i class="fa-solid fa-angle-left"></i><i class="fa-solid fa-angle-left"></i><i class="fa-solid fa-angle-left"></i></i>
                        <img src="php/Orders_images/<?php echo $images[0] ?>" alt="">
                  </div>
         
               </div>
            </div>

      </div>
  </div>
            </form>
        </div>
        <!-- End Add Order Window  -->
       

         <script src="js/script.js"></script>
         <script src="js/showImage.js"></script>
   </body>
</html>
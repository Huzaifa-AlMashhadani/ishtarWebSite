<?php



include_once "php/config.php";


$Item_id = $_GET['item_id'];

$sql = mysqli_query($con, "SELECT * FROM items WHERE item_id  = $Item_id");

$price = mysqli_fetch_assoc($sql);

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

  <div class="home Userdashbord  orderadd" id="BackgColor" style="height: 140vh;">
   <div class="container">
      <nav class="navbar">
         <img src="images/user.jpg" style="opacity: 0;" alt="">
         <div class="saerch" style="display: none;"><h4>    <i class="fa-solid fa-magnifying-glass"></i></h4>
            <input type="search" placeholder="... بحث " id="SaerchInput"/>
        </div>
         <ul class="menu-links" style="display: none;">
            <li ><a href="userdashbord.php"><i class="fa-solid fa-house"></i> </a></li>
            <li><a href="ordersDashbord.php"><i class="fa-solid fa-boxes-stacked"></i>  </a></li>
            <li class="active"><a href="orderadd.php" id="enabolOrder"><i class="fa-solid fa-circle-plus fa-2xl"></i></a></li>
            <li><a href="userAcount.php"><i class="fa-solid fa-user"></i> </a></li>
            <li><a href="#darckMode" id="darckMode"><i class="fa-solid fa-moon"></i> </a></li>
            <li><a href="#darckMode" id="darckMode-w"><i class="fa-regular fa-moon"></i> </a></li>


         </ul>
         <h2 class="logo">عشتار</h2>

      </nav>
      <div class="contant addorder">
        <div class="text-contct orderadd login-form" style="transform: translate(-50%, -39%); height:auto;">
         
         <h2 class="contact-title">  انشاء طلب  </h2>
         <h3 class="wornig_maseg">رسالة خطا</h3>

       <form action="" enctype="multipart/form-data">
       <div class="imageiplod">
           <label for="image1" class="imageuplod"> <span>صورة النموذج</span>            <img src="images/deflot.png" alt=""  name="image1" id="Image1">
           </label>
           <input type="file" accept="image/png, image/jpg, image/jpeg" name="image1" id="image1" />
           <label for="image2" class="imageuplod"> <span>صورة الطباعة </span>            <img src="images/deflot.png" alt="" name="image2"  id="Image2">
           </label>
           <input type="file" accept="image/png, image/jpg, image/jpeg" name="image2" id="image2" />
          </div>
          <label for="ordernumber" hidden>  رقم الطلب </label>
          <input type="number" name="ordernumber" hidden id="ordernumber" />
           <label for="name">   ادخل اسمك </label>
           <input type="text" name="name" id="name" />
           <label for="number"> رقم هاتف فعال </label>
           <input type="number" name="number" id="number" />
           <label for="email">العنوان الكامل </label>
           <input type="text" name="adrese"  />
           <label for="password" hidden> المبلغ الكامل  </label>
           <label for="password" id="PriceWorin" hidden>   </label>
           <input type="text" name="ClintPrice" id="ClintPrice" value="<?php echo $price['item_price'] ?>" hidden/>
           <label for="descrption" id="PriceWorin">  الوصف او الملاحضات </label>
           <textarea name="descrption" id="descrption"></textarea>
           <div class="btns">
            <button type="submit"> التالي </button>
            <button type="submit" id="disbolOrder"> الغاء </button>
           </div>
       </form>

        </div>
     </div>
      
   </div>
   
  </div>


<script src="js/userdashbord.js"></script>
<script src="js/Claint-order-Add.js"></script>
   
</body>
</html> 
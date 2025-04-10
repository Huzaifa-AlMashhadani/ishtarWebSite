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

    <div class="warp">
        <div class="login">
            <!-- max width  -->
            <div class="formSection log-in">
                    <h1>تسجيل دخول</h1>
                    <span class="msg-err"></span>
                <div class="form">
                    <form action="#">
                        <div class="feld">
                            <label for=""><i class="fa-solid fa-user"></i></label>
                            <input type="number" placeholder="رقم الهاتف  " name="Phnumber" id="number" maxlength="11">
                        </div>
                        <div class="feld">
                            <label for=""><i class="fa-solid fa-eye"></i></label>
                            <input type="password" placeholder="كلمة المرور " name="password" id="password">
                        </div>
                        <button type="submit">تسجيل دخول </button>
                    </form>
                </div>
                <span class="signup"> اليس لديك حساب بعد  ? <a href="#">تسجيل حساب  </a></span>
            </div>
            <div class="formSection sing-up">
                    <h1>تسجيل حساب </h1>
                    <span class="msg-err"></span>
                <div class="form">
                    <form action="#">
                        <div class="feld">
                            <label for=""><i class="fa-solid fa-user"></i></label>
                            <input type="text" placeholder="الاسم " name="name" id="name">
                        </div>
                        <div class="feld">
                            <label for=""><i class="fa-solid fa-phone"></i></label>
                            <input type="number" placeholder="رقم الهاتف  " name="Phnumber" id="number" pattern="[0-9]{1,11}">
                        </div>
                        <div class="feld">
                            <label for=""><i class="fa-solid fa-at"></i></i></label>
                            <input type="email" placeholder="االبريد اللكتروني  "  name="email" id="email" >
                        </div>
                        <div class="feld">
                            <label for=""><i class="fa-solid fa-eye"></i></label>
                            <input type="password" placeholder="كلمة المرور " name="password" id="password" >
                        </div>
                        <button type="submit" name="register" class="butm">تسجيل  </button>
                    </form>
                </div>
                <span class="loginSlider"> هل لديك حساب معنا  ? <a href="#">تسجيل دخول </a></span>
            </div>
            <div class="spalsh">
              <div>
                <img src="images/logo.png" alt="" >
                <h1>Wolcam to Ishtar </h1>
              </div>
            </div>
            <!-- max width  -->
         </div>
    </div>

<script src="js/login.js"></script>
<script src="js/script.js"></script>
<script src="js/register.js"></script>

</body>
</html>
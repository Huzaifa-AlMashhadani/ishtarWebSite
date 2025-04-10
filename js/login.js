const 
formLogIn = document.querySelector(".log-in form"),
BtnSumbitLogIn = formLogIn.querySelector("button"),
MasgWoringLogin = document.querySelector(".log-in .msg-err");


formLogIn.onsubmit = (e)=>{
e.preventDefault()
}

BtnSumbitLogIn.onclick = ()=>{
    loder.style.display = "flex";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php")
    xhr.onload = ()=>{
     if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
         let data = xhr.response;
         if(data === "sucses"){
            location.href = "Admin-root-Dashbord.php";
           loder.style.display = "none";
         }else{
            MasgWoringLogin.textContent = data;
            loder.style.display = "none";

         }
        }
     }
    }
    let formLoginData = new FormData(formLogIn);
    xhr.send(formLoginData);
}
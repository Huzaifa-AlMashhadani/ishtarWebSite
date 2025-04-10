window.addEventListener("load", ()=>{
 const LodeR = document.querySelector(".LodeR");

LodeR.style.display = "none";

})
const 
form = document.querySelector(".add-order form"),
order = document.querySelector(".add-order div.order"),
BtnSumbit = form.querySelector("button"),
MasgWoring = document.querySelector(".wornig_maseg"),
loder = document.querySelector(".LodeR"),
PayMentWindow = document.querySelector(".payment-window"),
continer = document.querySelector(".order .container"),
orderDetelisPrice = document.querySelector(".order-detelis h1 span.price"),
orderName = document.querySelector(".order-detelis .input p.name"),
orderNumber = document.querySelector(".order-detelis .input p.number"),
orderAddrese = document.querySelector(".order-detelis .input p.addrese"),
Order_image = document.querySelector(".images img.Order_image"),
Price = document.querySelector(".zainCash-payment .container .order-detelis .price-order");



form.onsubmit = (e)=>{
e.preventDefault()
}

BtnSumbit.onclick = ()=>{
    loder.style.display = "flex";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/chak.php")
    xhr.onload = ()=>{
     if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
         let data = JSON.parse(xhr.response);
         if(data.success === true){
            PayMentWindow.style.display = "block";
            loder.style.display = "none";
            continer.style.width = "100%"
            continer.style.justifyContent = "space-evenly"
            order.style.display = "none";
            Price.style.textAlign = "start"
            orderDetelisPrice.textContent = data.price;
            Price.innerHTML = data.price / 1000+",000 <span>IQD</span>";
            orderName.textContent = data.name;
            orderAddrese.textContent = data.addres;
            orderNumber.textContent = data.number;
            Order_image.src = data.printImageName
            console.log(data)
         }else{
            MasgWoring.style.background = "rgba(255, 0, 0, 0.505)"
            MasgWoring.style.display = "block";
            MasgWoring.textContent = data;
            loder.style.display = "none";
            console.log(data)

         }
        }
     }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}

// save order on dataBaes coode 

const form_sendData = document.querySelector(".form_sendData");
const botton_sendData = form.querySelector(".botton_send_order");

form_sendData.onsubmit = (e)=>{
   e.preventDefault()
   }
   
   botton_sendData.onclick = ()=>{
       loder.style.display = "flex";
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "php/orderAdd.php")
       xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
           if(xhr.status === 200){
            let data = xhr.response;
            if(data.success === true){
               loder.style.display = "none";
               console.log(data)
            }else{
               loder.style.display = "none";
               console.log(data)
            }
           }
        }
       }
       let formdata = new FormData(form);
       xhr.send(formdata);
   }
   
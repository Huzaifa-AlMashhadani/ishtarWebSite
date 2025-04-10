
window.addEventListener("load", ()=>{
    const LodeR = document.querySelector(".LodeR")



//Start NavBar Js code  
    const barBtn = document.querySelector(".mobile-bar-icon-btn"),
    bar = document.querySelector(" .mobile-bar"),
    barClaosd = document.querySelector(".mobile-bar .mobile-bar-icon"),
    saerchInput = document.querySelector(".navbar .saerch input"),
    saerch = document.querySelector(".navbar .saerch ");

    if(barBtn && bar && barClaosd && saerchInput && saerch){
        // Show mobile list || Hiddn mobile Bar 
        barBtn.addEventListener("click", ()=>{
            bar.style.height = "100vh"
        })

        barClaosd.addEventListener("click", ()=>{
            bar.style.height = "0"
        })
        // focus saerch and input 
        saerchInput.addEventListener("focus", ()=>{
            saerch.style.width = "90%"
            saerch.style.position = "absolute"
        })
        saerchInput.addEventListener("blur", ()=>{
            saerch.style.width = "40%"
            saerch.style.position = "relative"
        })
    }

// End NavBar JS code 

// Orders List Show and Hiddn 
const ShowOrdersListbtn = document.querySelector(".ShowOrdersListbtn");
const ordersList = document.querySelector(".orders");
const ordersNotficatins = document.querySelector(".navbar .mnu-links li a span");
const Order = document.querySelectorAll(".navbar .mnu-links .orders a .order");

if(ShowOrdersListbtn && ordersList && Order){

    if(Order.length > 0 ){  
        if(Order.length < 9){
        ordersNotficatins.textContent = Order.length
        }else{
            ordersNotficatins.textContent = "+9"

        }
        ordersNotficatins.style.display = "block"
    }
    ShowOrdersListbtn.addEventListener("click", ()=>{
        ordersList.style.height = "400px"
        ordersList.style.padding = "20px"
        })
        ShowOrdersListbtn.addEventListener("blur", ()=>{
        ordersList.style.height = "0"
        ordersList.style.padding = "0"
        })
    ordersList.addEventListener("click", ()=>{
        ordersList.style.height = "400px"
        ordersList.style.padding = "20px"
        })
        ordersList.addEventListener("blur", ()=>{
        ordersList.style.height = "0"
        ordersList.style.padding = "0"
        })
}
// Start LogIn And Sign Up Js Code 
    const LogInBtn = document.querySelector(".loginSlider"),
    SignUpBtn = document.querySelector(".signup"),
    SignUp = document.querySelector(".sing-up"),
    Login = document.querySelector(".log-in"),
    Spalsh_logInPage = document.querySelector(".spalsh");
    if(LogInBtn && SignUpBtn && Spalsh_logInPage){
        // sliding The spalsh page on larg screen 
        LogInBtn.onclick = ()=>{
            Spalsh_logInPage.style.right = 0 
        }
        SignUpBtn.onclick = ()=>{
            Spalsh_logInPage.style.right = "50%"
        }

        // Mobile Secreen Login And Sign Up 
        const screenWidth = window.innerWidth;

        if(screenWidth < 992){
            SignUpBtn.addEventListener("click", ()=>{
                SignUp.style.display = "flex";
                Login.style.display = "none"
                
            })
            LogInBtn.addEventListener("click", ()=>{
                Login.style.display = "flex";
                SignUp.style.display = "none"
                
            })
        }
    }


    // Start payment-method js code 

    const paymentZainCash = document.querySelector(".payment-zainCash");
    const paymentMasterCard = document.querySelector(".payment-masterCard");

    // Selectd PayMent Type 
    if(paymentMasterCard && paymentZainCash){

        paymentMasterCard.addEventListener('click',()=>{
            paymentZainCash.style.border = "none"
            paymentMasterCard.style.border = "2px solid #111"
        })
        paymentZainCash.addEventListener('click',()=>{
            paymentMasterCard.style.border = "none"
            paymentZainCash.style.border = "2px solid #111"
        })
    }


// show item page and make order 
const btnOrderadd = document.querySelector(".btn-orderadd");
const addOrder = document.querySelector(".add-order");
const closedAddorder = document.querySelector(".closedAddorder");

if(addOrder && btnOrderadd){
    btnOrderadd.addEventListener("click", ()=>{
        addOrder.style.display = "flex"
    })
    closedAddorder.addEventListener("click", ()=>{
        addOrder.style.display = "none"
    })

    // change image src for add order 
    const fileInput = document.getElementById("orderImage");
    const ImageOrder = document.getElementById("ImageOrder");
    fileInput.addEventListener("change", (event)=>{
        const Image = event.target.files[0]
        if(Image){
            const render = new FileReader();
            render.onload = (e)=>{
              ImageOrder.src = e.target.result
            }
            render.readAsDataURL(Image)
        }
    });

    // Active Image Item 
    const ItemImages = document.querySelectorAll(".showItem .container .contact .imagesLibiry img")
    const ItemImage = document.querySelector(".showItem .container img.Item_image");
   
    if(ItemImage && ItemImages){
        ItemImages.forEach(Itemimage => {
            Itemimage.addEventListener("click", ()=>{
                ItemImage.src = Itemimage.src;
            });
        });
    }
        const uploadScrrnshot = document.querySelector("#uploadScrrnshot");
        const uploadScrrnshotImg = document.querySelector("#uploadScrrnshotImg");
        const upBtnZain = document.querySelector(".up-zain-btn");
    if(uploadScrrnshot && uploadScrrnshotImg){
            uploadScrrnshot.addEventListener("change", (event)=>{
                const Image = event.target.files[0];
                if(Image){
                    const render = new FileReader();
                    render.onload = (e)=>{
                        uploadScrrnshotImg.src = e.target.result
                    }
                    render.readAsDataURL(Image);
                    upBtnZain.style.cursor = "pointer";
                }
            })
    }

}

const input = document.getElementById("searchInput");
const listItems = document.querySelectorAll("#resultsList a ");

if(input && listItems){
    input.addEventListener("change", function() {
        const query = input.value.toLowerCase();
        listItems.forEach(item => {
          const text = item.textContent.toLowerCase();
          item.style.display = text.includes(query) ? "list-item" : "none";
        });
      });
}


LodeR.style.display = "none";

})
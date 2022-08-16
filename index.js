
// menubar
let menu = document.getElementById("nav-menu-bar");
menu.addEventListener("click", togglenavbar);
function togglenavbar() {
  const body = document.querySelector("body");
  body.classList.toggle("nav-active");
}

// nav dropbar
const navlink = document.querySelector(".nav-link");
const dropbar = document.querySelector(".navdropbar");

navlink.addEventListener("mouseover",() => {
  if(navlink.classList.contains('nav-loggd')){
    dropbar.classList.add("ndrop-active");
  }
});

navlink.addEventListener("mouseout",() => {
  if(navlink.classList.contains('nav-loggd')){
  dropbar.classList.remove("ndrop-active");
  }
});


// subnav
let subnavs = document.querySelectorAll(".sub-sub-nav");
let dropdowns = document.querySelectorAll(".sub-nav-dropbox");

subnavs.forEach(subnav =>{
  subnav.addEventListener("mouseover",()=>{
    let subul = subnav.getElementsByClassName('sub-nav-dropbox').item(0);
      subul.classList.add("sub-nav-active");
  });
});
subnavs.forEach(subnav =>{
  subnav.addEventListener("mouseout",()=>{
    let subul = subnav.getElementsByClassName('sub-nav-dropbox').item(0);
      subul.classList.remove("sub-nav-active");
  });
});




// skicky navbar
window.addEventListener("scroll", function () {
  var header = document.querySelector("body");
  header.classList.toggle("skicky", window.scrollY > 300);
});

// img swiper
var swiper = new Swiper(".myimgSwiper", {
  spaceBetween: 30,
  effect: "fade",
  loop: true,
  autoplay: {
    delay: 1500,
    disableOnInteraction: true,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


/* cat swiper  */
var swiper = new Swiper(".catSwiper", {
  slidesPerView: 4,
  spaceBetween: 10,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  
});


const disprice = document.querySelectorAll(".disprice"); 
const mainprice = document.querySelectorAll(".price"); 
const disper = document.querySelectorAll(".disper"); 

for (var i = 0; i < disprice.length; i++) {
  getdisprice = parseInt(disprice[i].textContent.replace("₹",""));
  getmainprice = parseInt(mainprice[i].textContent.replace("₹",""));
  savemoney = getmainprice - getdisprice;
  findper =  Math.round(savemoney * 100 / getmainprice);
  console.log(findper);
  disper[i].textContent =  (findper+"% off")
}


//add to cart

// const addcartbtn = document.getElementsByClassName("card-text-cart");
// let items = [];
// for(i = 0; i< addcartbtn.length;i++){
//   addcartbtn[i].addEventListener("click",(e)=>{
//     if(typeof(Storage) !== 'undefined'){
      
//     let item = [{
//       id:i+1,
//       title:e.target.parentNode.parentNode.children[0].children[0].textContent,
//       desc:e.target.parentNode.parentNode.children[1].children[0].textContent,
//       price:e.target.parentNode.parentNode.children[2].children[0].textContent.replace("₹",""),
//       imgpath:e.target.parentNode.parentNode.parentNode.children[1].children[0].getAttribute('src'),
//       no:1
//     }];
//     if(JSON.parse(localStorage.getItem('items')) === null){
//       items.push(item);
//       localStorage.setItem("items",JSON.stringify(item));
//     }
//     else{
      
//       const LocalItems = JSON.parse(localStorage.getItem("items"));
//       console.log(LocalItems);
//       console.log("hi")
//       LocalItems.Map(data=>{
//         if(item.id == data.id){
//           console.log(true);
//         }
//         else{
//           console.log(false);
//         }
//       });
//     }

//     }
//   }); 
    
// }

// menu jika responsive akan muncul menu bar
function myNav(){
    let bar = document.querySelector(".bar");
    let nav = document.querySelector(".navigation");
    bar.onclick = ()=>{
        if(nav.style.left == "0%"){
            nav.style.left = "-100%";
            bar.src = "..img/menu.png"
        }else{
            nav.style.left = "0%";
            bar.src = "../img/x.png"
        }
    }
}
myNav();

// ALERT LOGIN
function myFunction() {
    alert("Silahkan Login/Register terlebih dahulu");
  }
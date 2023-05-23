
//Change Block type
const goRegister = document.getElementById("goRegister");
goRegister.addEventListener("click", function() {
    document.querySelector(".stepLogin").style.display = "none";
    document.querySelector(".stepRegister").style.display = "block";
});

//Change Block type
const goLogin = document.getElementById("goLogin");
goLogin.addEventListener("click", function() {
    document.querySelector(".stepLogin").style.display = "block";
    document.querySelector(".stepRegister").style.display = "none";
});


function loginToggle(){
    document.getElementById("sgn").style.display = "none";
    document.getElementById("lgn").style.display = "block";
    document.getElementById("loginbtn").style.backgroundColor = "#79a6cc";
    document.getElementById("signupbtn").style.backgroundColor = "white";
    document.getElementById("loginbtn").style.color = "white";
    document.getElementById("signupbtn").style.color = "black";
}
function signupToggle(){
    document.getElementById("lgn").style.display = "none";
    document.getElementById("sgn").style.display = "block";
    document.getElementById("signupbtn").style.backgroundColor = "#79a6cc";
    document.getElementById("loginbtn").style.backgroundColor = "white";
    document.getElementById("loginbtn").style.color = "black";
    document.getElementById("signupbtn").style.color = "white";
}
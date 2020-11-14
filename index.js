var login=document.getElementById("login");
var signup=document.getElementById("signup");

var login1=document.getElementById("login1");
var signup1=document.getElementById("signup1");

var login2=document.getElementById("login2");
var signup2=document.getElementById("signup2");

signup.style.display="none";
login1.style.display="none";
signup2.style.display="none";

signup1.addEventListener('click',function() {
    signup.style.display="block";
    login.style.display="none";
    login1.style.display="inline";
    signup1.style.display="none";
    login2.style.display="none";
    signup2.style.display="block";
    err.style.display="none";
    });

login1.addEventListener('click',function() {
    signup.style.display="none";
    login.style.display="block";
    login1.style.display="none";
    signup1.style.display="inline";
    login2.style.display="block";
    signup2.style.display="none";
    err.style.display="none";
    });
    
    
var err=document.getElementById("error");
var name1=document.getElementById("name");
var pass=document.getElementById("password");

err.style.display="none";

function vali(){
    if(name1.value === ""){
        err.innerHTML = "Enter Email ID";
        err.style.display="block";
        return false;
    }
    if(pass.value===""){
        err.innerHTML = "Enter Password";
        err.style.display="block";
        return false;
    }
    return true;
}
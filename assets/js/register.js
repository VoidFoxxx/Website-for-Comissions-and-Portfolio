function validatePassword(){
    var password = document.forms["register"]["password"].value;
    var passwordcheck = document.forms["register"]["repeatpassword"].value;
    if( password !== passwordcheck){
        alert("Passwords don't match");
    }
}

const chk = document.getElementById("showpass");
const pwd = document.getElementById("password")
const pwd2 = document.getElementById("password2")



chk.addEventListener('change',function(){
    if(pwd.type === "password"){
        pwd.type = "text";
        pwd2.type = "text";
    }else{
        pwd.type = "password";
        pwd2.type = "password";
    }
})


const togglePassword = document.getElementById('checkbox1');
const password = document.getElementById('password');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    // this.classList.toggle('bi-eye');
});
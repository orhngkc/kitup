const namee = document.getElementById("register-form-name")
const mail = document.getElementById("register-form-email")
const username = document.getElementById("register-form-username")
const phone = document.getElementById("register-form-phone")
const pass = document.getElementById("register-form-password")
const repass = document.getElementById("register-form-repassword")
const form = document.getElementById("register-form")
var success = document.getElementById("success")
var err = document.getElementById("loginerr")

const login_form = document.getElementById("login-form")
const login_username = document.getElementById("login-form-username")
const login_pass = document.getElementById("login-form-password")


form.addEventListener("submit", (e) =>{
    e.preventDefault();
    startValidate();
})

login_form.addEventListener("submit", (e) =>{
    e.preventDefault();
    loginValidate()
})

function loginValidate(){
    var username_l = replacer(login_username.value)
    var pass_l = replacer(login_pass.value)
    var isValid = true

    if(username_l == ''){
        isEmpty(login_username)
        isValid = false
    }else{
        clearErrorMessage(login_username)
    }

    if(pass_l == ''){
        isEmpty(login_pass)
        isValid = false
    }else{
        clearErrorMessage(login_pass)
    }

    if(isValid == true){
        var params = "username_login=" + username_l + "&pass=" + pass_l
        var xhr = new XMLHttpRequest()
        xhr.open("POST", "http://localhost/Kit-up/lib/transaction.php", true)
        xhr.responseType = 'json'
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = (response) => {
            if(xhr.response["status"] == "ok"){
                window.location.href = 'http://localhost/kit-up/'
            }else{
                err.innerHTML = `
                <div class="sb-msg"><i class="icon-remove"></i><strong>Oh snap!</strong> Kullanıcı bilgileri uyuşmuyor.</div>`
            }
        }
        xhr.send(params)
    }
}   

function startValidate(){
    var name_v = replacer(namee.value)
    var mail_v = replacer(mail.value)
    var username_v = replacer(username.value)
    var phone_v = replacer(phone.value)
    var pass_v = replacer(pass.value)
    var repass_v = replacer(repass.value)

    var isValid = true

    if(name_v == ''){
        isEmpty(namee)
        isValid = false
    }else{
        clearErrorMessage(namee)
    }
    if(mail_v == ''){
        isEmpty(mail)
        isValid = false
    }else{
        if(validateMail(mail_v) !== true){
            setErrorMessage(mail, "*Geçersiz bir eposta adresi girdiniz")
            isValid = false
        }else{
            clearErrorMessage(mail)
        }
    }
    if(username_v == ''){
        isEmpty(username)
        isValid = false
    }else{
        if(validateUsername(username_v) !== true){
            setErrorMessage(username, "*Geçersiz bir kullanıcı adı girdiniz")
            isValid = false
        }else{
            clearErrorMessage(username)
        }
    }
    if(phone_v == ''){
        isEmpty(phone)
        isValid = false
    }else{
        if(validatePhone(phone_v) !== true){
            setErrorMessage(phone, "*Geçersiz bir telefon numarası girdiniz")
            isValid = false
        }else{
            clearErrorMessage(phone)
        }
    }
    if(pass_v == ''){
        isEmpty(pass)
        isValid = false
    }else{
        if(validatePass(pass_v) !== true){
            setErrorMessage(pass, "*Geçersiz bir şifre girdiniz")
            isValid = false
        }else{
            clearErrorMessage(pass)
        }
    }
    if(repass_v == ''){
        isEmpty(repass)
        isValid = false
    }else{
        if(validatePass(repass_v) !== true){
            setErrorMessage(repass, "*Geçersiz bir şifre girdiniz")
            isValid = false
        }else{
            clearErrorMessage(repass)
        }
    }
    if(pass_v != repass_v){
        setErrorMessage(repass, "*Şifreler eşleşmiyor")
        isValid = false
    }else{
        clearErrorMessage(repass)
    }

    if(isValid == true){
        var params = "name_v=" + name_v + "&mail_v=" + mail_v + "&username_v=" + username_v + "&phone_v=" + phone_v + "&pass=" + pass_v
        var xhr = new XMLHttpRequest()
        xhr.open("POST", "http://localhost/Kit-up/lib/transaction.php", true)
        xhr.responseType = 'json'
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = (response) => {
            if(xhr.response["status"] == "ok"){
                success.innerHTML = `<div class="sb-msg"><i class="icon-thumbs-up"></i>Kayıt başarıyla tamamlandı!</div>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>`
            }
        }
        xhr.send(params)
    }
}

function setErrorMessage(input, message){
    const parent = input.parentElement
    const span = parent.querySelector('span')
    
    span.style.color = "red"
    span.innerHTML = message
}

function clearErrorMessage(input){
    const parent = input.parentElement;
    const span = parent.querySelector('span')

    span.innerHTML = ""
}

function isEmpty(input){
    const parent = input.parentElement;
    const span = parent.querySelector('span')
    span.style.color = "red"
    span.innerHTML = "*Bu alan boş bırakılamaz"
}


function validateMail(email) {
    const re = /^([^@\s\."'\(\)\[\]\{\}\\/,:;]+\.)*[^@\s\."'\(\)\[\]\{\}\\/,:;]+@[^@\s\."'\(\)\[\]\{\}\\/,:;]+(\.[^@\s\."'\(\)\[\]\{\}\\/,:;]+)+$/
    return re.test(String(email).toLowerCase())
}

function validatePass(pass){
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[-=?'^+%&/()>£#{[}_!._@#$%^&*])(?=.{8,})/
    return re.test(String(pass))
}

function validateUsername(username){
    const re = /^(?=[a-z_\d]*[a-z])[a-z_\d]{6,}$/
    return re.test(String(username))
}

function validatePhone(phone){
    const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/
    return re.test(String(phone))
}

function replacer(text){
    return text.replace(/\s+/g, '')
}


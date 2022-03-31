let form = document.querySelector('.form-fields')
let email = document.querySelector('.email')
let password = document.querySelector('.password')
let cfPassword = document.querySelector('.cf-password')
let file = document.querySelector(".image-file")

let error = document.querySelector('.error-mess')

continueBtn = form.querySelector('.form-submit');

function isEmail (data) {
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    return regex.test(data) ? undefined : 'Incorrect form of email'
}

function isValidatedFile(data) {
    let regex = /(\.jpg|\.jpeg|\.png|\.gif)$/i
    return regex.exec(data) ? undefined : 'Avatar picture must be png, jpg or jpeg'
}



email.onchange = (e) => {
    error.textContent = isEmail(e.target.value)
    if(isEmail(e.target.value)){
        error.classList.add('error')
    }
    else{
        error.classList.remove('error')
    }
    
}

cfPassword.onchange = (e) => {
    if(password.value != e.target.value) {
        error.textContent = 'Confirm password failed!'
        error.classList.add('error')
    }
    else{
        error.textContent = undefined
        error.classList.remove('error')
    }
    
}

file.onchange = (e) => {
    error.textContent = isValidatedFile(e.target.value)
    if(isValidatedFile(e.target.value)){
        error.classList.add('error')
    }
    else{
        error.classList.remove('error')
    }
}


form.onsubmit = (e) => {
    e.preventDefault()
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/register.php', true);

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                if(xhr.response === 'success'){
                    location.href = './users.php';
                }
                else{
                    error.textContent = xhr.response
                    error.classList.add('error')
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}
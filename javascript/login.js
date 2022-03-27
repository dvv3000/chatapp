let form = document.querySelector('.form-fields')
let email = document.querySelector('.email')
let password = document.querySelector('.password')


let error = document.querySelector('.error-mess')

continueBtn = form.querySelector('.form-submit');



email.onchange = (e) => {
    error.textContent = isEmail(e.target.value)
    if(isEmail(e.target.value)){
        error.classList.add('active')
    }
    else{
        error.classList.remove('active')
    }
    
}


form.onsubmit = (e) => {
    e.preventDefault()
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/login.php', true);

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                if(xhr.response === 'success'){
                    location.href = './users.php';
                }
                else{
                    error.textContent = xhr.response
                    error.classList.add('active')
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}

function isEmail (data) {
    let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    return regex.test(data) ? undefined : 'Incorrect form of email'
}
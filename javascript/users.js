let userListElement = document.querySelector('.user-list')
let searchBtn = document.querySelector('.search .btn')
let inputSearchElement = document.querySelector('.search-txt')
let searchElement = document.querySelector('.search')


function getUserList() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/getUsers.php', true);

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                userListElement.innerHTML = xhr.response      
            }
        }
    }
    xhr.send()
}




inputSearchElement.onkeyup = (e) => {
    
    e.preventDefault();
    data = inputSearchElement.value.trim()

    if(data === ''){
        userListElement.classList.remove('active')
    }
    else {
        searchElement.classList.add('active')
    }
    let xhr = new XMLHttpRequest()
    xhr.open('GET', 'php/search.php?searchText=' + data, true)

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                userListElement.innerHTML = xhr.response  
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send()
}

if (!searchElement.classList.contains('active')){
    setInterval(getUserList, 3000);
}
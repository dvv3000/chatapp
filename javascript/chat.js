let sendBtn = document.querySelector('.message i')
let typingBox = document.querySelector('.message .typing-area')
let form = document.querySelector('.message')
let chatBox = document.querySelector('.chat-box')
const queryString = window.location.search
const urlParams = new URLSearchParams(queryString);

form.onsubmit = (e) => {
    e.preventDefault()
    // targetId = urlParams.get('id')
    // console.log(targetId)
    // data = {
    //     'incomingId' : targetId,
    //     'content' :  typingBox.value
    // }
    // console.log(data)

    let xhr = new XMLHttpRequest();
    xhr.open('POST', './php/sendMessage.php', true)

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                typingBox.value = ''
                console.log(xhr.response)
            }
        }
    }
    let data = new FormData(form)
    xhr.send(data)
}

function getMessages() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/getMessages.php?incomingId=' + urlParams.get('id'), true);

    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                chatBox.innerHTML = xhr.response
                // console.log(5);      
            }
            else{
                console.log(xhr.response)
            }
        }
    }
    xhr.send()
}

setInterval(getMessages, 500)
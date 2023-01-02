const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");


form.onsubmit = (e) =>{
    e.preventDefault();         //prevent it from submitting
}

sendBtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php",  true);             //go to this php file and insert the data to database
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200){
            inputField.value = ""; //clear the message once send
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

chatBox.onmouseenter = () =>{
    chatBox.classList.add("active");        //adding these class because user want to scroll up the message..
}                                           //for scrrolling up the setInterval function should not work

chatBox.onmouseleave = () =>{
    chatBox.classList.remove("active");
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php",  true);                //go to this file and get the chat
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);

},500); //this function will run frequently for every 500ms

//defaultly scrolling to bottom 
function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
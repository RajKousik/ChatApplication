const form = document.querySelector("form"),
submitBtn = form.querySelector("input[type='submit']"),
errorMsg = form.querySelector(".alert p"),
errorBox = form.querySelector(".alert");


form.onsubmit = (e) =>{
    e.preventDefault();                 //prevent the form from submitting
}

submitBtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/check-otp.php",  true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200){
            let data = xhr.response;
            if(data == "done"){
                location.href = "login.php";
            }else{
                errorBox.classList.remove("alert-success");
                errorBox.classList.add("alert-danger");
                errorMsg.textContent = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
const pswrdField = document.querySelector(".form .field #pwd");
const confirmField = document.querySelector(".form .field #confirm");
const pswdToggle = document.querySelector(".form .field #pwdEye");
const confirmToggle = document.querySelector(".form .field #confirmEye");

pswdToggle.onclick = () =>{
    if(pswrdField.type == "password")                   //if it is password
    {
        pswrdField.type = "text";                       //then change it to text 
        pswdToggle.classList.add("active");              //for css to change the icon
    }
    else if(pswrdField.type == "text")                  
    {
        pswrdField.type = "password";                   //else changr it to text
        pswdToggle.classList.remove("active");              //for css to change th icon
    }
}

confirmToggle.onclick = () =>{
    if(confirmField.type == "password")                   //if it is password
    {
        confirmField.type = "text";                       //then change it to text 
        confirmToggle.classList.add("active");              //for css to change the icon
    }
    else if(confirmField.type == "text")                  
    {
        confirmField.type = "password";                   //else changr it to text
        confirmToggle.classList.remove("active");              //for css to change th icon
    }
}
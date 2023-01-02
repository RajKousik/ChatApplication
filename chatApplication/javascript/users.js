const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () =>{
    searchBar.classList.toggle("active");       //for css
    searchBar.focus();                  //gives the focus
    searchBtn.classList.toggle("active");
    searchBar.value = "";       //remove the msg once send btn clicked
}

searchBar.onkeyup = () =>{

    let searchTerm = searchBar.value
    if(searchTerm != ""){
        searchBar.classList.add("active");          //adding active class bcuz when user start typing in searchbar the setInterval function should not work
    }else{
        searchBar.classList.remove("active");       //removing active class bcuz when user stanot searching anything in searchbar the setInterval function should work
    }

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/search.php",  true);
        xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200){
            let data = xhr.response;
            usersList.innerHTML = data;
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);       //send the search term to search php file
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php",  true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status == 200){
            let data = xhr.response;
            if(!searchBar.classList.contains("active")){            //if it doesnot contains active class then run
                usersList.innerHTML = data;
            }
        }
    }
    xhr.send();

},500); //this function will run frequently for every 500ms so file will be refreshed frequently
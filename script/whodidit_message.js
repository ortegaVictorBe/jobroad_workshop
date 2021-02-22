

//Get the buttons
const btnReload = document.getElementById("reload");
const btnStart = document.getElementById("start");

//Sending to homePage
btnStart.onclick = () => {
    window.open("index.html", "_self");
}

//reloading the pictures
btnReload.onclick = () => {
    window.open("whoDidit.html", "_self");
}
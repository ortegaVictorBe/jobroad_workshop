

//Get the buttons
const btnReload = document.getElementById("reload");
const btnStart = document.getElementById("start");


//Get indexelements
const indxTool01 = document.getElementById("tool01");
const indxTool02 = document.getElementById("tool02");

//Sending to homePage
btnStart.onclick = () => {
    window.open("index.html", "_self");
}

//reloading the pictures
btnReload.onclick = () => {
    window.open("whoDidit.html", "_self");
}
//Get the buttons
const btnStart = document.getElementById("start");
const btnBlackboxHome = document.getElementById("reload");

//Sending to homePage
btnStart.onclick = () => {
    window.open("../index.html", "_self");
}
//Seding to Blackbox Home
btnBlackboxHome.onclick = () => {
    window.open("../blackbox.php", "_self");
}


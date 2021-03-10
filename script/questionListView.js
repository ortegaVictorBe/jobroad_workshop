

//Get the buttons
const btnStart = document.getElementById("start");
const btnBlackboxHome = document.getElementById("reload");
// const btnRefresh = document.getElementById("refresh");


//Sending to homePage
btnStart.onclick = () => {
    window.open("../index.html", "_self");
}

btnBlackboxHome.onclick = () => {

    window.open("../blackbox.php", "_self");
}




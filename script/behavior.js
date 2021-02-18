//Get the pictures
const people01 = document.getElementById("people01");
const people02 = document.getElementById("people02");
const people03 = document.getElementById("people03");
const people04 = document.getElementById("people04");
const people05 = document.getElementById("people05");
const people06 = document.getElementById("people06");

//Get the button
const btnReload = document.getElementById("reload");
const btnStart = document.getElementById("start");


people01.onclick = () => {
    people01.src = "../img/hideImg01.jpg";
}
people02.onclick = () => {
    people02.src = "../img/hideImg01.jpg";
}
people03.onclick = () => {
    people03.src = "../img/hideImg01.jpg";
}

people04.onclick = () => {
    people04.src = "../img/hideImg02.jpg";
}
people05.onclick = () => {
    people05.src = "../img/hideImg02.jpg";
}
people06.onclick = () => {
    people06.src = "../img/hideImg02.jpg";
}

//reloading the pictures
btnReload.onclick = () => {
    people01.src = "../img/01_p.jpg";
    people02.src = "../img/02_p.jpg";
    people03.src = "../img/03_p.jpg";
    people04.src = "../img/04_p.jpg";
    people05.src = "../img/05_p.jpg";
    people06.src = "../img/06_p.jpg";

}

btnStart.onclick = () => {
    window.open("index.html", "_self");
}

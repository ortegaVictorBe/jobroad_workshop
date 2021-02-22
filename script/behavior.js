//Get the pictures
const people01 = document.getElementById("people01");
const people02 = document.getElementById("people02");
const people03 = document.getElementById("people03");
const people04 = document.getElementById("people04");
const people05 = document.getElementById("people05");
const people06 = document.getElementById("people06");

//Get the buttons
const btnReload = document.getElementById("reload");
const btnStart = document.getElementById("start");
const btnMessage = document.getElementById("btnMessage");

//Get indexelements
const indxTool01 = document.getElementById("tool01");
const indxTool02 = document.getElementById("tool02");

//Quesiotn object
const questions = [
    "Quien es Fumador?",
    "Quien es Bohemio?",
    "Quien es Buena gente?",
    "Quien es Iracundo",
    "Quien es Religios@?",
    "TODOS USTEDES FALLARON POR JUZGAR ANTES DE TIEMPO"
];

var numberQuestion = 0;

drawQuestion = () => {
    if (numberQuestion <= 5) {
        if (numberQuestion == 5) {
            //Show button message
            document.getElementById("questionText").innerHTML = "";
            btnMessage.style.display = "inline";

        } else {
            document.getElementById("questionText").innerHTML = questions[numberQuestion];
            numberQuestion = numberQuestion + 1;
        }
    }
}


people01.onclick = () => {
    people01.src = "../img/hideImg01.jpg";
    drawQuestion(numberQuestion);
}
people02.onclick = () => {
    people02.src = "../img/hideImg01.jpg";
    drawQuestion(numberQuestion);
}
people03.onclick = () => {
    people03.src = "../img/hideImg01.jpg";
    drawQuestion(numberQuestion);
}

people04.onclick = () => {
    people04.src = "../img/hideImg02.jpg";
    drawQuestion(numberQuestion);
}
people05.onclick = () => {
    people05.src = "../img/hideImg02.jpg";
    drawQuestion(numberQuestion);
}
people06.onclick = () => {
    people06.src = "../img/hideImg02.jpg";
    drawQuestion(numberQuestion);
}

//reloading the pictures
btnReload.onclick = () => {
    people01.src = "../img/01_p.jpg";
    people02.src = "../img/02_p.jpg";
    people03.src = "../img/03_p.jpg";
    people04.src = "../img/04_p.jpg";
    people05.src = "../img/05_p.jpg";
    people06.src = "../img/06_p.jpg";

    //Reset Questions
    numberQuestion = 0;
    drawQuestion(numberQuestion);
}

//Sending to homePage
btnStart.onclick = () => {
    window.open("index.html", "_self");
}

//start with the first Question
btnMessage.style.display = "none";
drawQuestion(numberQuestion);


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

//Question object
const questions = [
    "Is of was hij/zij goed op school?",
    "Maakt hij/zij gebruik van het openbaar vervoer?",
    "Spaart hij/zij actief geld?",
    "Groet hij/zij de buren?",
    "Staat hij/zij altijd vroeg op?",
    "TODOS USTEDES FALLARON POR JUZGAR ANTES DE TIEMPO"
];

var numberQuestion = 0;

//Variables to control theat the images has to be clicked once
var clicks = [0, 0, 0, 0, 0, 0];

//Function to show the question
drawQuestion = (imageclicked) => {
    if (imageclicked == 0) {
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
}


people01.onclick = () => {
    people01.src = "./img/hideImg01.jpg";
    drawQuestion(clicks[0]);
    clicks[0] = 1;
}
people02.onclick = () => {
    people02.src = "./img/hideImg01.jpg";
    drawQuestion(clicks[1]);
    clicks[1] = 1;
}
people03.onclick = () => {
    people03.src = "./img/hideImg01.jpg";
    drawQuestion(clicks[2]);
    clicks[2] = 1;

}

people04.onclick = () => {
    people04.src = "./img/hideImg02.jpg";
    drawQuestion(clicks[3]);
    clicks[3] = 1;
}
people05.onclick = () => {
    people05.src = "./img/hideImg02.jpg";
    drawQuestion(clicks[4]);
    clicks[4] = 1;
}
people06.onclick = () => {
    people06.src = "./img/hideImg02.jpg";
    drawQuestion(clicks[5]);
    clicks[5] = 1;
}

//reloading the pictures
btnReload.onclick = () => {
    people01.src = "./img/01_p.jpg";
    people02.src = "./img/02_p.jpg";
    people03.src = "./img/03_p.jpg";
    people04.src = "./img/04_p.jpg";
    people05.src = "./img/05_p.jpg";
    people06.src = "./img/06_p.jpg";

    //Reset Questions
    numberQuestion = 0;
    drawQuestion(numberQuestion);
    btnMessage.style.display = "none";
    clicks = [0, 0, 0, 0, 0, 0];

}

btnMessage.onclick = () => {
    window.open("whoDidItMessage.html", "_self");
}

//Sending to homePage
btnStart.onclick = () => {
    window.open("index.html", "_self");
}



//start with the first Question
btnMessage.style.display = "none";
drawQuestion(numberQuestion);


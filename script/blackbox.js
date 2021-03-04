

//Get the buttons
const btnStart = document.getElementById("start");
const btnQuestions = document.getElementById("question-list");


//Sending to homePage
btnStart.onclick = () => {
    window.open("index.html", "_self");
}

btnQuestions.onclick = () => {

    window.open("./controller/questionListController.php", "_self");
}


//Get the buttons
const btnNextQuestion = document.getElementById("btnNextQuestion");


//Sending to homePage
btnNextQuestion.onclick = () => {
    window.open("answerUserController.php", "_self");
}


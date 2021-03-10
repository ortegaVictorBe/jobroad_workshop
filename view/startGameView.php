<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>BLACKBOX - Jobroad - Workshop Tools</title>
</head>

<body>
    <?php $session_id=session_id();          
    ?>

    <div class="container mt-3">
        <div id="header" class="row text-center mb-1">
            <div class="col">
                <div>
                    <img class="img-fluid float-left" src="../img/l_jobroad.gif" alt="" />
                </div>
                <div>
                    <h1 class="display-5 float-right">
                        <strong> BLACKBOX </strong>
                    </h1>
                </div>
            </div>
        </div>
        <div id="content" class="row text-center mb-1">

            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <?php if (isset($_POST['btnLoadTop3'])) { ?>
                    <div class="row">
                        <div class="col"><img src="../img/top3.png" class="img-fluid ml-3" /> </div>
                        <div class="col">
                            <?php $answer->getTop3($_SESSION['currentQuestion_ID'])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <fieldset class="mt-3">
                                    <input id="btnNextQuestionResults" type="submit" name="btnNextQuestionResults"
                                        class="btn btn-primary" value="Next Question">
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <?php }else{?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="scrollable-answers">
                                    <?php                                     
                                     $answer->getAnswersByQuestion($_SESSION['currentQuestion_ID']); ?></div>
                            </div>
                            <div class="col">
                                <div class="scrollable-answers">
                                    <?php $answer->getGroupedAnswersByQuestion($_SESSION['currentQuestion_ID']); ?>
                                </div>
                            </div>
                        </div>
                        <center>
                            <fieldset class="mt-3">
                                <input id="btnReloadAnswers" type="submit" class="btn btn-primary "
                                    name="btnReloadAnswers" value="Reload Answers">
                            </fieldset>

                            <fieldset class="mt-3">
                                <input id="btnLoadTop3" type="submit" name="btnLoadTop3" class="btn btn-primary"
                                    value="     View Top 3     ">
                            </fieldset>
                        </center>
                    </form>
                    <?php }?>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron p-2 text-center">
                    <h2>ANSWERS</h2>
                </div>
                <div class="jumbotron p-2 text-center">
                    <img src="../img/blackbox_bg_small.png" class="img-fluid" />
                </div>
                <div class="jumbotron p-2 text-center">
                    <div>
                        <h3><?php echo "Question # ".$_SESSION['currentQuestion_order'];?></h3>
                        <h2><?php echo $_SESSION['currentQuestion_description'];?></h2>
                    </div>

                </div>
            </div>
        </div>
        <div id="buttons" class="row text-center mb-1">
            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <button id="start" type="button" class="btn btn-warning">Home</button>
                    <button id="reload" type="button" class="btn btn-warning">
                        Blackbox - Home
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="../script/startGameView.js"></script>
</body>

</html>
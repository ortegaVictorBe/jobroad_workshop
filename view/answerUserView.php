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
    <!-- Getting the questions answered by session -->
    <?php 
    $session_id=session_id();    

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
        <?php
            $showMessage=0;
            $message="";
            $currentQuestion=$question->loadCurrentQuestion();
                
        
       
            $questionAnswered=$answer->questionAnswered($currentQuestion['ID'],$session_id);
            if (isset($questionAnswered)) {                
                $showMessage=1;
                $message=$questionAnswered['description'];                      
            }
            
            if(isset($_POST['btnUpdate'])){
                $return=0;
                if(isset($_POST['userAnswer'])){
                    $ID_Question=cleanInput($_POST['ID_Question']);
                    $userAnswer=strtoupper(cleaninput($_POST['userAnswer']));
                    $return=$answer->saveAnswer($ID_Question,$userAnswer,$session_id);                    
                }
                
                if (isset($return) && $return >0) {                     
                    $question->commitChanges();
                    $showMessage=1;
                    $message=$userAnswer;                      
                }
                
                }                
            
            //Next Question Button
            if (isset($_POST['btnNextQuestion'])) {
                $showMessage=0;
            } 
                
            
            ?>
        <!-- saveAnswer -->
        <div id="content" class="row text-center mb-1">
            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <form action="" method="post">

                        <input type="hidden" name="ID_Question"
                            value=<?php echo $question->loadCurrentQuestion()['ID']; ?>>
                        <h1 class="mt-3 mb-4">
                            <?php echo $currentQuestion['description'];?>
                        </h1>
                        <?php 
                        if($showMessage==0) {?>
                        <fieldset class="mt-3 mb-4">
                            <input type="text" name="userAnswer" size="25" required="true">
                        </fieldset>
                        <?php } else{
                        echo "<center><div id='answerMessage' class='alert alert-dismissible alert-warning p-1 mt-5 w-75'>
                        <h3 id='questionText' class='display-6'>
                          <strong>".$message."</strong></h3></div></center>";                        
                        } ?>

                        <?php if($showMessage==0) { ?>
                        <fieldset class="mt-3">
                            <input type="submit" class="btn btn-primary" name="btnUpdate" value="Send Answer">
                        </fieldset>
                        <? }else{ ?>
                        <fieldset class="mt-3">
                            <input id="btnNextQuestion" class="btn btn-primary" value="Next Question">
                        </fieldset>
                        <?}?>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron p-2 text-center">
                    <img src="../img/blackbox_bg_small.png" class="img-fluid" />
                </div>
                <div class="jumbotron p-2 text-center">
                    <img src="../img/player_think.png" class="img-fluid" />

                    <h6 class='text-center'><i class='fa fa-spinner fa-pulse fa-1x fa-fw'></i></i>
                        <span>Playing ...</span>
                    </h6>
                </div>
            </div>
        </div>
        <div id="buttons" class="row text-center mb-1">
            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <h4>Rules: Answer the question, send it and wait for instructions .. :) </h4>
                </div>
            </div>
        </div>
    </div>
    <script src="../script/answerUserView.js"></script>
</body>

</html>
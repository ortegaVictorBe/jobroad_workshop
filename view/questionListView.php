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
            <?php
            if(isset($_POST['btnUpdate'])){                
                foreach ($_POST['ID_Question'] as $IDs) {
                     $id_update=$IDs;
                     $desc_update=cleanInput($_POST['desc_Question'][$IDs]);
                     if(isset($_POST['available_Question'][$IDs])){
                        $available_update=1;    
                     }else
                     { 
                         $available_update=0;
                     }                     
                    
                     $order_update=cleanInput($_POST['order_Question'][$IDs]);
                     $return=$questions->updateQuestion($id_update, $desc_update, $available_update,$order_update);    
                }     
                
                $questions->commitChanges();                
            }
            ?>
            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <form action="" method="post">
                        <?php $questions->loadQuestions(); ?>
                        <div class="scrollable-questions">
                            <?php echo $questions->getQuestions(); ?>
                        </div>

                        <fieldset class="mt-2">
                            <input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron p-2 text-center">
                    <img src="../img/blackbox_bg_small.png" class="img-fluid" />
                </div>
                <div class="jumbotron p-2 text-center">
                    <h2 class="mb-4">Questions</h2>
                    <img src="../img/question_think.png" class="img-fluid" />
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
    <script src="../script/questionListView.js"></script>
</body>

</html>
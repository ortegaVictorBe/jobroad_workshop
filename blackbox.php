<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#question-list').on('click', function() {
            $("#content-content").load('controller/questionListController.php');
            return false;
        });

    });
    </script> -->
    <title>BLACKBOX - Jobroad - Workshop Tools</title>
</head>

<body>
    <div class="container mt-3">
        <div id="header" class="row text-center mb-1">
            <div class="col">
                <div>
                    <img class="img-fluid float-left" src="./img/l_jobroad.gif" alt="" />
                </div>
                <div>
                    <h1 class="display-5 float-right">
                        <strong> BLACKBOX </strong>
                    </h1>
                </div>
            </div>
        </div>
        <div id="content" class="row text-center mb-1">
            <div class="col-9">
                <div class="jumbotron p-2 text-center">
                    <img src="./img/blackbox_bg.png" class="img-fluid mr-5" />
                </div>
            </div>
            <div class="col-3">
                <div id="content-content" class="jumbotron p-2 text-center">
                    <div class="mb-2"><button id="question-list" type="button"
                            class="btn btn-warning btn-block">Questions</button>
                    </div>
                    <div class="mb-2"><button id="start-game" type="button" class="btn btn-warning btn-block">Start
                            Game</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="buttons" class="row text-center mb-1">

            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <button id="start" type="button" class="btn btn-warning">Home</button>

                </div>
            </div>
        </div>
    </div>

    <script src="./script/blackbox.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
    <script>
    $(document).ready(function() {
        function reloadUsers() {
            $("#usersCount").load("../view/userCountView.php");
        }
        setInterval(reloadUsers, 3000);
    });
    </script>

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

            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <div class="row">
                        <div class="col">
                            <div class="jumbotron p-2 text-center">
                                <img id="reloadUsers" src="../img/players_bg.png" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="row"></div>
                            <h6 class='text-center'><i class='fa fa-spinner fa-pulse fa-1x fa-fw'></i>
                                <span>Waiting for players ...</span>
                            </h6>
                            <div id="usersCount"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="jumbotron p-2 text-center">
                    <h2>Starting Game..</h2>
                </div>
                <div class="jumbotron p-2 text-center">
                    <img src="../img/blackbox_bg_small.png" class="img-fluid" />
                </div>
                <div class="jumbotron p-2 text-center">
                    <div>
                        <input id="playerUrl" class="img-fluid" type="text" value=<?php $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; $url_actual=substr($url_actual,0,-36   )."controller/preparePlayerController.php";
                        echo "$url_actual"; ?> onClick="this.select();">
                        <p>Player URL</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="buttons" class="row text-center mb-1">
            <div class="col">
                <div class="jumbotron p-2 text-center">
                    <form action="" method="post">

                        <input id="btnGo" type="submit" name="btnGo" class="btn btn-primary"
                            value="Let start the game!">

                        <button id="reload" type="button" class="btn btn-warning">
                            Blackbox - Home
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="../script/prepareGameView.js"></script>
</body>

</html>
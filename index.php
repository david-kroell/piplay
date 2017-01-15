<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PiPlay Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/specific.css">
</head>
    <body>
        <div class="login-form-wrapper">
            <div class="card">
                <div class="card-content">
                    <form class="col s12" action="controllers/login_logout.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" class="validate" name="username">
                                <label for="icon_prefix">Username</label>
                                <span class="red-text">
                                    <?php
                                        echo $_SESSION["loginFailed"] ?? '';
                                        $_SESSION["loginFailed"] = '';
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="icon_telephone" type="password" class="validate" name="password">
                                <label for="icon_telephone">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <i class="col s12 btn waves-effect waves-light waves-input-wrapper orange">
                                    <input style="width: inherit; height: inherit" class="waves-button-input" type="submit" value="Login">
                                </i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>
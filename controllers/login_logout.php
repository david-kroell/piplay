<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        //now login
        // TODO: Login with database
        $username = $_POST["username"];
        $password = $_POST["password"];
        // TODO: remove default login
        if ($username == "asdf" && $password == "1234" || $_SESSION["user"] == "asdf") {
            $_SESSION["user"] = $username;
            if (isset($_SESSION["loginFailed"]))
                unset($_SESSION["loginFailed"]);
            header("Location: /MediaCentre/music");
            return;
        } else {
            $_SESSION["loginFailed"] = 'Wrong username-password combination';
            header("Location: /");
            return;
        }
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "GET"){
    if($_GET["logout"] == "true"){
        //now logout
        $_SESSION = [];
        session_destroy();
        header("Location: /");
    }
}
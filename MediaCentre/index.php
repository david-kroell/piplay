<?php
session_start();
if($_SESSION["user"] == "admin")
{
    echo "what do to?";
}
require_once "../view/mediaCentreView.php";
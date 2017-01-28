<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["user"] == "asdf"){
    if(isset($_POST["addpath"])){
        include "../../models/MediaAPI.php";

        $path = $_POST["addpath"];
        //make absolute path if it is a relative one
        if(($path[0] == '.' && $path[1] == DIRECTORY_SEPARATOR)) {
            $path = ltrim($path, '.');
        } elseif ($path[0] != DIRECTORY_SEPARATOR)
        {
            $path = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.$path;
        }
        $path = realpath($path);

        if(!$path) {
            header("Location: /MediaCentre/settings/media");
            return;
        }

        $recursive = isset($_POST["recursive"]);
        $MediaAPI = new \PiCast\MediaAPI("../../media/media.json");
        $MediaAPI->AddMediaPath($path, $recursive);
        header("Location: /MediaCentre/settings/media");
        return;
    }
}elseif ($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["removepath"])){
        include "../../models/MediaAPI.php";
        $path = $_GET["removepath"];
        $MediaAPI = new \PiCast\MediaAPI("../../media/media.json");
        $MediaAPI->RemoveMediaPath($path);

        header("Location: /MediaCentre/settings/media");
        return;
    }
}
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["user"] == "asdf"){
    if(isset($_POST["addpath"])){
        include "../../models/MediaAPI.php";

        $path = $_POST["addpath"];
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
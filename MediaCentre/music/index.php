<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET" && $_SESSION["user"] == "asdf")
{
    include "../../model/MediaAPI.php";
    $MediaAPI = new \PiCast\MediaAPI();
    if(isset($_GET["refresh"])){
        $MediaAPI->UpdateMediaFromSameFolders();
        header("Location: /MediaCentre/music");
        return;
    }
    $media = $MediaAPI->GetSavedMedia();
    if($media == null)
        $media = [[], []];
}

require_once "../../view/mediaCentreMusicView.php";
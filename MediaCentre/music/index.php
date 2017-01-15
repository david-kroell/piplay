<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET" && $_SESSION["user"] == "asdf")
{
    include "../../models/MediaAPI.php";
    $MediaAPI = new \PiCast\MediaAPI("../../media/media.json");
    if(isset($_GET["refresh"])){
        $MediaAPI->UpdateMediaFromSameFolders();
        header("Location: /MediaCentre/music");
        return;
    }
    $media = $MediaAPI->GetSavedMedia();
    if($media == null)
        $media = [[], []];
}

require_once "../../views/mediaCentreMusicView.php";
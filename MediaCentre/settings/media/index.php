<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET" && $_SESSION["user"] == "asdf"){
    include "../../../model/MediaAPI.php";
    $MediaAPI = new \PiCast\MediaAPI();
    $media = $MediaAPI->GetSavedMedia();
    if($media == null){
        $media_paths = [];
    } else{
        $media_paths = $media[0];
    }
    require_once "../../../view/mediaCentreSettingsView.php";
}
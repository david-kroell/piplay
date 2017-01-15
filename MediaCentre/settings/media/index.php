<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET" && $_SESSION["user"] == "asdf"){
    include "../../../models/MediaAPI.php";
    $MediaAPI = new \PiCast\MediaAPI(null);
    $media_paths = $MediaAPI->GetSavedMedia();
    if($media_paths == null){
        $media_paths = [];
    } else{
        $media_paths = $media_paths[0];
    }
    require_once "../../../views/mediaCentreSettingsView.php";
}
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET" && $_SESSION["user"] == "asdf"){
    if(isset($_GET["play"])){
        $play = $_GET["play"];
        include "../../models/MediaAPI.php";
        $MediaAPI = new \PiCast\MediaAPI("../../media/media.json");
        $media = $MediaAPI->GetSavedMedia();
        $path_to_media =  $media[1][$play];

        //escape the spaces and use the & to fork the newly created process by the exec

        $path_to_media = '"'.$path_to_media;
        $path_to_media = $path_to_media.'"';

        //quit currently playing song
        //kill all omxplayer-processes
        exec('killall omxplayer.bin');


        //play song
        $pid = exec('/var/www/play.sh '.$path_to_media);

        //now it's playing the song twice (why?!?)
        //kill one, but careful.
        //wait until our script created a child process.
        sleep(0.8);
        exec('kill '.$pid);

        echo $play;
    } else if(isset($_GET["control"])){
        $control = $_GET["control"];
        $result;
        switch ($control){
            case 'pause':
                $result = 'p';
                break;
            case 'volup':
                $result = '+';
                break;
            case 'voldown':
                $result = '-';
                break;
            case 'speeddown':
                $result = '1';
                break;
            case 'speedup':
                $result = '2';
                break;
            default:
                die();
        }
        exec('/var/www/sendCommand.sh '.$result.' &');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 03-Jan-17
 * Time: 4:52 PM
 */

namespace PiCast;
// TODO: rewrite this for database use

class MediaAPI
{
    private $JSONfile;

    public function __construct($JSONfile = __DIR__."/../media/media.json")
    {
        $this->JSONfile = realpath($JSONfile);
    }

    /*
     * @param array $dirNames
     * @return void
     */
    private function SaveMedia(array $dirNames){
        if($dirNames == []){
            file_put_contents($this->JSONfile, json_encode(null));
            return;
        }
        $media = [];

        $media[0] = $dirNames;
        $media_names = [];
        foreach ($dirNames as $item){
            $media_paths = glob($item.DIRECTORY_SEPARATOR."*.*");
            foreach ($media_paths as $path)
                $media_names[] = pathinfo($path)['filename'];
            foreach ($media_paths as $i => $name){
                $media[1][$media_names[$i]] =  $name;
            }
            unset($media_paths, $media_names);
        }
        file_put_contents($this->JSONfile, json_encode($media));
        return;
    }

    /*
    * @return array
    */
    public function GetSavedMedia(){
        if(file_exists($this->JSONfile)) {
            $media = json_decode(file_get_contents($this->JSONfile), true);
            if (is_null($media))
                return [[], []];
            else
                return $media;
        }
    }

    /*
     * @param string $dirPath
     * @param bool $recursive
     * @return void
     */

    public function AddMediaPath(string $dirPath, bool $recursive){
        $dirPaths = [];
        if(file_exists($this->JSONfile))
            $dirPaths = json_decode(file_get_contents($this->JSONfile), true)[0]; //[0] is for the paths, [1] for the files
        if(is_null($dirPaths))
            $dirPaths = [];
        //add base dir
        $dirPaths[] = $dirPath;
        if($recursive){
            //merge already added dir paths and newly recursive found dirs
            $recursiveDirs = $this->getDirsRecursive($dirPath);
            $dirPaths = array_merge($dirPaths, $recursiveDirs);
        }
        $this->SaveMedia($dirPaths);
        return;
    }

    private function getDirsRecursive($dir, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(is_dir($path)) {
            if($value != "." && $value != "..") {
                $this->getDirsRecursive($path, $results);
                $results[] = $path;
            }
            }

        }
        return $results;
    }

    /*
     * @param string $dirPath
     * @return void
     */
    public function RemoveMediaPath(string $dirPath){
        if(file_exists($this->JSONfile)) {
            $media = json_decode(file_get_contents($this->JSONfile), true)[0]; //[0] is for the paths, [1] for the files
            if (is_null($media)) {
                $media = [[],[],[]];
            }
            unset($media[$dirPath]);
            $this->SaveMedia($media);
        }
    }

    public function UpdateMediaFromSameFolders(){
        $directoryPaths = $this->GetSavedMedia()[0];
        if($directoryPaths == null)
            $directoryPaths = [];
        if(file_exists($this->JSONfile))
            unlink($this->JSONfile);
        $this->SaveMedia($directoryPaths);
    }
}
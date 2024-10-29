<?php
namespace App\file ;

class FileAnalyze {


  
  /** 
  *  return the duration of videos
  */
  public static function duration(string $path)
  {


    $getID3 = new \getID3;
    $file = $getID3->analyze($path);
    $duration = date('H:i:s', $file['playtime_seconds']);
    return $duration ;
  
  }
}

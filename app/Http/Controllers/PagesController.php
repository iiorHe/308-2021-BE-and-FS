<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Int_;

class Game {
    private $year;
    private $title;
    private $genre;
    private $platform;
    private $devs;
    private $engine;
    private function __construct(Int $year, String $title, String $genre, 
    String $devs, String $engine, String $platform) {
      $this->year = $year;
      $this->title = $title;
      $this->genre = $genre;
      $this->devs = $devs;
      $this->engine = $engine;
      $this->platform = $platform;
    }
    public function GetYear(){
      return $this->year;
    }
    public function GetTitle(){
      return $this->title;
    }
    public function GetGenre(){
      return $this->genre;
    }
    public function GetDevs(){
      return $this->devs;
    }
    public function GetEngine(){
      return $this->engine;
    }
    public function GetPlatform(){
      return $this->platform;
    }
    public static function GetGames(){
      return [
        new Game(2014,"Hearthstone","Card Game","Blizzard Entertainment","Unity","Cross-Platform"),
        new Game(2017,"Hollow Knight","Metroidvania","Team Cherry","Unity","Cross-Platform"),
        new Game(2020,"Hades","Roguelike","Supergiant Games","Custom","Cross-Platform"),
        new Game(2018,"Subnautica","Action-Adventure","Unknown Worlds Entertainment","Unity","PC"),
      ];
    }
}


class PagesController extends Controller
{
    public function home(){
  return view("home");
 }
 public function project(){
  return view ("project");
 }
 public function games(){
  $pageTitle = 'Games';
  return view ("games",[
   'pageTitle' => $pageTitle,
   'games' => Game::GetGames()]
  );
 }
}
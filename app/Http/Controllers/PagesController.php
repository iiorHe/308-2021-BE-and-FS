<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Credit {
    public $name;
    public $position;

    public function __construct(String $name, String $position) {
        $this->name = $name;
        $this->position = $position;
    }

    public function GetName(){
        return $this->name;
    }

    public function GetPosition(){
        return $this->position;
    }

    public static function GetCredits() {
        return [
          new Credit("George Ozharenkov","Lead Developer"),
          new Credit("Ben Hale","Texture Artist"),
          new Credit("Casey Muratori","Spiritual Guru"),
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
 public function credits(){
  $pageTitle = 'Credits';
  return view ("credits",[
   'pageTitle' => $pageTitle,
   'credits' => Credit::GetCredits()]
  );
 }
}
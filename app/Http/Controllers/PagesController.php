<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Accredited{
 public $fullname;
 public $credits;
 public function _construct(String $fullname, String $credits){
 $this->fullname = $fullname;
 $this->credits = $credits;
 }
 public function GetName(){
  return $this->fullname;
 }
 public function GetCredits(){
  return $this->credits;
 }
 public static function GiveCredit(){
  return [
   new Accredited('Heorhii','Lead Developer'),
   new Accredited('Ben Hale', 'Artist'),
   new Accredited('Gabe Newell','Steam')
  ];
 }
}

class PagesController extends Controller
{
    public function home(){
  return view("/home");
 }
 public function project(){
  return view ("/project");
 }
 public function credits(){
  $pageTitle = 'Credits';
  return view ("/credits",[
   'pageTitle' => $pageTitle,
   'credits' => Accredited::GiveCredit()]
  );
 }
}
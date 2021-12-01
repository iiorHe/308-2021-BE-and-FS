<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Int_;

class PagesController extends Controller
{
    public function home(){
  return view("home");
 }
 public function project(){
  return view ("project");
 }
}
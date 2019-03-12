<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class XmlController extends Controller
{
  public function checkUser(){
      if(!Auth::check()){
        return view('home');
      }
  }
}

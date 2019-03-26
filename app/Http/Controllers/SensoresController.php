<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Sensor;
use App\User;

class SensoresController extends Controller
{
  public function checkUser(){
      if(!Auth::check()){
        return view('home');
      }
  }

  public function getAll(){
    $this->checkUser();

    $usuario = User::where('id','=',Auth::id())->first();
    if($usuario['Client'] <> 1){
      return redirect()->route('Dashboard');
    }else{
      $sensores = Sensor::all();

      return view('adminT')->with('sensores', $sensores);
    }
  }
}

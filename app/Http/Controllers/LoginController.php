<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
  public function submit(Request $request){
    $this->validate($request, [
      'usuario' => 'required',
      'password' => 'required'
    ]);

    //Login
    $
  }
}

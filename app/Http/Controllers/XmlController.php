<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class XmlController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

}

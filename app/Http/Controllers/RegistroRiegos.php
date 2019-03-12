<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\RegistroRiego;
use App\Cultivo;

class RegistroRiegos extends Controller
{
    public function checkUser(){
        if(!Auth::check()){
          return view('home');
        }
    }

    public function getRiegos(Request $request){
      $this->checkUser();
      $idCultivo = $request->input('idCultivo');

      $cultivo = Cultivo::where('id','=',$idCultivo)->first();
      if($cultivo['idUsuario'] != Auth::id()){
        return redirect()->route('Dashboard');
      }

      $riegos = RegistroRiego::where('idCultivo','=',$idCultivo)->get();

      return view('riegos')->with(compact('riegos', 'idCultivo'));//->with('riegos', $riegos);
    }

    public function RealizarRiego($id){
      $this->checkUser();

      \DB::table('registro_riegos')->insert(['idCultivo' => $id]);
      $data=array(
        'EXITO' => 'Exito'
      );

      echo json_encode($data);
    }
}

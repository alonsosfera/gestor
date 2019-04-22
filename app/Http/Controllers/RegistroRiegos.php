<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\RegistroRiego;
use App\Cultivo;

class RegistroRiegos extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRiegos(Request $request){
      $idCultivo = $request->input('idCultivo');

      $cultivo = Cultivo::where('id','=',$idCultivo)->first();
      if($cultivo['idUsuario'] != Auth::id()){
        return redirect()->route('Dashboard');
      }

      $riegos = RegistroRiego::where('idCultivo','=',$idCultivo)->get();

      return view('riegos')->with(compact('riegos', 'idCultivo'));//->with('riegos', $riegos);
    }

    public function RealizarRiego(Request $request){
      
      $cultivo = Cultivo::findOrFail($request->idCultivo);
      $url = $cultivo->Sensor . ':3000/valvula/'.$request->idSector;

      $client = new \GuzzleHttp\Client();
      $response = $client->get($url);

      if($response->getStatusCode() == '200'){
        $data = $response->getBody()->getContents();
        $valor = json_decode($data);
        \DB::table('registro_riegos')->insert(['idCultivo' => $request->idCultivo, 'Area' => $request->idSector]);
        return 'Realizando riego en sector '.$request->idSector;
      }else{
        return 'Error. Hay un problema con las valvulas';
      }


    }
}

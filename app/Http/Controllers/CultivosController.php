<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cultivo;
use App\User;

class CultivosController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

  public function submit(Request $request){
      $this->validate($request, [
        'nombre_cultivo' => 'required|min:5|max:20',
        'tipo_cultivo' => 'required',
        'ubicacion' => 'required',
        'tipo_riego' => 'required',
        'tipo_suelo' => 'required',
        'hectareas' => 'required|integer',
        'sectores' => 'required|integer',
      ]);

      //Create new Cultivo
      $cultivo = new Cultivo;
      $cultivo->NombreCultivo = $request->input('nombre_cultivo');
      $cultivo->idUsuario = Auth::id();
      $cultivo->Ubicacion = $request->input('ubicacion');
      $cultivo->TipoCultivo = $request->input('tipo_cultivo');
      $cultivo->TipoRiego = $request->input('tipo_riego');
      $cultivo->TipoSuelo = $request->input('tipo_suelo');
      $cultivo->TamanoCultivo = $request->input('hectareas');
      $cultivo->AreasRiego = $request->input('sectores');

      $cultivo->save();
      for($i=1; $i<=$request->input('sectores'); $i++){
        \DB::table('sensores')->insert(['Num' => $i , 'idUsuario' => Auth::id(),'idCultivo' => $cultivo->id]);
      }
      \DB::table('registro_riegos')->insert(['idCultivo' => $cultivo->id, 'Area' => 0]);
      //$id = $cultivo->id;
      echo json_encode($cultivo);

      //return redirect("/cultivo/$id");
    }

    public function update(Request $request, $id){
        $cultivo = Cultivo::findOrFail($id);
        $cultivo->NombreCultivo = $request->input('nombre_cultivo');
        $cultivo->Ubicacion = $request->input('ubicacion');
        $cultivo->TipoCultivo = $request->input('tipo_cultivo');
        $cultivo->TipoRiego = $request->input('tipo_riego');
        $cultivo->TipoSuelo = $request->input('tipo_suelo');
        $cultivo->TamanoCultivo = $request->input('hectareas');
        $cultivo->AreasRiego = $request->input('sectores');

        $cultivo->save();

        $output = '';
        $output .= "
         <tr class='item".$cultivo->id."'>
          <th scope='row'>".$cultivo->id."</td>
          <td>".$cultivo->idUsuario."</td>
          <td>".$cultivo->NombreCultivo."</td>
          <td>".$cultivo->TipoCultivo."</td>
          <td>".$cultivo->Ubicacion."</td>
          <td>".$cultivo->TipoRiego."</td>
          <td>".$cultivo->TipoSuelo."</td>
          <td>".$cultivo->TamanoCultivo."</td>
          <td>".$cultivo->AreasRiego."</td>
          <td>".$cultivo->Sensor."</td>
          <td>".$cultivo->created_at."</td>
          <td>".$cultivo->updated_at."</td>
          <td style='padding:.3rem;'>
              <button class='edit-modal btn btn-info' data-id='".$cultivo->id."' data-title='".$cultivo->NombreCultivo."' data-ubicacion='".$cultivo->Ubicacion."' data-tipo_cultivo='".$cultivo->TipoCultivo."' data-tipo_riego='".$cultivo->TipoRiego."' data-tipo_suelo='".$cultivo->TipoSuelo."' data-hectareas='".$cultivo->TamanoCultivo."' data-areas='".$cultivo->AreasRiego."'>
              <span class='fas fa-edit'></span></button>
              <button class='delete-modal btn btn-danger' data-id='".$cultivo->id."' data-title='".$cultivo->NombreCultivo."'>
              <span class='fas fa-trash'></span></button>
          </td>
         </tr>
         ";

         $data = array(
          'table_data'  => $output
         );
        echo json_encode($data);
    }

    public function sensor(Request $request, $id){
      $cultivo = Cultivo::findOrFail($id);
      $cultivo->Sensor = $request->input('url');

      $cultivo->save();

      $output = '';
      $output .= "
       <tr class='item".$cultivo->id."'>
        <th scope='row'>".$cultivo->id."</td>
        <td>".$cultivo->idUsuario."</td>
        <td>".$cultivo->NombreCultivo."</td>
        <td>".$cultivo->TipoCultivo."</td>
        <td>".$cultivo->Ubicacion."</td>
        <td>".$cultivo->TipoRiego."</td>
        <td>".$cultivo->TipoSuelo."</td>
        <td>".$cultivo->TamanoCultivo."</td>
        <td>".$cultivo->AreasRiego."</td>
        <td>".$cultivo->Sensor."</td>
        <td>".$cultivo->created_at."</td>
        <td>".$cultivo->updated_at."</td>
        <td style='padding:.3rem;'>
            <button class='edit-modal btn btn-info' data-id='".$cultivo->id."' data-title='".$cultivo->NombreCultivo."' data-ubicacion='".$cultivo->Ubicacion."' data-tipo_cultivo='".$cultivo->TipoCultivo."' data-tipo_riego='".$cultivo->TipoRiego."' data-tipo_suelo='".$cultivo->TipoSuelo."' data-hectareas='".$cultivo->TamanoCultivo."' data-areas='".$cultivo->AreasRiego."'>
            <span class='fas fa-edit'></span></button>
            <button class='delete-modal btn btn-danger' data-id='".$cultivo->id."' data-title='".$cultivo->NombreCultivo."'>
            <span class='fas fa-trash'></span></button>
        </td>
       </tr>
       ";

       $data = array(
        'table_data'  => $output
       );
      echo json_encode($data);
    }

    public function destroy($id)
    {
        $cultivo = Cultivo::findOrFail($id);
        $cultivo->delete();

        return response()->json($cultivo);
    }

    public function getDashboard(){
      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] == 1){
        return view('home')->with('cultivos','admin');
      }
      $cultivos = Cultivo::where('idUsuario','=', Auth::id())->get();

      return view('home')->with('cultivos', $cultivos);
    }

    public function getCultivo($idCultivo){

      $cultivo = Cultivo::with('TipoSuelo')->where([
          ['id','=',$idCultivo],
          ['idUsuario', '=', Auth::id()],
        ])->first();
        if($cultivo['idUsuario'] != Auth::id()){
          return redirect()->route('Dashboard');
        }

      $riego = \DB::table('registro_riegos')->where('idCultivo','=',$idCultivo)->orderBy('id', 'DESC')->first();

      return view('cultivo')->with(compact('riego', 'cultivo'));//with('cultivo', $culti)->with('riego', $riego);
    }

    public function getAll(){

      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] != 1){
        return redirect()->route('Dashboard');
      }

      $culti = Cultivo::all();

      return view('adminT')->with('cultivos', $culti);
    }

    public function deleteCultivo(Request $request){

      $this->validate($request, [
        'idCultivo' => 'required'
      ]);

      $cultivo = Cultivo::where([
          ['id','=',$request->input('idCultivo')],
          ['idUsuario', '=', Auth::id()],
        ])->first();
      if($cultivo['idUsuario'] != Auth::id()){
        return redirect()->route('Dashboard');
      }

      $cultivo->delete();

      return redirect()->route('Dashboard');
    }

    public function getUrl($id){
      $cultivo = Cultivo::findOrFail($id);
      $url = 'http://api.openweathermap.org/data/2.5/weather?'.$cultivo->Ubicacion.'&APPID=d484fed2f5c8c5eac5e4333abe63793e&units=metric&lang=es';

      $client = new \GuzzleHttp\Client();
      $response = $client->get($url);

      if($response->getStatusCode() == '200'){
        return $response->getBody()->getContents();
      }
    }

    public function ApiSensor(Request $request){
      if($request->ajax()){
        $idC = $request->get('idCultivo');
        $id = $request->get('id');

        $cultivo = Cultivo::findOrFail($idC);
        $url = $cultivo->Sensor . ':3000/sensor/'.$id;

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);

        if($response->getStatusCode() == '200'){
          $data = $response->getBody()->getContents();
          $valor = json_decode($data);
          if($valor->Humedad < 350 && $valor->Humedad > 200)
            return  'Muy Humedo';
          else if($valor->Humedad > 350 && $valor->Humedad < 430)
            return  'Humedo';
          else if($valor->Humedad > 430 && $valor->Humedad < 600)
            return  'Seco';
          else {
            return 'Error en el sensor';
          }
        }else{
          return  'Error en el servidor del sensor';
        }

      }
    }

    /*public function Auto(Request $request, $id, $time){
      $res = "";
      $cultivo = Cultivo::findOrFail($id);
      if(count($request->all())==0){
        $cultivo->Auto = 0;
        $cultivo->save();
        \DB::table('sectores_auto')->where('idCultivo', $id)->delete();
        $res =  'Riego automático apagado';
      }else{
        $url = $cultivo->Sensor . ':3000/vauto/'.$time;

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, $request);

        if($response->getStatusCode() == '200'){
          $data = $response->getBody()->getContents();
          $valor = json_decode($data);
          //\DB::table('registro_riegos')->insert(['idCultivo' => $request->idCultivo, 'Area' => $request->idSector]);
          $cultivo->Auto = 1;
          $cultivo->save();
          foreach($request->all() as $sector){
            \DB::table('sectores_auto')->insert(['idCultivo' => $id, 'Sector' => $sector]);
          }
          $res = $valor;//'Riego automático encendido';
        }else{
          $res = 'Error. Hay un problema con las valvulas';
        }

      }
      return $res;
    }*/

    public function Auto(Request $request, $id, $time){

      $res = "";
      $cultivo = Cultivo::findOrFail($id);
      if(count($request->all())==0){
        $cultivo->Auto = 0;
        $cultivo->save();
        \DB::table('sectores_auto')->where('idCultivo', $id)->delete();
        $res =  'Riego automático apagado';
      }else{
        $query = array();
        foreach ($request->all() as $key => $value) {
          $query[$key] = $value;
        }

        $url = $cultivo->Sensor . ':3000/vauto/'.$time;

        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, ['query' => $query]);

        //$response->getQuery()->set('query', '123');

        if($response->getStatusCode() == '200'){
          $data = $response->getBody()->getContents();

          $resultado = json_decode($data);
          if($resultado->Exito=='Si entró'){
            $res = 'Bien '.$resultado->Time;
            $cultivo->Auto = 1;
            $cultivo->save();
            foreach($request->all() as $sector){
              \DB::table('sectores_auto')->insert(['idCultivo' => $id, 'Sector' => $sector]);
            }
          }
        }else{
          $res = 'Error. Hay un problema con las valvulas';
        }
      }

      return $res;
    }

    public function search(Request $request){
      if($request->ajax()){
        $output = '';
        $query = $request->get('query');
        if($query != ''){
          $data = Cultivo::where('NombreCultivo', 'like', '%'.$query.'%')->orderBy('id')->get();
        }
        else{
         $data = Cultivo::orderBy('id')->get();
        }
        $total_row = $data->count();
        if($total_row > 0){
           foreach($data as $row){
             $output .= "
              <tr class='item".$row->id."'>
               <th scope='row'>".$row->id."</td>
               <td>".$row->idUsuario."</td>
               <td>".$row->NombreCultivo."</td>
               <td>".$row->Ubicacion."</td>
               <td>".$row->TipoCultivo."</td>
               <td>".$row->TipoRiego."</td>
               <td>".$row->TipoSuelo."</td>
               <td>".$row->TamanoCultivo."</td>
               <td>".$row->AreasRiego."</td>
               <td>".$row->Sensor."</td>
               <td>".$row->created_at."</td>
               <td>".$row->updated_at."</td>
               <td style='padding:.3rem;'>
                   <button class='edit-modal btn btn-info' data-id='".$row->id."' data-title='".$row->NombreCultivo."' data-ubicacion='".$row->Ubicacion."' data-tipo_cultivo='".$row->TipoCultivo."' data-tipo_riego='".$row->TipoRiego."' data-tipo_suelo='".$row->TipoSuelo."' data-hectareas='".$row->TamanoCultivo."' data-areas='".$row->AreasRiego."'>
                   <span class='fas fa-edit'></span></button>
                   <button class='delete-modal btn btn-danger' data-id='".$row->id."' data-title='".$row->NombreCultivo."'>
                   <span class='fas fa-trash'></span></button>
               </td>
              </tr>
              ";
           }
        }
        else{
         $output = '
         <tr>
          <td align="center" colspan="12">Datos no encontrados</td>
         </tr>
         ';
        }
        $data = array(
         'table_data'  => $output
        );
        echo json_encode($data);
      }
    }

}

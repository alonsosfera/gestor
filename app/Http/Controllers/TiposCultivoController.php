<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TipoCultivo;
use App\User;

class TiposCultivoController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

  protected function new(Request $request){
    $this->validate($request, [
      'nombre' => 'required|min:5|max:60',
      'usuario' => 'required|string|max:14',
      'correo' => 'required|string|email|max:255'
    ]);

    $fruto = new User;
    $fruto->name = $request->input('nombre');
    $fruto->username = $request->input('usuario');
    $fruto->email = $request->input('correo');
    $fruto->password = $request->input('usuario');
    $fruto->Client = 0;

    $user->save();
    return response()->json($user);
  }

  public function update(Request $request, $id){
      $fruto = TipoCultivo::findOrFail($id);
      $fruto->NombreFruto = $request->input('nombre_cultivo');
      $fruto->Ubicacion = $request->input('ubicacion');
      $fruto->TipoCultivo = $request->input('tipo_cultivo');
      $fruto->TipoRiego = $request->input('tipo_riego');
      $fruto->TipoSuelo = $request->input('tipo_suelo');
      $fruto->TamanoCultivo = $request->input('hectareas');
      $fruto->AreasRiego = $request->input('areas');

      $fruto->save();

      $output = '';
      $output .= "
       <tr class='item".$fruto->id."'>
        <th scope='row'>".$fruto->id."</td>
        <td>".$fruto->NombreFruto."</td>
        <td>".$fruto->KC_ENERO."</td>
        <td>".$fruto->KC_FEBRERO."</td>
        <td>".$fruto->KC_MARZO."</td>
        <td>".$fruto->KC_ABRIL."</td>
        <td>".$fruto->KC_MAYO."</td>
        <td>".$fruto->KC_JUNIO."</td>
        <td>".$fruto->KC_JULIO."</td>
        <td>".$fruto->KC_AGOSTO."</td>
        <td>".$fruto->KC_SEPTIEMBRE."</td>
        <td>".$fruto->KC_OCTUBRE."</td>
        <td>".$fruto->KC_NOVIEMBRE."</td>
        <td>".$fruto->KC_DICIEMBRE."</td>
        <td>".$fruto->created_at."</td>
        <td>".$fruto->updated_at."</td>
        <td style='padding:.3rem;'>
            <button class='edit-modal btn btn-info' data-id='".$fruto->id."' data-title='".$fruto->NombreFruto."' data-KC_ENERO='".$fruto->KC_ENERO."' data-KC_FEBRERO='".$fruto->KC_FEBRERO."' data-KC_MARZO='".$fruto->KC_MARZO."' data-KC_ABRIL='".$fruto->KC_ABRIL."' data-KC_MAYO='".$fruto->KC_MAYO."' data-KC_JUNIO='".$fruto->KC_JUNIO."' data-KC_JULIO='".$fruto->KC_JULIO."' data-KC_AGOSTO='".$fruto->KC_AGOSTO."' data-KC_SEPTIEMBRE='".$fruto->KC_SEPTIEMBRE."' data-KC_OCTUBRE='".$fruto->KC_OCTUBRE."' data-KC_NOVIEMBRE='".$fruto->KC_NOVIEMBRE."' data-KC_DICIEMBRE='".$fruto->KC_DICIEMBRE."'>
            <span class='fas fa-edit'></span></button>
            <button class='delete-modal btn btn-danger' data-id='".$fruto->id."' data-title='".$fruto->NombreFruto."'>
            <span class='fas fa-trash'></span></button>
        </td>
       </tr>
       ";

       $data = array(
        'table_data'  => $output
       );
      echo json_encode($data);
  }

  public function getFrutos(){
    $usuario = User::where('id','=',Auth::id())->first();
    if($usuario['Client'] <> 1){
      return redirect()->route('Dashboard');
    }

    $frutos = TipoCultivo::all();

    return view('adminT')->with('frutos', $frutos);
  }

  public function search(Request $request){
    if($request->ajax()){
      $output = '';
      $query = $request->get('query');
      if($query != ''){
        $data = TipoCultivo::where('NombreFruto', 'like', '%'.$query.'%')->orderBy('id')->get();
      }else{
        $data = TipoCultivo::orderBy('id')->get();
      }
      $total_row = $data->count();
      if($total_row > 0){
         foreach($data as $row){
           $output .= "
            <tr class='item".$row->id."'>
             <th scope='row'>".$row->id."</td>
             <td>".$row->NombreFruto."</td>
             <td>".$row->KC_ENERO."</td>
             <td>".$row->KC_FEBRERO."</td>
             <td>".$row->KC_MARZO."</td>
             <td>".$row->KC_ABRIL."</td>
             <td>".$row->KC_MAYO."</td>
             <td>".$row->KC_JUNIO."</td>
             <td>".$row->KC_JULIO."</td>
             <td>".$row->KC_AGOSTO."</td>
             <td>".$row->KC_SEPTIEMBRE."</td>
             <td>".$row->KC_OCTUBRE."</td>
             <td>".$row->KC_NOVIEMBRE."</td>
             <td>".$row->KC_DICIEMBRE."</td>
             <td>".$row->created_at."</td>
             <td>".$row->updated_at."</td>
             <td style='padding:.3rem;'>
                 <button class='edit-modal btn btn-info' data-id='".$row->id."' data-title='".$row->NombreFruto."' data-content='".$row->NombreFruto."'>
                 <span class='fas fa-edit'></span></button>
                 <button class='delete-modal btn btn-danger' data-id='".$row->id."' data-title='".$row->NombreFruto."' data-content='".$row->NombreFruto."'>
                 <span class='fas fa-trash'></span></button>
             </td>
            </tr>
            ";
         }
      }
      else{
       $output = '
       <tr>
        <td align="center" colspan="17">Datos no encontrados</td>
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

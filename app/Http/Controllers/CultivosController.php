<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cultivo;
use App\User;

class CultivosController extends Controller
{
  public function checkUser(){
      if(!Auth::check()){
        return view('home');
      }
  }

  public function submit(Request $request){
      $this->checkUser();
      $this->validate($request, [
        'nombre_cultivo' => 'required|min:5|max:20',
        'tipo_cultivo' => 'required',
        'ubicacion' => 'required|min:5|max:20',
        'tipo_riego' => 'required',
        'tipo_suelo' => 'required',
        'hectareas' => 'required|integer',
        'areas' => 'required|integer',
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
      $cultivo->AreasRiego = $request->input('areas');

      $cultivo->save();

      \DB::table('registro_riegos')->insert(['idCultivo' => $cultivo->id]);
      //$id = $cultivo->id;
      echo json_encode($cultivo);

      //return redirect("/cultivo/$id");
    }

    public function update(Request $request, $id){
        $this->checkUser();
        $cultivo = Cultivo::findOrFail($id);
        $cultivo->NombreCultivo = $request->input('nombre_cultivo');
        $cultivo->Ubicacion = $request->input('ubicacion');
        $cultivo->TipoCultivo = $request->input('tipo_cultivo');
        $cultivo->TipoRiego = $request->input('tipo_riego');
        $cultivo->TipoSuelo = $request->input('tipo_suelo');
        $cultivo->TamanoCultivo = $request->input('hectareas');
        $cultivo->AreasRiego = $request->input('areas');

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
      $this->checkUser();
      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] == 1){
        return view('home')->with('cultivos','admin');
      }
      $cultivos = Cultivo::where('idUsuario','=', Auth::id())->get();

      return view('home')->with('cultivos', $cultivos);
    }

    public function getCultivo($idCultivo){
      $this->checkUser();

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
      $this->checkUser();

      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] != 1){
        return redirect()->route('Dashboard');
      }

      $culti = Cultivo::all();

      return view('adminT')->with('cultivos', $culti);
    }

    public function deleteCultivo(Request $request){
      $this->checkUser();

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

    public function search(Request $request){
      $this->checkUser();
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
               <td>".$row->NombreCultivo."</td>
               <td>".$row->Ubicacion."</td>
               <td>".$row->TipoCultivo."</td>
               <td>".$row->TipoRiego."</td>
               <td>".$row->TipoSuelo."</td>
               <td>".$row->TamanoCultivo."</td>
               <td>".$row->AreasRiego."</td>
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

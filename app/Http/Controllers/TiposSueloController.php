<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TipoSuelo;
use App\User;

class TiposSueloController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    protected function new(Request $request){
      $this->validate($request, [
        'nombre' => 'required|min:5|max:60',
        'infiltracion' => 'required',
      ]);

      $suelo = new TipoSuelo;
      $suelo->name = $request->input('nombreSuelo');
      $suelo->descripcion = $request->input('descripcion');
      $suelo->infiltracion = $request->input('infiltracion');

      $suelo->save();
      $nsuelo = TipoSuelo::where('id','=',$suelo->id)->first();
      $output = '';
      $output .= "
       <tr class='item".$nsuelo->id."'>
        <th scope='row'>".$nsuelo->id."</td>
        <td>".$nsuelo->name."</td>
        <td>".$nsuelo->descripcion."</td>
        <td>".$nsuelo->infiltracion."</td>
        <td>".$nsuelo->created_at."</td>
        <td>".$nsuelo->updated_at."</td>
        <td style='padding:.3rem;'>
            <button class='edit-modal btn btn-info' data-id='".$nsuelo->id."' data-title='".$nsuelo->name."' data-content='".$nsuelo->name."'>
            <span class='fas fa-edit'></span></button>
            <button class='delete-modal btn btn-danger' data-id='".$nsuelo->id."' data-title='".$nsuelo->name."' data-content='".$nsuelo->name."'>
            <span class='fas fa-trash'></span></button>
        </td>
       </tr>
       ";

       $data = array(
        'table_data'  => $output
       );
       echo json_encode($data);
    }

    public function update(Request $request, $id){
        $suelo = TipoSuelo::findOrFail($id);
        $suelo->name = $request->input('nombreSuelo');
        $suelo->descripcion = $request->input('descripcion');
        $suelo->infiltracion = $request->input('infiltracion');
        $suelo->save();

        $output = '';
        $output .= "
         <tr class='item".$suelo->id."'>
          <th scope='row'>".$suelo->id."</td>
          <td>".$suelo->name."</td>
          <td>".$suelo->descripcion."</td>
          <td>".$suelo->infiltracion."</td>
          <td>".$suelo->created_at."</td>
          <td>".$suelo->updated_at."</td>
          <td style='padding:.3rem;'>
              <button class='edit-modal btn btn-info' data-id='".$suelo->id."' data-title='".$suelo->name."' data-descripcion='".$suelo->descripcion."' data-infiltracion='".$suelo->infiltracion."'>
              <span class='fas fa-edit'></span></button>
              <button class='delete-modal btn btn-danger' data-id='".$suelo->id."' data-title='".$suelo->name."'>
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
        $suelo = TipoSuelo::findOrFail($id);
        $suelo->delete();

        return response()->json($suelo);
    }

    public function getAll(){

      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] <> 1){
        return redirect()->route('Dashboard');
      }else{
        $suelos = TipoSuelo::all();

        return view('adminT')->with('suelos', $suelos);
      }
    }

    public function search(Request $request){
      if($request->ajax()){
        $output = '';
        $query = $request->get('query');
        if($query != ''){
          $data = TipoSuelo::where('name', 'like', '%'.$query.'%')->orderBy('id')->get();
        }
        else{
         $data = TipoSuelo::orderBy('id')->get();
        }
        $total_row = $data->count();
        if($total_row > 0){
           foreach($data as $row){
             $output .= "
              <tr class='item".$row->id."'>
               <th scope='row'>".$row->id."</td>
               <td>".$row->name."</td>
               <td>".$row->descripcion."</td>
               <td>".$row->infiltracion."</td>
               <td>".$row->created_at."</td>
               <td>".$row->updated_at."</td>
              </tr>
              ";
           }
        }
        else{
         $output = '
         <tr>
          <td align="center" colspan="7">Datos no encontrados</td>
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

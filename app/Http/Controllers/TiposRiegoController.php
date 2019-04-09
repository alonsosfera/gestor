<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TipoRiego;
use App\User;

class TiposRiegoController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    protected function new(Request $request){
      $this->validate($request, [
        'nombreRiego' => 'required|min:5|max:60',
        'eficiencia' => 'required',
      ]);

      $riego = new TipoRiego;
      $riego->name = $request->input('nombreRiego');
      $riego->eficiencia = $request->input('eficiencia');

      $riego->save();
      $nriego = TipoRiego::where('id','=',$riego->id)->first();
      $output = '';
      $output .= "
       <tr class='item".$nriego->id."'>
        <td scope='row'>".$nriego->id."</td>
        <td>".$nriego->name."</td>
        <td>".$nriego->eficiencia."</td>
        <td>".$nriego->created_at."</td>
        <td>".$nriego->updated_at."</td>
        <td style='padding:.3rem;'>
            <button class='edit-modal btn btn-info' data-id='".$nriego->id."' data-title='".$nriego->name."' data-content='".$nriego->name."'>
            <span class='fas fa-edit'></span></button>
            <button class='delete-modal btn btn-danger' data-id='".$nriego->id."' data-title='".$nriego->name."'>
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
        $riego = TipoRiego::findOrFail($id);
        $riego->delete();

        return response()->json($riego);
    }

    public function update(Request $request, $id){
        $riego = TipoRiego::findOrFail($id);
        $riego->name = $request->input('nombreRiego');
        $riego->eficiencia = $request->input('eficiencia');
        $riego->save();

        $output = '';
        $output .= "
         <tr class='item".$riego->id."'>
          <td scope='row'>".$riego->id."</td>
          <td>".$riego->name."</td>
          <td>".$riego->eficiencia."</td>
          <td>".$riego->created_at."</td>
          <td>".$riego->updated_at."</td>
          <td style='padding:.3rem;'>
              <button class='edit-modal btn btn-info' data-id='".$riego->id."' data-title='".$riego->name."' data-eficiencia='".$riego->eficiencia."'>
              <span class='fas fa-edit'></span></button>
              <button class='delete-modal btn btn-danger' data-id='".$riego->id."' data-title='".$riego->name."'>
              <span class='fas fa-trash'></span></button>
          </td>
         </tr>
         ";

         $data = array(
          'table_data'  => $output
         );
        echo json_encode($data);
    }

    public function getAll(){

      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] <> 1){
        return redirect()->route('Dashboard');
      }else{
        $riegos = TipoRiego::all();
        return view('adminT')->with('riegos', $riegos);
      }
    }

    public function search(Request $request){
      if($request->ajax()){
        $output = '';
        $query = $request->get('query');
        if($query != ''){
          $data = TipoRiego::where('name', 'like', '%'.$query.'%')->orderBy('id')->get();
        }
        else{
         $data = TipoRiego::orderBy('id')->get();
        }
        $total_row = $data->count();
        if($total_row > 0){
           foreach($data as $row){
             $output .= "
              <tr class='item".$row->id."'>
               <th scope='row'>".$row->id."</td>
               <td>".$row->name."</td>
               <td>".$row->eficiencia."</td>
               <td>".$row->created_at."</td>
               <td>".$row->updated_at."</td>
               <td style='padding:.3rem;'>
                   <button class='edit-modal btn btn-info' data-id='".$row->id."' data-title='".$row->name."' data-content='".$row->name."'>
                   <span class='fas fa-edit'></span></button>
                   <button class='delete-modal btn btn-danger' data-id='".$row->id."' data-title='".$row->name."'>
                   <span class='fas fa-trash'></span></button>
               </td>
              </tr>
              ";
           }
        }
        else{
         $output = '
         <tr>
          <td align="center" colspan="6">Datos no encontrados</td>
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

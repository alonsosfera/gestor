<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function checkUser(){
        if(!Auth::check()){
          return view('home');
        }
    }

    protected function new(Request $request){
      $this->checkUser();

      $user = new User;
      $user->name = $request->input('nombreUsuario');
      $user->username = $request->input('usuario');
      $user->email = $request->input('correo');
      $user->password = \Hash::make($request->input('usuario'));

      if($request->has('client') ){
        $user->Client = 1;
      }else{
        $user->Client = 0;
      }

      $user->save();
      $output ='';
      $output .= "
       <tr class='item".$user->id."'>
        <th scope='row'>".$user->id."</td>
        <td>".$user->name."</td>
        <td>".$user->username."</td>
        <td>".$user->email."</td>
        <td>".$user->Client."</td>
        <td>".$user->created_at."</td>
        <td>".$user->updated_at."</td>
        <td style='padding:.3rem;'>
            <button class='edit-modal btn btn-info' data-id='".$user->id."' data-title='".$user->name."' data-content='".$user->name."'>
            <span class='fas fa-edit'></span></button>
            <button class='delete-modal btn btn-danger' data-id='".$user->id."' data-title='".$user->name."'>
            <span class='fas fa-trash'></span></button>
        </td>
       </tr>
       ";
       $data = array(
        'table_data'  => $output
       );
      return response()->json($data);
    }

    public function update(Request $request, $id){
        $this->checkUser();
        $user = User::findOrFail($id);
        $user->name = $request->input('nombreUsuario');
        $user->username = $request->input('usuario');
        $user->email = $request->input('correo');
        $user->Client = $request->input('admin');

        if($request->has('client') ){
          $user->Client = 1;
        }else{
          $user->Client = 0;
        }
        $user->save();

        $output = '';
        $output .= "
         <tr class='item".$user->id."'>
          <th scope='row'>".$user->id."</td>
          <td>".$user->name."</td>
          <td>".$user->username."</td>
          <td>".$user->email."</td>
          <td>".$user->Client."</td>
          <td>".$user->created_at."</td>
          <td>".$user->updated_at."</td>
          <td style='padding:.3rem;'>
              <button class='edit-modal btn btn-info' data-id='".$user->id."' data-title='".$user->name."' data-usuario='".$user->username."' data-correo='".$user->email."' data-client='".$user->Client."'>
              <span class='fas fa-edit'></span></button>
              <button class='delete-modal btn btn-danger' data-id='".$user->id."' data-title='".$user->name."'>
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
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json($user);
    }

    public function getUsuarios(){
      $this->checkUser();
      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] <> 1){
        return redirect()->route('Dashboard');
      }

      $usuarios = User::all();

      return view('adminT')->with('users', $usuarios);
    }

    public function search(Request $request){
      $this->checkUser();
      if($request->ajax()){
        $output = '';
        $query = $request->get('query');
        if($query != ''){
          $data = User::where('name', 'like', '%'.$query.'%')->orderBy('id')->get();
        }
        else{
         $data = User::orderBy('id')->get();
        }

        $total_row = $data->count();
        if($total_row > 0){
           foreach($data as $row){
             $output .= "
              <tr class='item".$row->id."'>
               <th scope='row'>".$row->id."</td>
               <td>".$row->name."</td>
               <td>".$row->username."</td>
               <td>".$row->email."</td>
               <td>".$row->Client."</td>
               <td>".$row->created_at."</td>
               <td>".$row->updated_at."</td>
               <td style='padding:.3rem;'>
                   <button class='edit-modal btn btn-info' data-id='".$row->id."' data-title='".$row->name."' data-content='".$row->name."'>
                   <span class='fas fa-edit'></span></button>
                   <button class='delete-modal btn btn-danger' data-id='".$row->id."' data-title='".$row->name."' data-content='".$row->name."'>
                   <span class='fas fa-trash'></span></button>
               </td>
              </tr>
              ";
           }
        }
        else{
         $output = '
         <tr>
          <td align="center" colspan="8">Datos no encontrados</td>
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

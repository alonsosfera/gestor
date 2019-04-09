<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    protected function new(Request $request){

      $user = new User;
      $user->name = $request->input('nombreUsuario');
      $user->last = $request->input('apellidop');
      $user->last2 = $request->input('apellidom');
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
        <td>".$user->last."</td>
        <td>".$user->last2."</td>
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
        $user = User::findOrFail($id);
        $user->name = $request->input('nombreUsuario');
        $user->last = $request->input('apellidop');
        $user->last2 = $request->input('apellidom');
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
          <td>".$user->last."</td>
          <td>".$user->last2."</td>
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
      $usuario = User::where('id','=',Auth::id())->first();
      if($usuario['Client'] <> 1){
        return redirect()->route('Dashboard');
      }

      $usuarios = User::all();

      return view('adminT')->with('users', $usuarios);
    }

    public function search(Request $request){
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
               <td>".$row->last."</td>
               <td>".$row->last2."</td>
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
          <td align="center" colspan="10">Datos no encontrados</td>
         </tr>
         ';
        }
        $data = array(
         'table_data'  => $output
        );
        echo json_encode($data);
      }
    }

    public function changePassword(Request $request){
        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed|same:new-password_confirmation',
            'new-password_confirmation' => 'required|string|min:6'
        ]);
        if (!(\Hash::check($request->input('current-password'), Auth::user()->password))) {
            // The passwords matches
             $data = array(
              'Error'  => 'Contraseña actual incorrecta. Intenta de nuevo'
             );
            return json_encode($data);
        }
        if(strcmp($request->input('current-password'), $request->input('new-password')) == 0){
            //Current password and new password are same
             $data = array(
              'Error'  => 'Tu nueva contraseña no puede ser la misma que la actual. Favor de elegir una diferente.'
             );
            return json_encode($data);
        }
        //Change Password
        $user = Auth::user();
        $user->password = \Hash::make($request->input('new-password'));
        $user->save();
        $data = array(
         'Exito'  => 'Cambio de contraseña satisfactorio !'
        );
        return json_encode($data);
    }
}

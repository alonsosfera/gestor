<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CsvController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }

    public function Download($file, $name){
        header('Content-Disposition: attachment; filename="'.$name.'".csv"');
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
  /* Generar archivo CSV
   * Aprender a trabajar con funciones de manejo de archivos de texto plano
   *
   * Que es lo indispensable : tabla
   * Funciones para crear archivos
   * */

   public function RiegosCliente($idCultivo){

      $riegos = \DB::table('registro_riegos')->where('idCultivo','=',$idCultivo)->get();
      $name = 'Riegos'.time();
      $path = public_path('/files/'.$name.'.csv');
      $archivo_csv = fopen($path, 'w+');
      fwrite($archivo_csv,"#, FECHA Y HORA\n");
      foreach($riegos as $riego){
          fwrite($archivo_csv, $riego->id.','.$riego->fecha."\n");
      }
      fclose($archivo_csv);
      $this->Download($path, $name);
   }

   public function Users(){

      $users = \DB::table('users')->get();
      $name = 'Usuarios'.time();
      $path = public_path('/files/'.$name.'.csv');
      $archivo_csv = fopen($path, 'w+');
      fwrite($archivo_csv,"ID_USUARIO, NOMBRE, USUARIO, CORREO, ADMIN, CREADO, EDITADO\n");
      foreach($users as $user){
          fwrite($archivo_csv, $user->id.','. utf8_decode($user->name).','.$user->username.','.$user->email.','.$user->Client.','.$user->created_at.','.$user->updated_at."\n");
      }
      fclose($archivo_csv);
      $this->Download($path, $name);

   }

   public function Cultivos(){

      $cultivos = \DB::table('cultivos')->get();
      $name = 'Cultivos'.time();
      $path = public_path('/files/'.$name.'.csv');
      $archivo_csv = fopen($path, 'w+');
      fwrite($archivo_csv,utf8_decode("ID_CULTIVO, ID_USUARIO, USUARIO, NOMBRE, FRUTO, UBICACIÓN, TIPO DE RIEGO, TIPO DE SULEO, HECTAREAS, AREAS DE RIEGO, CREADO, EDITADO")."\n");
      foreach($cultivos as $cultivo){
          fwrite($archivo_csv, $cultivo->id.','. $cultivo->idUsuario.','.utf8_decode($cultivo->NombreCultivo).','.utf8_decode($cultivo->TipoCultivo).','.$cultivo->Ubicacion.','.$cultivo->TipoRiego.','.$cultivo->TipoSuelo.','.$cultivo->TamanoCultivo.','.$cultivo->AreasRiego.','.$cultivo->created_at.','.$cultivo->updated_at."\n");
      }
      fclose($archivo_csv);
      $this->Download($path, $name);

   }

   public function Frutos(){

      $frutos = \DB::table('tipo_cultivos')->get();
      $name = 'Frutos'.time();
      $path = public_path('/files/'.$name.'.csv');
      $archivo_csv = fopen($path, 'w+');
      fwrite($archivo_csv,"ID_FRUTO, NOMBRE, KC_ENERO, KC_FEBRERO, KC_MARZO, KC_ABRIL, KC_MAYO, KC_JUNIO, KC_JULIO, KC_AGOSTO, KC_SEPTIEMBRE, KC_OCTUBRE, KC_NOVIEMBRE, KC_DICIEMBRE, CREADO, EDITADO\n");
      foreach($frutos as $fruto){
          fwrite($archivo_csv, $fruto->id.','. utf8_decode($fruto->NombreFruto).','.$fruto->KC_ENERO.','.$fruto->KC_FEBRERO.','.$fruto->KC_MARZO.','.$fruto->KC_ABRIL.','.$fruto->KC_MAYO.','.$fruto->KC_JUNIO.','.$fruto->KC_JULIO.','.$fruto->KC_AGOSTO.','.$fruto->KC_SEPTIEMBRE.','.$fruto->KC_OCTUBRE.','.$fruto->KC_NOVIEMBRE.','.$fruto->KC_DICIEMBRE.','.$fruto->created_at.','.$fruto->updated_at."\n");
      }
      fclose($archivo_csv);
      $this->Download($path, $name);

   }

   public function Riegos(){

      $riegos = \DB::table('tipo_riegos')->get();
      $name = 'TiposRiego'.time();
      $path = public_path('/files/'.$name.'.csv');
      $archivo_csv = fopen($path, 'w+');
      fwrite($archivo_csv,"ID_RIEGO, NOMBRE, EFICIENCIA, CREADO, EDITADO\n");
      foreach($riegos as $riego){
          fwrite($archivo_csv, $riego->id.','. utf8_decode($riego->name).','.$riego->eficiencia.','.$riego->created_at.','.$riego->updated_at."\n");
      }
      fclose($archivo_csv);
      $this->Download($path, $name);

   }

   public function Suelos(){

      $suelos = \DB::table('tipo_suelos')->get();
      $name = 'TipoSuelos'.time();
      $path = public_path('/files/'.$name.'.csv');
      $archivo_csv = fopen($path, 'w+');
      fwrite($archivo_csv,utf8_decode("ID_SUELO, NOMBRE, DESCRIPCIÓN, INFILTRACIÓN, CREADO, EDITADO")."\n");
      foreach($suelos as $suelo){
          fwrite($archivo_csv, $suelo->id.','. utf8_decode($suelo->name).','.$suelo->descripcion.','.$suelo->infiltracion.','.$suelo->created_at.','.$suelo->updated_at."\n");
      }
      fclose($archivo_csv);
      $this->Download($path, $name);

   }

}

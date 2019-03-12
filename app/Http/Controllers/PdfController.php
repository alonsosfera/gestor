<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
  public function checkUser(){
      if(!Auth::check()){
        return view('home');
      }
  }

  public function RiegosCliente($idCultivo){
    $this->checkUser();

    $pdf = \App::make('dompdf.wrapper');
    $output = '
      <h1 align="center"> Riegos del cultivo </h1>
      <table width="100%" style="border-collapse:collapse; border: 0px;">
      <tr>
        <th style="border:1px solid; padding:12px;">#</th>
        <th style="border:1px solid; padding:12px;">Fecha y Horario</th>
      </tr>
    ';

    $riegos = \DB::table('registro_riegos')->where('idCultivo','=',$idCultivo)->get();
    foreach($riegos as $riego){
      $output.='
        <tr>
          <th style="border:1px solid; padding:12px;">'.$riego->id.'</th>
          <td style="border:1px solid; padding:12px;">'.$riego->fecha.'</td>
        </tr>
      ';
    }
    $output .= '</table>';

    $pdf->loadHTML($output);
    return $pdf->download('Riegos.pdf');
  }

  public function Users(){
    $this->checkUser();
    $pdf = \App::make('dompdf.wrapper');
    $output = '
      <h1 align="center"> Usuarios </h1>
      <table width="100%" style="border-collapse:collapse; border: 0px;">
      <tr>
        <th style="border:1px solid; padding:12px;" width="5%">ID</th>
        <th style="border:1px solid; padding:12px;" width="20%">Nombre</th>
        <th style="border:1px solid; padding:12px;" width="15%">Usuario</th>
        <th style="border:1px solid; padding:12px;" width="20%">Correo</th>
        <th style="border:1px solid; padding:12px;" width="20%">Creado</th>
        <th style="border:1px solid; padding:12px;" width="20%">Editado</th>
      </tr>
    ';

    $users = \DB::table('users')->get();
    foreach($users as $user){
      $output.='
        <tr>
          <th style="border:1px solid; padding:12px;">'.$user->id.'</th>
          <td style="border:1px solid; padding:12px;">'.$user->name.'</td>
          <td style="border:1px solid; padding:12px;">'.$user->username.'</td>
          <td style="border:1px solid; padding:12px;">'.$user->email.'</td>
          <td style="border:1px solid; padding:12px;">'.$user->created_at.'</td>
          <td style="border:1px solid; padding:12px;">'.$user->updated_at.'</td>
        </tr>
      ';
    }
    $output .= '</table>';

    $pdf->loadHTML($output);
    return $pdf->download('Usuarios.pdf');

  }

  public function Cultivos(){
    $this->checkUser();
    $pdf = \App::make('dompdf.wrapper');
    $output = '
      <h1 align="center"> Cultivos </h1>
      <table width="100%" style="border-collapse:collapse; border: 0px;">
      <tr>
        <th style="border:1px solid; padding:12px;" width="5%">ID</th>
        <th style="border:1px solid; padding:12px;" width="5%">Usuario</th>
        <th style="border:1px solid; padding:12px;" width="15%">Nombre Cultivo</th>
        <th style="border:1px solid; padding:12px;" width="10%">Fruto</th>
        <th style="border:1px solid; padding:12px;" width="10%">Ubicación</th>
        <th style="border:1px solid; padding:12px;" width="10%">Tipo Riego</th>
        <th style="border:1px solid; padding:12px;" width="10%">Tipo Suelo</th>
        <th style="border:1px solid; padding:12px;" width="5%">Tamaño</th>
        <th style="border:1px solid; padding:12px;" width="15%">Creado</th>
        <th style="border:1px solid; padding:12px;" width="15%">Editado</th>
      </tr>
    ';

    $cultivos = \DB::table('cultivos')->get();
    foreach($cultivos as $cultivo){
      $output.='
        <tr>
          <th style="border:1px solid; padding:12px;">'.$cultivo->id.'</th>
          <th style="border:1px solid; padding:12px;">'.$cultivo->idUsuario.'</th>
          <td style="border:1px solid; padding:12px;">'.$cultivo->NombreCultivo.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->TipoCultivo.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->Ubicacion.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->TipoRiego.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->TipoSuelo.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->TamanoCultivo.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->created_at.'</td>
          <td style="border:1px solid; padding:12px;">'.$cultivo->updated_at.'</td>
        </tr>
      ';
    }
    $output .= '</table>';

    $pdf->loadHTML($output)->setPaper('a4', 'landscape');
    return $pdf->download('Cultivos.pdf');
  }

  public function Frutos(){
    $this->checkUser();
    $pdf = \App::make('dompdf.wrapper');
    $output = '
      <h1 align="center"> Frutos </h1>
      <table width="100%" style="border-collapse:collapse; border: 0px;">
      <tr>
        <th style="border:1px solid; padding:12px;" width="5%">ID</th>
        <th style="border:1px solid; padding:12px;" width="15%">Fruto</th>
        <th style="border:1px solid; padding:12px;">KC Enero</th>
        <th style="border:1px solid; padding:12px;">KC Feb.</th>
        <th style="border:1px solid; padding:12px;">KC Marzo</th>
        <th style="border:1px solid; padding:12px;">KC Abril</th>
        <th style="border:1px solid; padding:12px;">KC Mayo</th>
        <th style="border:1px solid; padding:12px;">KC Junio</th>
        <th style="border:1px solid; padding:12px;">KC Julio</th>
        <th style="border:1px solid; padding:12px;">KC Agosto</th>
        <th style="border:1px solid; padding:12px;">KC Sept.</th>
        <th style="border:1px solid; padding:12px;">KC Oct.</th>
        <th style="border:1px solid; padding:12px;">KC Nov.</th>
        <th style="border:1px solid; padding:12px;">KC Dic.</th>
        <th style="border:1px solid; padding:12px;" width="15%">Creado</th>
        <th style="border:1px solid; padding:12px;" width="15%">Editado</th>
      </tr>
    ';

    $frutos = \DB::table('tipo_cultivos')->get();
    foreach($frutos as $fruto){
      $output.='
        <tr>
          <th style="border:1px solid; padding:12px;">'.$fruto->id.'</th>
          <th style="border:1px solid; padding:12px;">'.$fruto->NombreFruto.'</th>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_ENERO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_FEBRERO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_MARZO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_ABRIL.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_MAYO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_JUNIO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_JULIO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_AGOSTO.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_SEPTIEMBRE.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_OCTUBRE.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_NOVIEMBRE.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->KC_DICIEMBRE.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->created_at.'</td>
          <td style="border:1px solid; padding:12px;">'.$fruto->updated_at.'</td>
        </tr>
      ';
    }
    $output .= '</table>';

    $pdf->loadHTML($output)->setPaper('a4', 'landscape');
    return $pdf->download('Frutos.pdf');
  }

  public function Riegos(){
    $this->checkUser();
    $pdf = \App::make('dompdf.wrapper');
    $output = '
      <h1 align="center"> Riegos </h1>
      <table width="100%" style="border-collapse:collapse; border: 0px;">
      <tr>
        <th style="border:1px solid; padding:12px;" width="5%">ID</th>
        <th style="border:1px solid; padding:12px;" width="20%">Nombre Riego</th>
        <th style="border:1px solid; padding:12px;">Eficiencia</th>
        <th style="border:1px solid; padding:12px;" width="30%">Creado</th>
        <th style="border:1px solid; padding:12px;" width="30%">Editado</th>
      </tr>
    ';

    $riegos = \DB::table('tipo_riegos')->get();
    foreach($riegos as $riego){
      $output.='
        <tr>
          <th style="border:1px solid; padding:12px;">'.$riego->id.'</th>
          <th style="border:1px solid; padding:12px;">'.$riego->name.'</th>
          <td style="border:1px solid; padding:12px;">'.$riego->eficiencia.'</td>
          <td style="border:1px solid; padding:12px;">'.$riego->created_at.'</td>
          <td style="border:1px solid; padding:12px;">'.$riego->updated_at.'</td>
        </tr>
      ';
    }
    $output .= '</table>';

    $pdf->loadHTML($output);
    return $pdf->download('Riegos.pdf');
  }

  public function Suelos(){
    $this->checkUser();
    $pdf = \App::make('dompdf.wrapper');
    $output = '
      <h1 align="center"> Suelos </h1>
      <table width="100%" style="border-collapse:collapse; border: 0px;">
      <tr>
        <th style="border:1px solid; padding:12px;" width="5%">ID</th>
        <th style="border:1px solid; padding:12px;" width="15%">Nombre Suelo</th>
        <th style="border:1px solid; padding:12px;" width="30%">Descripción</th>
        <th style="border:1px solid; padding:12px;">Infiltración</th>
        <th style="border:1px solid; padding:12px;" width="15%">Creado</th>
        <th style="border:1px solid; padding:12px;" width="15%">Editado</th>
      </tr>
    ';

    $suelos = \DB::table('tipo_suelos')->get();
    foreach($suelos as $suelo){
      $output.='
        <tr>
          <th style="border:1px solid; padding:12px;">'.$suelo->id.'</th>
          <th style="border:1px solid; padding:12px;">'.$suelo->name.'</th>
          <td style="border:1px solid; padding:12px;">'.$suelo->descripcion.'</td>
          <td style="border:1px solid; padding:12px;">'.$suelo->infiltracion.'</td>
          <td style="border:1px solid; padding:12px;">'.$suelo->created_at.'</td>
          <td style="border:1px solid; padding:12px;">'.$suelo->updated_at.'</td>
        </tr>
      ';
    }
    $output .= '</table>';

    $pdf->loadHTML($output);
    return $pdf->download('Suelos.pdf');
  }
}

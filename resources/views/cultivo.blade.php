@extends('layouts.app')

@section('content')
    <?php setlocale (LC_TIME, "es_MX.UTF-8");   ?>
    <h1 class="text-center mb-4">{{$cultivo['NombreCultivo']}} <img src="/img/{{$cultivo['TipoCultivo']}}.png" height='40' width= '40' class="img-fluid" alt="Fruto"/></h1>
    <a id="idC" hidden>{{$cultivo['id']}}</a>

    <div class="container-fluid">
      <div class="card-deck">

        <div class="col-sm-3 col-md-4 col-lg-4 weather">
          <div class="card my-3" align-items-center style="height: 350px;">
            <h5 class="card-header">Temperatura Ambiental</h5>
            <div class="my-auto align-items-center">
              <div class="card-body">
                <H1 class="text-center" id="temperatura"></H1>
                <hr>
                <h3 class="card-title text-center" id="nombretemperatura"><strong></strong></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-md-4 col-lg-4">
          <div class="card my-3" align-items-center style="height: 350px;">
            <h5 class="card-header">
              <i class="fas fa-sm fa-power-off" id="EstadoAutomatico" <?php if($cultivo->Auto == 1) echo 'style="color:#00cc00" title="Encendido"'; else echo 'style="color:#FF0000" title="Apagado"' ?>></i>  Sistema de Riego
              <div class="btn-group dropleft float-right">
               <button class="btn btn-light btn-sm order-1 order-sm-0 dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:0px; border:0;"><i class="fas fa-list-ol fa-lg text-alert"></i></button>
               <div class="dropdown-menu keep-toggle" id="DropAuto" aria-labelledby="dropdownMenuButton">
                 <label class="dropdown-item">Manual: <button id="autocheck" class="btn btn-success btn-xs" type="button" name="button">ON</button><!--<label class="switch"><input id="autocheck" type="checkbox" @if($cultivo->Auto == 1)checked @endif><span class="slider round"></span></label>--></label>
                 <div class="dropdown-divider"></div>
                 <div class="dropdown-item">

                   <div class="inputs-form" title="Hora de riego" style="text-align: center;">
                     <div class="input-item">
                       <input type="number" min="1" name="autotime" id="autotime" placeholder="Minutos" autocomplete="off" required="" style=""><label for="autotime"><i class="fas fa-stopwatch"></i></label>
                     </div>
                   </div>
                 </div>
                 <form class="form-horizontal" id="SectoresAuto" method="POST">
                   <div style="text-align: center;">
                     <div class="select-size">
                       @for($i=1; $i<=$cultivo->AreasRiego; $i++)
                         <!--<label class="dropdown-item"><input value="{{$i}}" name="SectorAu" onclick="toggleInpOff()" type="checkbox">Sector {{$i}}</label>-->
                         <input type="checkbox" name="SectorAu" id="S{{$i}}" value="{{$i}}">
                         <label class="labelSect" for="S{{$i}}">Sector {{$i}}</label>
                       @endfor
                     </div>
                   </div>
                 </form>
               </div>
              </div>
            </h5>
            <div class="my-auto align-items-center">
              <div class="card-body" id="Riego">
                <div class="container">
                  <form class="form-horizontal" method="post">
                    <td class="row">
                        <div class="inputs-form" title="Días de riego" style="text-align: center; margin-bottom:6px">
                          <label for="" style="color:#A9A9A9; margin:0px">Días de riego</label>
                          <div class="select-size">
                            <input type="checkbox" name="DiasRiego" id="Lunes" value="1">
                            <label class="labelCheck" for="Lunes">L</label>
                            <input type="checkbox" name="DiasRiego" id="Martes" value="2">
                            <label class="labelCheck" for="Martes">M</label>
                            <input type="checkbox" name="DiasRiego" id="Miercoles" value="3">
                            <label class="labelCheck" for="Miercoles">M</label>
                            <input type="checkbox" name="DiasRiego" id="Jueves" value="4">
                            <label class="labelCheck" for="Jueves">J</label>
                            <input type="checkbox" name="DiasRiego" id="Viernes" value="5">
                            <label class="labelCheck" for="Viernes">V</label>
                            <input type="checkbox" name="DiasRiego" id="Sabado" value="6">
                            <label class="labelCheck" for="Sabado">S</label>
                            <input type="checkbox" name="DiasRiego" id="Domingo" value="0">
                            <label class="labelCheck" for="Domingo">D</label>
                            <input type="checkbox" onClick="toggle(this)" id="Todos">
                            <label class="labelC" for="Todos">Todos</label>

                          </div>
                        </div>
                        <div class="inputs-form" title="Hora de riego" style="text-align: center; margin-bottom:6px">
                          <div class="input-item">
            								<input class="timepicker" type="text" name="horariego" id="horariego" placeholder="Hora de riego" autocomplete="off" required=""><label for="horariego"><i class="fas fa-clock"></i></label>
            							</div>
                        </div>
                        <div class="inputs-form" title="Tiempo de riego" style="text-align: center; margin-bottom:6px">
                          <div class="input-item">
            								<input type="number" min="1" name="tiemporiego" id="tiemporiego" placeholder="Tiempo (Min)" autocomplete="off" required=""><label for="tiemporiego"><i class="fas fa-stopwatch"></i></label>
            							</div>
                        </div>
                    </td>
                    <td class="row">
                      <button type="button" id="AutoRiego" class="btn btn-sm btn-<?php if($cultivo->Auto == 1) echo 'danger'; else echo 'success' ?> btn-block"><?php if($cultivo->Auto == 1) echo 'Apagar'; else echo 'Automatizar' ?></button>
                    </td>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-md-4 col-lg-4">
          <div class="card my-3" align-items-center style="height: 350px;">
            <h5 class="card-header">Sectores de Riego</h5>
            <div id="DivRiego" class="my-auto align-items-center">
              <div class="card-body" id="humedad">
                <div class="col">
                  <H1 class="text-center" id="ValorHumedad"></H1>
                </div>
                <hr>
                <h3 class="card-title text-center"><strong>Humedad</strong></h3>
                <select class="form-control SelectSensor mx-auto" name="Sensor" id="Sensor" style="text-align-last:center;height:25px; width: 100px;padding:0px" required>
                <option value="" selected disabled>Sector</option>
                @for($i=1; $i<=$cultivo->AreasRiego; $i++)
                  <option value='{{$i}}'> {{$i}}</option>;
                @endfor
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-md-4 col-lg-4">
          <div class="card my-3" align-items-center style="height: 350px;">
            <h5 class="card-header">Registro de riegos</h5>
            <div class="my-auto align-items-center">
              <div class="card-body" id="Historial">
                <H3 class="text-center">Ultimo riego en sector {{$riego->Area}}:</H3>
                <H2 class="text-center" title="Area:">{{strftime("%D - %H:%M", strtotime($riego->fecha))}} </H2>
                <hr>
                <form class="" action="/registros">
                  <input type="text" name="idCultivo" value="{{$cultivo['id']}}" hidden>
                  <button type="submit" class="btn btn-secondary btn-lg btn-block">Historial completo</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-md-4 col-lg-4">
          <div class="card my-3" style="height: 350px;">
            <h5 class="card-header">Datos del cultivo<button class="float-right btn btn-light btn-sm order-1 order-sm-0" href="#" style="padding:0px; border:0;"><i class="fas fa-edit fa-lg text-alert"></i></button></h5>
            <div class="my-auto align-items-center" style="overflow: auto;">
              <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4><strong>Fruto:</strong> {{$cultivo->TipoCultivo}}</h4>
                    </div>
                    <div class="col">
                      <h4><strong>Hectareas:</strong> {{$cultivo->TamanoCultivo}}</h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <h4><strong>Suelo:</strong> {{$cultivo->suelo['name']}}</h4>
                    </div>
                    <div class="col">
                      <h4><strong>Riego:</strong> {{$cultivo->riego['name']}}</h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <h4><strong>Secciones de Riego:</strong> {{$cultivo->AreasRiego}}</h4>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="ml-auto">
            <button type="button" name="button" class="open-BorrarCultivoDialog btn btn-danger "  data-id="{{$cultivo['id']}}" data-toggle="modal" data-target="#borrarModal">Borrar Cultivo</button>
          </div>
        </div>
  </div>


@endsection

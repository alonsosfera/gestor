@extends('layouts.app')

@section('content')
    <?php setlocale (LC_TIME, "es_MX.UTF-8");   ?>
    <h1 class="text-center mb-4">{{$cultivo['NombreCultivo']}} <img src="/img/{{$cultivo['TipoCultivo']}}.png" height='40' width= '40' class="img-fluid" alt="Fruto"/></h1>
    <a id="idC" hidden>{{$cultivo['id']}}</a>

    <div class="container-fluid">
      <div class="row">
        <div class="ml-auto">
          <button type="button" name="button" class="open-BorrarCultivoDialog btn btn-danger "  data-id="{{$cultivo['id']}}" data-toggle="modal" data-target="#borrarModal">Borrar Cultivo</button>
        </div>
      </div>
      <div class="card-deck">

          <div class="col-sm-3 col-md-4 col-lg-4 mx-auto">
            <div class="card my-3" style="height: 350px;">
              <h5 class="card-header">Datos del cultivo<button class="float-right btn btn-light btn-sm order-1 order-sm-0" href="#" style="padding:0px; border:0;"><i class="fas fa-edit fa-lg text-alert"></i></button></h5>
              <div class="my-auto align-items-center" style="overflow: auto;">
                <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h4><strong>Fruto:</strong> {{$cultivo->TipoCultivo}}</h4>
                      </div>
                      <div class="col">
                        <h4 ><strong>Ubicación:</strong> {{$cultivo->Ubicacion}}</h4>
                        <h5 id="UbicacionT" hidden>{{$cultivo->Ubicacion}}</h5>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <h4><strong>Suelo:</strong> {{$cultivo->TipoSuelo->name}}</h4>
                      </div>
                      <div class="col">
                        <h4><strong>Tamaño:</strong> {{$cultivo->TamanoCultivo}} Hec</h4>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <h4><strong>Riego:</strong> {{$cultivo->TipoRiego}}</h4>
                      </div>
                      <div class="col">
                        <h4><strong>Areas de riego:</strong> {{$cultivo->AreasRiego}}</h4>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3 col-md-4 col-lg-4">
            <div class="card my-3" align-items-center style="height: 350px;">
              <h5 class="card-header">Historial de riego</h5>
              <div class="my-auto align-items-center">
                <div class="card-body">
                  <H3 class="text-center">Fecha de ultimo riego:</H3>
                  <H2 class="text-center">{{strftime("%d %B, %Y - %H:%M", strtotime($riego->fecha))}}</H2>
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
            <div class="card my-3" align-items-center style="height: 350px;">
              <h5 class="card-header">Humedad Actual</h5>
              <div class="my-auto align-items-center">
                <div class="card-body" id="humedad">
                  <div class="col">
                    <input class="input-group-text" id="sensor" type="text" style='width:100%'>
                  </div>
                  <hr>
                  <h3 class="card-title text-center"><strong>Link del Sensor</strong></h3>
                  <button type="button" class="btn btn-success btn-lg btn-block" onclick="RevisarHumedad();">Activar Sensor</button>
                </div>
              </div>
            </div>
          </div>

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
      </div>
  </div>


@endsection

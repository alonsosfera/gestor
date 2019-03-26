@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <h1 class="text-center">{{ Route::currentRouteName() }}</h1>
    <div class="row">
      <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <h5>Busqueda personalizada</h5>
        <div id="custom-search-input">
          <div class="input-group">
            <input type="text" class="form-control input-lg" placeholder="Buscar" id="search"/>
            <span class="input-group-btn">
              <button class="btn btn-info btn-lg" type="button" id="searchbutton">
                  <i class="fas fa-search"></i>
              </button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container-fluid">
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
      <table class="table table-striped table-hover" id="postTable">
        <thead class="thead-light">
          <tr>
            <td align="left"><a href="#" data-toggle="modal" data-target="#n{{Route::currentRouteName()}}Modal" title="Agregar nuevo"><i class="fas fa-plus-circle fa-lg"></i></a></td>
            <td align="right" colspan="100%"><a href="/XML/{{ Route::currentRouteName() }}" title="XML"><i class="fas fa-file-code fa-lg"></i></a> | <a href="/CSV/{{ Route::currentRouteName() }}" title="CSV"><i class="fas fa-file-csv fa-lg"></i></a> | <a href="/PDF/{{ Route::currentRouteName() }}" title="PDF"><i class="fas fa-file-pdf fa-lg"></i></a></td>
          </tr>
      @if (Route::currentRouteName() == "Usuarios")
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido P</th>
            <th scope="col">Apellido M</th>
            <th scope="col">Usuario</th>
            <th scope="col">Correo</th>
            <th scope="col">Admin</th>
            <th scope="col">Creado</th>
            <th scope="col">Editado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="data">
          @if(count($users) > 0)
            @foreach($users as $user)
              <tr class="item{{$user->id}}">
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->last}}</td>
                <td>{{$user->last2}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->Client}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td style="padding:.3rem;">
                    <button class="edit-modal btn btn-info" data-id="{{$user->id}}" data-title="{{$user->name}}" data-usuario="{{$user->username}}" data-correo="{{$user->email}}" data-client="{{$user->Client}}">
                    <span class="fas fa-edit"></span></button>
                    <button class="delete-modal btn btn-danger" data-id="{{$user->id}}" data-title="{{$user->username}}">
                    <span class="fas fa-trash"></span></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      @endif
      @if(Route::currentRouteName() == "Frutos")
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre Fruto</th>
            <th scope="col">Kc Enero</th>
            <th scope="col">Kc Febrero</th>
            <th scope="col">Kc Marzo</th>
            <th scope="col">Kc Abril</th>
            <th scope="col">Kc Mayo</th>
            <th scope="col">Kc Junio</th>
            <th scope="col">Kc Julio</th>
            <th scope="col">Kc Agosto</th>
            <th scope="col">Kc Septiembre</th>
            <th scope="col">Kc Octubre</th>
            <th scope="col">Kc Noviembre</th>
            <th scope="col">Kc Diciembre</th>
            <th scope="col">Creado</th>
            <th scope="col">Editado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="data">
          @if(count($frutos) > 0)
            @foreach($frutos as $fruto)
              <tr class="item{{$fruto->id}}">
                <th scope="row">{{$fruto->id}}</th>
                <td>{{$fruto->NombreFruto}}</td>
                <td>{{$fruto->KC_ENERO}}</td>
                <td>{{$fruto->KC_FEBRERO}}</td>
                <td>{{$fruto->KC_MARZO}}</td>
                <td>{{$fruto->KC_ABRIL}}</td>
                <td>{{$fruto->KC_MAYO}}</td>
                <td>{{$fruto->KC_JUNIO}}</td>
                <td>{{$fruto->KC_JULIO}}</td>
                <td>{{$fruto->KC_AGOSTO}}</td>
                <td>{{$fruto->KC_SEPTIEMBRE}}</td>
                <td>{{$fruto->KC_OCTUBRE}}</td>
                <td>{{$fruto->KC_NOVIEMBRE}}</td>
                <td>{{$fruto->KC_DICIEMBRE}}</td>
                <td>{{$fruto->created_at}}</td>
                <td>{{$fruto->updated_at}}</td>
                <td style="padding:.3rem;">
                    <button class="edit-modal btn btn-info" data-id="{{$fruto->id}}" data-title="{{$fruto->NombreFruto}}" data-KC_ENERO="{{$fruto->KC_ENERO}}" data-KC_FEBRERO="{{$fruto->KC_FEBRERO}}" data-KC_MARZO="{{$fruto->KC_MARZO}}" data-KC_ABRIL="{{$fruto->KC_ABRIL}}" data-KC_MAYO="{{$fruto->KC_MAYO}}" data-KC_JUNIO="{{$fruto->KC_JUNIO}}" data-KC_JULIO="{{$fruto->KC_JULIO}}" data-KC_AGOSTO="{{$fruto->KC_AGOSTO}}" data-KC_SEPTIEMBRE="{{$fruto->KC_SEPTIEMBRE}}" data-KC_OCTUBRE="{{$fruto->KC_OCTUBRE}}" data-KC_NOVIEMBRE="{{$fruto->KC_NOVIEMBRE}}" data-KC_DICIEMBRE="{{$fruto->KC_DICIEMBRE}}">
                    <span class="fas fa-edit"></span></button>
                    <button class="delete-modal btn btn-danger" data-id="{{$fruto->id}}" data-title="{{$fruto->NombreFruto}}">
                    <span class="fas fa-trash"></span></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      @endif
      @if (Route::currentRouteName() == "Cultivos")
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">Nombre del Cultivo</th>
            <th scope="col">Tipo del Fruto</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Tipo de Riego</th>
            <th scope="col">Tipo de Suelo</th>
            <th scope="col">Hectareas</th>
            <th scope="col">Sensores</th>
            <th scope="col">URL</th>
            <th scope="col">Creado</th>
            <th scope="col">Editado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="data">
          @if(count($cultivos) > 0)
            @foreach($cultivos as $cultivo)
              <tr class="item{{$cultivo->id}}">
                <th scope="row">{{$cultivo->id}}</th>
                <td>{{$cultivo->idUsuario}}</td>
                <td>{{$cultivo->NombreCultivo}}</td>
                <td>{{$cultivo->TipoCultivo}}</td>
                <td>{{$cultivo->Ubicacion}}</td>
                <td>{{$cultivo->TipoRiego}}</td>
                <td>{{$cultivo->TipoSuelo}}</td>
                <td>{{$cultivo->TamanoCultivo}}</td>
                <td><a href="#" class="modal-sensor" data-id="{{$cultivo->id}}" title="Agregar URL">{{$cultivo->AreasRiego}}</a></td>
                <td><a href="#" class="edit-sensor" data-id="{{$cultivo->id}}" title="Editar URL">{{$cultivo->Sensor}}</a></td>
                <td>{{$cultivo->created_at}}</td>
                <td>{{$cultivo->updated_at}}</td>
                <td style="padding:.3rem;">
                    <button class="edit-modal btn btn-info" data-id="{{$cultivo->id}}" data-title="{{$cultivo->NombreCultivo}}" data-ubicacion="{{$cultivo->Ubicacion}}" data-tipo_cultivo="{{$cultivo->TipoCultivo}}" data-tipo_riego="{{$cultivo->TipoRiego}}" data-tipo_suelo="{{$cultivo->TipoSuelo}}" data-hectareas="{{$cultivo->TamanoCultivo}}" data-areas="{{$cultivo->AreasRiego}}">
                    <span class="fas fa-edit"></span></button>
                    <button class="delete-modal btn btn-danger" data-id="{{$cultivo->id}}" data-title="{{$cultivo->NombreCultivo}}">
                    <span class="fas fa-trash"></span></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      @endif
      @if (Route::currentRouteName() == "Riegos")
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Eficiencia</th>
            <th scope="col">Creado</th>
            <th scope="col">Editado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="data">
          @if(count($riegos) > 0)
            @foreach($riegos as $riego)
              <tr class="item{{$riego->id}}">
                <th scope="row">{{$riego->id}}</th>
                <td>{{$riego->name}}</td>
                <td>{{$riego->eficiencia}}</td>
                <td>{{$riego->created_at}}</td>
                <td>{{$riego->updated_at}}</td>
                <td style="padding:.3rem;">
                    <button class="edit-modal btn btn-info" data-id="{{$riego->id}}" data-title="{{$riego->name}}" data-eficiencia="{{$riego->eficiencia}}">
                    <span class="fas fa-edit"></span></button>
                    <button class="delete-modal btn btn-danger" data-id="{{$riego->id}}" data-title="{{$riego->name}}">
                    <span class="fas fa-trash"></span></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      @endif
      @if (Route::currentRouteName() == "Suelos")
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Infiltración</th>
            <th scope="col">Creado</th>
            <th scope="col">Editado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="data">
          @if(count($suelos) > 0)
            @foreach($suelos as $suelo)
              <tr class="item{{$suelo->id}}">
                <th scope="row">{{$suelo->id}}</th>
                <td>{{$suelo->name}}</td>
                <td>{{$suelo->descripcion}}</td>
                <td>{{$suelo->infiltracion}}</td>
                <td>{{$suelo->created_at}}</td>
                <td>{{$suelo->updated_at}}</td>
                <td style="padding:.3rem;">
                    <button class="edit-modal btn btn-info" data-id="{{$suelo->id}}" data-title="{{$suelo->name}}" data-descripcion="{{$suelo->descripcion}}" data-infiltracion="{{$suelo->infiltracion}}">
                    <span class="fas fa-edit"></span></button>
                    <button class="delete-modal btn btn-danger" data-id="{{$suelo->id}}" data-title="{{$suelo->name}}">
                    <span class="fas fa-trash"></span></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      @endif
      @if (Route::currentRouteName() == "Sensores")
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Numero (En cultivo)</th>
            <th scope="col">ID Cultivo</th>
            <th scope="col">ID Usuario</th>
            <th scope="col">Creado</th>
            <th scope="col">Editado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="data">
          @if(count($sensores) > 0)
            @foreach($sensores as $sensor)
              <tr class="item{{$sensor->id}}">
                <th scope="row">{{$sensor->id}}</th>
                <td>{{$sensor->Num}}</td>
                <td>{{$sensor->idCultivo}}</td>
                <td>{{$sensor->idUsuario}}</td>
                <td>{{$sensor->created_at}}</td>
                <td>{{$sensor->updated_at}}</td>
                <td style="padding:.3rem;">
                    <button class="edit-modal btn btn-info" data-id="{{$sensor->id}}" data-title="{{$sensor->name}}" data-descripcion="{{$sensor->descripcion}}" data-infiltracion="{{$sensor->infiltracion}}">
                    <span class="fas fa-edit"></span></button>
                    <button class="delete-modal btn btn-danger" data-id="{{$sensor->id}}" data-title="{{$sensor->name}}">
                    <span class="fas fa-trash"></span></button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      @endif
      </table>
    </div>
  </div>
@endsection

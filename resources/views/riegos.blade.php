@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h1 class="text-center">{{ Route::currentRouteName() }}</h1>
</div>
<br>
<div class="container-fluid">
  <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
    <table class="table table-striped table-hover" id="postTable">
      <thead class="thead-light">
        <tr>
          <td align="right" colspan="100%"><a href="/XML/r{{$idCultivo}}" title="XML"><i class="fas fa-file-code fa-lg"></i></a> | <a href="/CSV/r{{$idCultivo}}" title="CSV"><i class="fas fa-file-csv fa-lg"></i></a> | <a href="/PDF/r{{$idCultivo}}" title="PDF"><i class="fas fa-file-pdf fa-lg"></i></a></td>
        </tr>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Fecha</th>
        </tr>
      </thead>
      <tbody id="data">
        @if(count($riegos) > 0)
          @foreach($riegos as $riego)
            <tr>
              <th scope="row">{{$riego->id}}</th>
              <td>{{strftime("%d %B, %Y - %H:%M", strtotime($riego->fecha))}}</td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection

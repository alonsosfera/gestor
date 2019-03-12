<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Gestor de Riego') }}</title>
    <link rel="stylesheet" href="/css/app.css">

    <link rel="icon" href="/img/Logo.png">

    <!-- fontawesome 4.7>-->
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"  rel="stylesheet" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Custom -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <!-- toastr notifications -->
    <link href="/css/toastr.css" rel="stylesheet" />
    <!-- ./ zona de CSS -->

  </head>
  <body>
    <!-- Encabezado -->
    <div class="container-fluid pt-2">
      <h1 id="logo"><a href="/"><img src="/img/Titulo.png" height="115" width="350" alt="logo" /></a></h1>
    </div>

    <!-- Fin Encabezado -->

    <!-- Barra de Navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      @guest
      <a class="navbar-brand"><i class="fas fa-home fa-1x"></i></a>
      <ul class="navbar-nav ml-auto">
        <div class="d-flex justify-content-end">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
          </li>
        </div>
      </ul>
      </nav>
      <div id="wrapper" class="wrapper">
      @if (Route::currentRouteName() == "Dashboard")
        <div class="divCentered">
          <h1 class="display-4 my-auto" align="center">Bienvenido a la plataforma de gestion de tus cultivos</h1>
        </div>

      @endif
      @else
      <div class="d-flex align-items-center">
        <a><button class="btn btn-light btn-sm order-1 order-sm-0" id="menu-toggle" href="#menu-toggle">
          <i class="fas fa-bars"></i>
        </button></a>
          @if (Route::currentRouteName() != "Dashboard" && Route::currentRouteName() != "Historial de Riegos")
            <a href="/"><button class="btn btn-light btn-sm order-1 order-sm-0">
              <i class="fas fa-home"></i>
            </button></a>
          @endif
          @if (Route::currentRouteName() === "Historial de Riegos")
            <a href="/cultivo/{{$_GET['idCultivo']}}"><button class="btn btn-light btn-sm order-1 order-sm-0">
              <i class="fas fa-arrow-alt-circle-left"></i>
            </button></a>
          @endif
        <div>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" id="route">{{ Route::currentRouteName() }}</a>
              </li>
            </ul>
        </div>
      </div>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#dropdown1">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
        </ul>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropdown1">
            <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item disabled" href="#">Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
          </div>
        </li>
      </ul>
      </nav>
      <div id="wrapper" class="wrapper">
      @include('inc.sidebar')
      <div id="page-content-wrapper" class="page-content-wrapper">
        @if(Route::currentRouteName() == "Dashboard")
          @include('inc.dash')
        @endif
      @endguest
      @yield('content')
      <a href="#0" class="cd-top js-cd-top">Top</a>
      @include('layouts.footer')
  </body>
</html>

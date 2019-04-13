@extends('layouts.app')

@section('content')
    <br><br>
    <!-- Contenido -->
    <div class="container">
      <div class="row">

        <div class="col-sm-4 offset-sm-4">
          <div class="card">
            <div class="card-header">
              <h3>Entrar<span class="float-right"><i class="fas fa-sign-in-alt text-alert"></i></span></h3>
            </div>
            <div class="card-body">
              <!-- Formulario login -->
              <br>
              <br>
                <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </span>
                      <input type="text" name="username" id="username" class="form-control{{ $errors->has('email') || $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" placeholder="Usuario o Correo" autofocus>
                      @if ($errors->has('username'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-unlock"></i>
                        </div>
                      </span>
                      <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>


                  <div class="form-group row">
                      <div class="col-md-6 offset-md-4">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                  {{ __('Recordarme') }}
                              </label>
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                      <button type="submit" class="btn btn-success btn-block">Iniciar</button>
                    </div>
                  </div>

                </form>

              <!-- ./ Formulario login -->

              <!--
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
              -->
            </div>
            <div class="card-footer">
              <a class="small text-danger" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <!-- ./Contenido -->

@endsection

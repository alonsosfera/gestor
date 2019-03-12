<!-- Usuario Nuevo Modal -->
    <div class="modal fade bd-example-modal-lg" id="nUsuariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloUsuarioModal">Nuevo Usuario <span class="ml-auto"><i class="fas fa-plus-circle"></i></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalUsuarios" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre" class="col-form-label">Nombre del usuario:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('nombreUsuario') ? ' is-invalid' : '' }}" name="nombreUsuario" id="nombreUsuario" required autofocus>
                        @if ($errors->has('nombreUsuario'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombreUsuario') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Usuario" class="col-form-label">Username:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" id="usuario" required>
                        @if ($errors->has('usuario'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('usuario') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-md-6 ml-auto">
                    <div class="form-group">
                      <label for="Correo" class="col-form-label">Correo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </span>
                        <input type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" id="correo" required>
                        @if ($errors->has('correo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('correo') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 ml-auto">
                    <div class="form-group">
                      <label for="Admin" class="col-form-label">Administrador:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-hammer"></i>
                          </div>
                        </span>
                        <input type="checkbox" class="form-control{{ $errors->has('client') ? ' is-invalid' : '' }}" name="client" id="client" value="client">
                        @if ($errors->has('client'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('client') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>


              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" id="editUsuario" data-dismiss="modal" class="btn btn-success add">Crear</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Usuario Nuevo Modal -->

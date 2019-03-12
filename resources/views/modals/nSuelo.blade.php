<!-- Suelo Nuevo Modal -->
    <div class="modal fade bd-example-modal-lg" id="nSuelosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloSueloModal">Nuevo Tipo de Suelo <span class="ml-auto"><i class="fas fa-plus-circle"></i></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalSuelos" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre" class="col-form-label">Nombre del tipo de suelo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('nombreSuelo') ? ' is-invalid' : '' }}" name="nombreSuelo" id="nombreSuelo" required autofocus>
                        @if ($errors->has('nombreSuelo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombreSuelo') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Descripcion" class="col-form-label">Descripción:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" id="descripcion">
                        @if ($errors->has('descripcion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Infiltracion" class="col-form-label">Infiltración:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('infiltracion') ? ' is-invalid' : '' }}" name="infiltracion" id="infiltracion" required autofocus>
                        @if ($errors->has('infiltracion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('infiltracion') }}</strong>
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
              <button type="button" id="editSuelo" data-dismiss="modal" class="btn btn-success add">Crear</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Suelo Nuevo Modal -->

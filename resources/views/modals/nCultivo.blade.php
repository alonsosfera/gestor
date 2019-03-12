<!-- Cultivo Nuevo Modal -->
    <div class="modal fade bd-example-modal-lg" id="nCultivosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloCultivosModal">Nuevo Cultivo <span class="ml-auto"><i class="far fa-plus-square"></i></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalCultivos" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_cultivo" class="col-form-label" title="Manera de diferenciar el cultivo">Nombre del cultivo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('nombre_cultivo') ? ' is-invalid' : '' }}" name="nombre_cultivo" id="nombre_cultivo" required>
                        @if ($errors->has('nombre_cultivo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre_cultivo') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Ubicación" class="col-form-label">Ubicación:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" name="ubicacion" id="ubicacion" required>
                        @if ($errors->has('ubicacion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ubicacion') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-md-6 ml-auto">
                    <div class="form-group">
                      <label for="tipo_cultivo" class="col-form-label">Tipo de cultivo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-leaf"></i>
                          </div>
                        </span>
                        <select class="form-control{{ $errors->has('tipo_cultivo') ? ' is-invalid' : '' }}" name="tipo_cultivo" id="tipo_cultivo" required>
                          <option value="" selected hidden>Seleccionar</option>
                          @foreach ($ArrayFrutos as $fruto)
                            <option value="{{ $fruto->NombreFruto }}" > {{ $fruto->NombreFruto }}</option>;
                          @endforeach
                        </select>
                        @if ($errors->has('tipo_cultivo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tipo_cultivo') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 ml-auto">
                    <div class="form-group">
                      <label for="tipo_suelo" class="col-form-label">Tipo de riego:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tint"></i>
                          </div>
                        </span>
                        <select class="form-control{{ $errors->has('tipo_riego') ? ' is-invalid' : '' }}" name="tipo_riego" id="tipo_riego" required>
                          <option value="" selected hidden>Seleccionar</option>
                          @foreach ($ArrayRiegos as $riego)
                            <option value="{{ $riego->id }}" > {{ $riego->name }}</option>;
                          @endforeach
                        </select>
                        @if ($errors->has('tipo_riego'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tipo_riego') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6 ml-auto">
                    <div class="form-group">
                      <label for="tipo_suelo" class="col-form-label">Tipo de suelo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tint"></i>
                          </div>
                        </span>
                        <select class="form-control{{ $errors->has('tipo_suelo') ? ' is-invalid' : '' }}" name="tipo_suelo" id="tipo_suelo" required>
                          <option value="" selected hidden>Seleccionar</option>
                          @foreach ($ArraySuelos as $suelo)
                            <option value="{{ $suelo->id }}" > {{ $suelo->name }}</option>;
                          @endforeach
                        </select>
                        @if ($errors->has('tipo_suelo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tipo_suelo') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="hectareas" class="col-form-label">Tamaño (Hectareas):</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-square"></i>
                          </div>
                        </span>
                        <input type="number" class="form-control{{ $errors->has('hectareas') ? ' is-invalid' : '' }}" name="hectareas" id="hectareas" required>
                        @if ($errors->has('hectareas'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('hectareas') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="hectareas" class="col-form-label">Areas de riego:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-square"></i>
                          </div>
                        </span>
                        <input type="number" class="form-control{{ $errors->has('areas') ? ' is-invalid' : '' }}" name="areas" id="areas" required>
                        @if ($errors->has('areas'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('areas') }}</strong>
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
              <button type="button" id="editCultivo" data-dismiss="modal" class="btn btn-success add">Crear cultivo</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Cultivo Nuevo Modal -->

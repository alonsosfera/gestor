<!-- Fruto Nuevo Modal -->
    <div class="modal fade bd-example-modal-lg" id="nFrutosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloFrutoModal">Nuevo Fruto <span class="ml-auto"><i class="far fa-plus-square"></i></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalFrutos" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_cultivo" class="col-form-label" title="Manera de diferenciar el cultivo">Nombre del fruto:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('nombre_fruto') ? ' is-invalid' : '' }}" name="nombre_fruto" id="nombre_fruto" required>
                        @if ($errors->has('nombre_fruto'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre_fruto') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Ubicación" class="col-form-label">Kc Enero:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_ENERO') ? ' is-invalid' : '' }}" name="KC_ENERO" id="KC_ENERO" required>
                        @if ($errors->has('KC_ENERO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_ENERO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_FEBRERO" class="col-form-label">Kc Febrero:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_FEBRERO') ? ' is-invalid' : '' }}" name="KC_FEBRERO" id="KC_FEBRERO" required>
                        @if ($errors->has('KC_FEBRERO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_FEBRERO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_MARZO" class="col-form-label">Kc Marzo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_MARZO') ? ' is-invalid' : '' }}" name="KC_MARZO" id="KC_MARZO" required>
                        @if ($errors->has('KC_MARZO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_MARZO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_ABRIL" class="col-form-label">Kc Abril:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_ABRIL') ? ' is-invalid' : '' }}" name="KC_ABRIL" id="KC_ABRIL" required>
                        @if ($errors->has('KC_ABRIL'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_ABRIL') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_MAYO" class="col-form-label">Kc Mayo:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_MAYO') ? ' is-invalid' : '' }}" name="KC_MAYO" id="KC_MAYO" required>
                        @if ($errors->has('KC_MAYO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_MAYO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_JUNIO" class="col-form-label">Kc Junio:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_JUNIO') ? ' is-invalid' : '' }}" name="KC_JUNIO" id="KC_JUNIO" required>
                        @if ($errors->has('KC_JUNIO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_JUNIO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_JULIO" class="col-form-label">Kc Julio:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_JULIO') ? ' is-invalid' : '' }}" name="KC_JULIO" id="KC_JULIO" required>
                        @if ($errors->has('KC_JULIO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_JULIO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_AGOSTO" class="col-form-label">Kc Agosto:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_AGOSTO') ? ' is-invalid' : '' }}" name="KC_AGOSTO" id="KC_AGOSTO" required>
                        @if ($errors->has('KC_AGOSTO'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_AGOSTO') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_SEPTIEMBRE" class="col-form-label">Kc Septiembre:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_SEPTIEMBRE') ? ' is-invalid' : '' }}" name="KC_SEPTIEMBRE" id="KC_SEPTIEMBRE" required>
                        @if ($errors->has('KC_SEPTIEMBRE'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_SEPTIEMBRE') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_OCTUBRE" class="col-form-label">Kc Octubre:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_OCTUBRE') ? ' is-invalid' : '' }}" name="KC_OCTUBRE" id="KC_OCTUBRE" required>
                        @if ($errors->has('KC_OCTUBRE'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_OCTUBRE') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_NOVIEMBRE" class="col-form-label">Kc Noviembre:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-location-arrow"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_NOVIEMBRE') ? ' is-invalid' : '' }}" name="KC_NOVIEMBRE" id="KC_NOVIEMBRE" required>
                        @if ($errors->has('KC_NOVIEMBRE'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_NOVIEMBRE') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="KC_DICIEMBRE" class="col-form-label">Kc Diciembre:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-tag"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control{{ $errors->has('KC_DICIEMBRE') ? ' is-invalid' : '' }}" name="KC_DICIEMBRE" id="KC_DICIEMBRE" required>
                        @if ($errors->has('KC_DICIEMBRE'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('KC_DICIEMBRE') }}</strong>
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
              <button type="button" id="editFruto" data-dismiss="modal" class="btn btn-success add">Crear fruto</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Fruto Nuevo Modal -->

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
                        <input type="text" class="form-control" name="nombre_cultivo" id="nombre_cultivo" required>
                      </div>
                      <span id="nombre_cultivo_error" style="color:red"></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Ubicación" class="col-form-label">Ubicación:</label>
                      <i class="fas fa-location-arrow"></i>
                      <button type="button" name="button" class="btn btn-block" id="Dmap" data-dismiss="modal" data-toggle="modal" href="#mapModal"> Seleccionar en el mapa</button>
                      <input type="text" class="form-control" name="ubicacion" id="ubicacion" required hidden>
                      <span id="ubicacion_error" style="color:red"></span>
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
                        <select class="form-control" name="tipo_cultivo" id="tipo_cultivo" required>
                          <option value="" selected hidden>Seleccionar</option>
                          @foreach ($ArrayFrutos as $fruto)
                            <option value="{{ $fruto->NombreFruto }}" > {{ $fruto->NombreFruto }}</option>;
                          @endforeach
                        </select>
                      </div>
                      <span id="tipo_cultivo_error" style="color:red"></span>
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
                        <select class="form-control" name="tipo_riego" id="tipo_riego" required>
                          <option value="" selected hidden>Seleccionar</option>
                          @foreach ($ArrayRiegos as $riego)
                            <option value="{{ $riego->id }}" > {{ $riego->name }}</option>;
                          @endforeach
                        </select>
                      </div>
                      <span id="tipo_riego_error" style="color:red"></span>
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
                        <select class="form-control" name="tipo_suelo" id="tipo_suelo" required>
                          <option value="" selected hidden>Seleccionar</option>
                          @foreach ($ArraySuelos as $suelo)
                            <option value="{{ $suelo->id }}" > {{ $suelo->name }}</option>;
                          @endforeach
                        </select>
                      </div>
                      <span id="tipo_suelo_error" style="color:red"></span>
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
                        <input type="number" class="form-control" name="hectareas" id="hectareas" required>
                      </div>
                      <span id="hectareas_error" style="color:red"></span>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="hectareas" class="col-form-label">Sectores de Riego:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-square"></i>
                          </div>
                        </span>
                        <input type="number" class="form-control" name="sectores" id="sectores" required>
                      </div>
                      <span id="sectores_error" style="color:red"></span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="editCultivo" class="btn btn-success add">Crear cultivo</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Cultivo Nuevo Modal -->

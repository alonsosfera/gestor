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
                        <input type="text" class="form-control" name="nombreSuelo" id="nombreSuelo" required autofocus>
                      </div>
                      <span id="nombreSuelo_error" style="color:red"></span>
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
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                      </div>
                      <span id="descripcion_error" style="color:red"></span>
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
                        <input type="text" class="form-control" name="infiltracion" id="infiltracion" required autofocus>
                      </div>
                      <span id="infiltracion_error" style="color:red"></span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="editSuelo" class="btn btn-success add">Crear</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Suelo Nuevo Modal -->

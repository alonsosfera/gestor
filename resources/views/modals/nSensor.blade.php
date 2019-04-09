<!-- Sensor Nuevo Modal -->
    <div class="modal fade" id="nSensorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloSensorModal">Agregar URL de los Sensores <span class="ml-auto"><i class="fas fa-plus-circle"></i></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalSensores" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="url" class="col-form-label">URL:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-link"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control" id="id_c" hidden>
                        <input type="text" class="form-control" name="urlSensor" id="urlSensor" required autofocus>
                      </div>
                      <span id="urlSensor_error" style="color:red"></span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="Sensoresbtn" class="btn btn-success sens">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Sensor Nuevo Modal -->

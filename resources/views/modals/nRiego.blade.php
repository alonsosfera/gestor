<!-- Riego Nuevo Modal -->
    <div class="modal fade bd-example-modal-lg" id="nRiegosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloRiegoModal">Nuevo Tipo de Riego <span class="ml-auto"><i class="fas fa-plus-circle"></i></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalRiegos" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre" class="col-form-label">Nombre del tipo de Riego:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control" name="nombreRiego" id="nombreRiego" required autofocus>
                      </div>
                      <span id="nombreRiego_error" style="color:red"></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Eficiencia" class="col-form-label">Eficiencia:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </span>
                        <input type="text" class="form-control" name="eficiencia" id="eficiencia" required>
                      </div>
                      <span id="eficiencia_error" style="color:red"></span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="editRiego" class="btn btn-success add">Crear</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- /Riego Nuevo Modal -->

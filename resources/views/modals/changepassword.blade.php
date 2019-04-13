<!-- Change pswd Modal -->
    <div class="modal fade bd-example-modal-lg" id="pwdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModal">Cambiar tu contraseña </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="ModalPwd" class="form-horizontal">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label for="old-password" class="col-form-label">Contraseña Actual:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-unlock"></i>
                          </div>
                        </span>
                        <input type="password" class="form-control" name="current-password" id="current-password" required>
                      </div>
                      <span id="current-password_error" style="color:red"></span>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label for="new-password" class="col-form-label">Contraseña Nueva:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                          </div>
                        </span>
                        <input type="password" class="form-control" name="new-password" id="new-password" required>
                      </div>
                      <span id="new-password_error" style="color:red"></span>
                    </div>
                  </div>

                </div>
                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label for="new-passwordc" class="col-form-label">Confirmar Contraseña:</label>
                      <div class="input-group">
                        <span class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                          </div>
                        </span>
                        <input type="password" class="form-control" name="new-password_confirmation" id="new-password_confirmation" required>
                      </div>
                      <span id="new-password_confirmation_error" style="color:red"></span>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" id="Changepwd" class="btn btn-success changepwd">Cambiar Contraseña</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- /Password Modal -->

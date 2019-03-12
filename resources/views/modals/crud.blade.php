<!-- Modal form to delete a form -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <h5 class="modal-title">¿Seguro que deseas eliminar? <span class="ml-auto"><i class="fas fa-trash"></i></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">Nombre:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="id_delete" disabled hidden>
                            <input type="name" class="form-control" id="title_delete" disabled>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class='fas fa-remove'></span> Cancelar
                    </button>
                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                        <span id="" class='fas fa-trash'></span> Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

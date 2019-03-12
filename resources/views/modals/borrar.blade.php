<!-- Borrar Modal-->
<div class="modal fade" id="borrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">¿Deseas eliminar el cultivo?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecciona "Borrar" si desear eliminar el cultivo de tu cuenta.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">No borrar</button>
        <a class="btn btn-danger" href="{{ route('borrarcultivo') }}" onclick="event.preventDefault(); document.getElementById('borrar-form').submit();">Borrar</a>
        <form id="borrar-form" class="form-horizontal" action="{{ route('borrarcultivo') }}" method="post">
          @csrf
          <input type="text" id="idCultivo" name="idCultivo" value="" hidden>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Borrar Modal-->

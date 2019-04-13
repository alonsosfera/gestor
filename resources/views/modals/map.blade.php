<!-- Map Modal -->
  <div class="modal" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Ubicación del cultivo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" href="#nCultivosModal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 modal_body_map">
              <div class="location-map" id="location-map">
                <div style="width: 600px; height: 400px;" id="map_canvas"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" href="#nCultivosModal" name="button">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

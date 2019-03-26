</div>
    <!-- /#wrapper -->

    @include('modals.logout')
    @include('modals.borrar')
    @include('modals.nCultivo')
    @include('modals.nFruto')
    @include('modals.nRiego')
    @include('modals.nSuelo')
    @include('modals.nUsuario')
    @include('modals.nSensor')
    @include('modals.crud')

    <!-- zona de JS -->
    <!-- Jquery 3.3.1 -->
    <script src="/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <!-- toastr notifications -->
    <script src="/js/toastr.js" type="text/javascript"></script>
    <!-- bootstrap 4.1 -->
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(document).on("click", ".open-BorrarCultivoDialog", function () {
     var myIdCultivo = $(this).data('id');
     $(".modal-footer #idCultivo").val( myIdCultivo );
     // As pointed out in comments,
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
    });


    $('[data-toggle="collapse"]').on('click', function () {
        var iconElement = $(this).find("[data-icon-in]");
        var iconIn = iconElement.attr('data-icon-in');
        var iconOut = iconElement.attr('data-icon-out');

        if (iconElement.hasClass(iconIn)) {
          iconElement.removeClass(iconIn).addClass(iconOut);
        } else {
            iconElement.removeClass(iconOut).addClass(iconIn);
        }
    });
    @include('inc.BtnTop')

      // add a post
    $('.modal-footer').on('click', '.add', function() {
      var ur = $('#route').text();
      if(ur=='Dashboard'){
        ur='Cultivos';
      }
      var inputs=$('#Modal'+ur).serializeArray();
      var datos = {};
      $.each(inputs, function (i, input) {
        datos[input.name] = input.value;
      });
      $.ajax({
          type: 'POST',
          url: '/n'+ur,
          data:datos,
          dataType:'json',
          success: function(datos) {
            if(ur=='Cultivos'){
              window.location = '/cultivo/' + datos.id;
            }
            else{
              $('tbody').append(datos.table_data);
              toastr.success('Creado correctamente!', 'Exito!', {timeOut: 3000});
            }
          }
      });
    });

    // Edit a post
    $(document).on('click', '.edit-modal', function() {
        var ur = $('#route').text();
        if(ur=='Riegos'){
          $("#editRiego").removeClass('add');
          $("#editRiego").addClass('edit');
          $('#TituloRiegoModal').text('Editar Riego');
          $('#editRiego').text('Guardar cambios');
          $('#nombreRiego').val($(this).data('title'));
          $('#eficiencia').val($(this).data('eficiencia'));
        }
        else if (ur=='Suelos'){
          $("#editSuelo").removeClass('add');
          $("#editSuelo").addClass('edit');
          $('#TituloSueloModal').text('Editar Suelo');
          $('#editSuelo').text('Guardar cambios');
          $('#nombreSuelo').val($(this).data('title'));
          $('#descripcion').val($(this).data('descripcion'));
          $('#infiltracion').val($(this).data('infiltracion'));
        }
        else if (ur=='Usuarios'){
          $("#editUsuario").removeClass('add');
          $("#editUsuario").addClass('edit');
          $('#TituloUsuarioModal').text('Editar Usuario');
          $('#editUsuario').text('Guardar cambios');
          $('#nombreUsuario').val($(this).data('title'));
          $('#apellidop').val($(this).data('apellidop'));
          $('#apellidom').val($(this).data('apellidom'));
          $('#usuario').val($(this).data('usuario'));
          $('#correo').val($(this).data('correo'));
          $('#client').val($(this).data('client'));
        }
        else if (ur=='Cultivos'){
          $("#editCultivo").removeClass('add');
          $("#editCultivo").addClass('edit');
          $('#TituloCultivosModal').text('Editar Cultivo');
          $('#editCultivo').text('Guardar cambios');
          $('#nombre_cultivo').val($(this).data('title'));
          $('#ubicacion').val($(this).data('ubicacion'));
          $('#tipo_cultivo').val($(this).data('tipo_cultivo'));
          $('#tipo_riego').val($(this).data('tipo_riego'));
          $('#tipo_suelo').val($(this).data('tipo_suelo'));
          $('#hectareas').val($(this).data('hectareas'));
          $('#areas').val($(this).data('areas'));
        }
        else if (ur=='Frutos'){
          $("#editFruto").removeClass('add');
          $("#editFruto").addClass('edit');
          $('#TituloFrutoModal').text('Editar Fruto');
          $('#editFruto').text('Guardar cambios');
          $('#nombreUsuario').val($(this).data('title'));
          $('#usuario').val($(this).data('usuario'));
          $('#correo').val($(this).data('correo'));
          $('#client').val($(this).data('client'));
        }
        id = $(this).data('id');
        $('#n'+ur+'Modal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
      var ur = $('#route').text();
      var inputs=$('#Modal'+ur).serializeArray();
      var datos = {};
      $.each(inputs, function (i, input) {
        datos[input.name] = input.value;
      });
      $.ajax({
          type: 'PUT',
          url: '/e'+ur+'/'+id,
          data:datos,
          dataType:'json',
          success: function(datos) {
            $('.item' + id).replaceWith(datos.table_data);
            toastr.success('Actualizado correctamente!', 'Exito!', {timeOut: 3000});
          }
      });
    });

    // delete a post
    $(document).on('click', '.delete-modal', function() {
        $('#deleteModal').modal('show');
        $('#id_delete').val($(this).data('id'));
        $('#title_delete').val($(this).data('title'));
        id = $('#id_delete').val();
    });
    $('.modal-footer').on('click', '.delete', function() {
        var ur = $('#route').text();
        $.ajax({
            type: 'DELETE',
            url: '/d'+ur +'/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Eliminado correctamente!', 'Exito!', {timeOut: 3000});
                $('.item' + data['id']).remove();
            }
        });
        });

      //add Sensor
      $(document).on('click', '.modal-sensor', function() {
            $('#nSensorModal').modal('show');
            $('#id_c').val($(this).data('id'));
            id = $('#id_c').val();
        });
      $('.modal-footer').on('click', '.sens', function() {
        $.ajax({
            type: 'PUT',
            url: '/sens/'+id,
            dataType:'json',
            data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_c").val(),
                    'url': $('#urlSensor').val()
                },
            success: function(datos) {
              $('.item' + id).replaceWith(datos.table_data);
              toastr.success('Actualizado correctamente!', 'Exito!', {timeOut: 3000});
            }
        });
      });

      //edit Sensor
      $(document).on('click', '.edit-sensor', function() {
            $('#TituloSensorModal').text('Modificar URL');
            $('#Sensoresbtn').text('Modificar');
            $('#nSensorModal').modal('show');
            $('#id_c').val($(this).data('id'));
            id = $('#id_c').val();
        });

    $(document).on('keyup', '#search', function(e){
      e.preventDefault();
      var ur = $('#route').text();
      var query = $(this).val();
      fetch_customer_data(query);

       function fetch_customer_data(query = '')
       {
        $.ajax({
         url:'/search/'+ur,
         method:'GET',
         data:{query:query},
         dataType:'json',
         success:function(data)
         {
          $('tbody').html(data.table_data);
         }
        })
       }

      });

      function Weather(){
        var route = $('#route').text();
        if(route=='Cultivo'){
          var apikey ="d484fed2f5c8c5eac5e4333abe63793e";
          var apiurl = "https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?q="+$('#UbicacionT').text()+",mx&APPID=" + apikey + "&units=metric&lang=es";
          //var apiurl = "https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?lat=28.12&lon=-105.58&APPID=" + apikey + "&units=metric";
          $.ajax({
            type:'GET',
            url: apiurl,
            dataType: 'json',
            success: function(data){
              $('#temperatura').html(data.main.temp + '&#8451');
              $('#nombretemperatura').html(data.weather[0].description);
            },
            error: function(){
              toastr.warning('Error al accesar temperatura', 'Alerta', {timeOut: 3000});
            }
          });
        }
      }
      window.onload = Weather;


      function RevisarHumedad()
      {
        if($('#sensor').val() == ""){
            toastr.error('Favor de insertar el link', 'Error', {timeOut: 3000});
            return;
        }
        var ur = $('#sensor').val();
        var humedadp = '';
        $.ajax({
          type: 'GET',
          url: ur,
          success: function(datos){
            $.each(datos,function(index,dato){
              var humedadv = dato.valor;
              if(humedadv > 999){
                humedadp = '0%';
              }else if(humedadv > 875 && humedadv < 1000){
                humedadp = '10%';
              }else if(humedadv > 802 && humedadv < 876){
                humedadp = '20%';
              }else if(humedadv > 729 && humedadv < 803){
                humedadp = '30%';
              }else if(humedadv > 656 && humedadv < 730){
                humedadp = '40%';
              }else if(humedadv > 583 && humedadv < 657){
                humedadp = '50%';
              }else if(humedadv > 510 && humedadv < 584){
                humedadp = '60%';
              }else if(humedadv > 437 && humedadv < 511){
                humedadp = '70%';
              }else if(humedadv > 364 && humedadv < 438){
                humedadp = '80%';
              }else if(humedadv > 300 && humedadv < 365){
                humedadp = '90%';
              }else if(humedadv < 300){
                humedadp = '100%';
              }
              });
              CardHumedad(humedadp);
          },
          error: function(e){
            toastr.error('Sensor no accesible', 'Error', {timeOut: 3000});
            return;
          },
        });
      }

      function CardHumedad(humedadp){
        if(humedadp=='20%' || humedadp=='10%' || humedadp=='0%'){
          GenerarRiego();
        }
        var content = "<H1 class='text-center'>"+humedadp+"</H1><hr><h3 class='card-title text-center'><strong>Porcentaje de Humedad</strong></h3><button type='button' class='btn btn-success btn-lg btn-block' onclick='RevisarHumedad();'>Actualizar</button> <a id='sensor' value='' hidden>"+$('#sensor').val();+"</a>";
        $('#humedad').html(content);
      }

      function GenerarRiego(){
        var id = $('#idC').text();
        var datos = {};
        $.ajax({
          type: 'PUT',
          url: '/registro/'+id,
          data:datos,
          success: function(datos){
            toastr.success('Realizando riego', 'Atención!', {timeOut: 4000});
          },
        });
      }

    </script>

    <script type="text/javascript">
      $.ajaxSetup({ headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        } });
    </script>
  </body>

</html>

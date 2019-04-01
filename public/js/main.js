
<!-- Menu Toggle Script -->
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

  //Inicio BotonTop
  (function(){
      // Back to Top - by CodyHouse.co
    var backTop = document.getElementsByClassName('js-cd-top')[0],
      // browser window scroll (in pixels) after which the "back to top" link is shown
      offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offsetOpacity = 1200,
      scrollDuration = 700,
      scrolling = false;
    if( backTop ) {
      //update back to top visibility on scrolling
      window.addEventListener("scroll", function(event) {
        if( !scrolling ) {
          scrolling = true;
          (!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250) : window.requestAnimationFrame(checkBackToTop);
        }
      });
      //smooth scroll to top
      backTop.addEventListener('click', function(event) {
        event.preventDefault();
        (!window.requestAnimationFrame) ? window.scrollTo(0, 0) : scrollTop(scrollDuration);
      });
    }

    function checkBackToTop() {
      var windowTop = window.scrollY || document.documentElement.scrollTop;
      ( windowTop > offset ) ? addClass(backTop, 'cd-top--show') : removeClass(backTop, 'cd-top--show', 'cd-top--fade-out');
      ( windowTop > offsetOpacity ) && addClass(backTop, 'cd-top--fade-out');
      scrolling = false;
    }

    function scrollTop(duration) {
        var start = window.scrollY || document.documentElement.scrollTop,
            currentTime = null;

        var animateScroll = function(timestamp){
          if (!currentTime) currentTime = timestamp;
            var progress = timestamp - currentTime;
            var val = Math.max(Math.easeInOutQuad(progress, start, -start, duration), 0);
            window.scrollTo(0, val);
            if(progress < duration) {
                window.requestAnimationFrame(animateScroll);
            }
        };

        window.requestAnimationFrame(animateScroll);
    }

    Math.easeInOutQuad = function (t, b, c, d) {
      t /= d/2;
      if (t < 1) return c/2*t*t + b;
      t--;
      return -c/2 * (t*(t-2) - 1) + b;
    };

    //class manipulations - needed if classList is not supported
    function hasClass(el, className) {
        if (el.classList) return el.classList.contains(className);
        else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
    }
    function addClass(el, className) {
      var classList = className.split(' ');
      if (el.classList) el.classList.add(classList[0]);
      else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
      if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
    }
    function removeClass(el, className) {
      var classList = className.split(' ');
        if (el.classList) el.classList.remove(classList[0]);
        else if(hasClass(el, classList[0])) {
          var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
          el.className=el.className.replace(reg, ' ');
        }
        if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
    }
  })();
  //Fin BotonTop


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
        $('#urlSensor').val($(this).data('url'));
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

  //Obtener temperatura ambiental del cultivo
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

  var t;
  //Sensores de Humedad
  $('.SelectSensor').change(function(){
    SensorHumedad();
    clearInterval(t);
    t = setInterval(function() {
      // method to be executed;
        SensorHumedad();
    }, 3000);
  });

  function SensorHumedad(){
    var id = $('.SelectSensor').val();
    var idC =$('#idC').text();
    $.ajax({
      type:'GET',
      url: '/sensapi',
      data: {
         idCultivo: idC,
         id: id
      },
      success: function(resultado){
          $('#ValorHumedad').text(resultado);
      },
      error: function(){
        toastr.warning('Error al accesar sensor', 'Alerta', {timeOut: 3000});
      }
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

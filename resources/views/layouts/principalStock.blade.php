<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APISOFT</title>
    @toastr_css
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css2/bootstrap-select.min.css')}}">
 


    {!!Html::style ('/css2/bootstrap.min.css')!!} 

    {!!Html::style ('/css2/bootstrap-select.min.css')!!}   
    
    {!!Html::style ('/css2/select2.min.css')!!}

    {!!Html::style ('/css2/select2.css')!!}

    {!!Html::style ('/css/dashboard.css')!!}
    
    <!-- Font Awesome -->
    {!!Html::style ('/css2/font-awesome.min.css')!!}
    <!-- NProgress -->
    {!!Html::style ('/css2/nprogress.css')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::style ('/css2/jquery.mCustomScrollbar.min.css')!!}
    <!-- Custom Theme Style -->
    {!!Html::style ('/css2/custom.min.css')!!}
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/Afiliado') }}" class="site_title">
                <i class="glyphicon glyphicon-home"></i> <span>AAPIS Chorotega</span>
              </a>
            </div>
              <div class="clearfix"></div>
              <!-- menu profile quick info -->
              <div class="profile clearfix">
              <div class="profile_pic">
                <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/b666f811889067.562541eff3013.png" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
            
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{ url('/dashboard/') }}">Dashboard</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-briefcase"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{ url('/users/') }}">Gestionar Usuarios</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Afiliados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Afiliado/') }}">Gestionar Afiliado</a></li>
                      <li><a href="{{ url('/Ubicacion/') }}">Gestionar Ubicación</a></li>
                      <li><a href="{{ url('/AfiliadoApiario/') }}">Gestionar Afiliado-Apiario</a></li>
                      <li><a href="{{ url('/Apiario/') }}">Gestionar Apiario</a></li>
                    
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-list-alt"></i> Recepción<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/RecepcionMateriaPrima') }}">Gestionar Recepción</a></li>
                      <li><a href="{{ url('/Cera/') }}">Gestionar Extracción de cera</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-oil"></i> Planta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Estanon/') }}">Gestionar Estañones</a></li>
                      <li><a href="{{ url('/RecepEstanon/') }}">Gestionar Recepción-Estañón</a></li>
                     
                    
                    </ul>
                  </li>

                  <li><a><i class="glyphicon glyphicon-shopping-cart"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{ url('/Stock/') }}">Gestionar Stok</a></li>
                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cart-plus"></i>Servicios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{ url('/IngresoCera/') }}">Gestionar Servicio Cera</a></li>
                    <li> <a href="{{ url('/IngresoInventario/') }}">Gestionar Servicio Inventario</a></li>
                    
                    
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="{{ route('logout') }}" class="user-profile">
                    Salir
                    <span class=" fa fa-sign-out"></span>
                  </a>                 
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="container">
            <div class="row x_panel">
              @yield('contenido')
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            APPIS - Asociacion de Apicultores Region Chorotega
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <!--<script src="{{asset('js2/bootstrap-select.min.js')}}"></script>-->
  
    <!-- jQuery -->
     
    @jquery
    @toastr_js
    @toastr_render

    {!!Html::script('/js2/jquery.min.js')!!}  

    @stack('scripts')
    <!-- Bootstrap -->
    {!!Html::script('/js2/bootstrap.min.js')!!}

   <!-- SELECT2 -->
   {!!Html::script('/js2/bootstrap-select.min.js')!!} 

    {!!Html::script('/js2/select2.full.js')!!}

    {!!Html::script('/js2/select2.js')!!}
    
    {!!Html::script('/js2/select2.min.js')!!}

    {!!Html::script('/js2/select2.full.min.js')!!}
    <!-- FastClick -->
    {!!Html::script('/js2/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('/js2/nprogress.js')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::script('/js2/jquery.mCustomScrollbar.concat.min.js')!!}
    <!-- Custom Theme Scripts -->
    {!!Html::script('/js2/custom.min.js')!!}

     {!!Html::script('/js2/dropdown.js')!!}

     {!!Html::script('/js/dashboard.js')!!}

     {!!Html::script('/js/Chart.min.js')!!}


 
<!-- Include the plugin's CSS and JS: -->
{!!Html::script('/js/bootstrap-select.min.js')!!}

{!!Html::script('/js/jquery-1.11.1.min.js')!!}


<!-- MODAL INVENTARIO -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-descripcion').text('Nuevo lote');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addStock',
      
      data: {
        '_token': $('input[name=_token]').val(),
        'producto_id': $('select[name=producto_id]').val(),
        'precioUnitario': $('input[name=precioUnitario]').val(),
        'presentacion_id': $('select[name=presentacion_id]').val(),
        'cantidadDisponible': $('input[name=cantidadDisponible]').val(),
        'estanon_recepcions_id': $('select[name=estanon_recepcions_id]').val()
        
      },
      success: function(data){
       
        $('.errorProducto_id').addClass('hidden');
         $('.errorPrecioUnitario').addClass('hidden');
         $('.errorPresentacion_id').addClass('hidden');
         $('.errorCantidadDisponible').addClass('hidden');
        $('.errorEstanon_recepcions_id').addClass('hidden');
         if ((data.errors)) {
                        setTimeout(function () {
                            $('#create').modal('show');
                            toastr.error('COMPLETE EL CAMPO', '¡Error de Validación!', {timeOut: 5000});
                        }, 500);
                        if (data.errors.producto_id) {
                            $('.errorProducto_id').removeClass('hidden');
                            $('.errorProducto_id').text(data.errors.producto_id);
                        }
                         if (data.errors.precioUnitario) {
                            $('.errorPrecioUnitario').removeClass('hidden');
                            $('.errorPrecioUnitario').text(data.errors.precioUnitario);
                        }
                         if (data.errors.presentacion_id) {
                            $('.errorPresentacion_id').removeClass('hidden');
                            $('.errorPresentacion_id').text(data.errors.presentacion_id);
                        }
                        if (data.errors.cantidadDisponible) {
                            $('.errorCantidadDisponible').removeClass('hidden');
                            $('.errorCantidadDisponible').text(data.errors.cantidadDisponible);
                        }
                      
                        if (data.errors.estanon_recepcions_id) {
                            $('.errorEstanon_recepcions_id').removeClass('hidden');
                            $('.errorEstanon_recepcions_id').text(data.errors.estanon_recepcions_id);
                        }
        } else {
          toastr.success('SE HA CREADO CORRECTAMENTE!', 'Alerta de Éxito', {timeOut: 5000});
      

       }
      },
    });
    $('#producto_id').val('');
    $('#precioUnitario').val('');
    $('#presentacion_id').val('');
    $('#cantidadDisponible').val('');
    $('#estanon_recepcions_id').val('');
  });
 
// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Editar Stock");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-descripcion').text('Editar Stock');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#id2').val($(this).data('id'));
$('#pro2').val($(this).data('producto_id'));
$('#pre2').val($(this).data('precioUnitario'));
$('#pres2').val($(this).data('presentacion_id'));
$('#can2').val($(this).data('cantidadDisponible'));
$('#est2').val($(this).data('estanon_recepcions_id'));
$('#myModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editStock',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#id2").val(),
'producto_id': $('#pro2').val(),
'precioUnitario': $('#pre2').val(),
'presentacion_id': $('#pres2').val(),
'cantidadDisponible': $('#can2').val(),
'estanon_recepcions_id': $('#est2').val(),
    },
success: function(data) {
   $('.errorProducto_id').addClass('hidden');
         $('.errorPrecioUnitario').addClass('hidden');
         $('.errorPresentacion_id').addClass('hidden');
         $('.errorCantidadDisponible').addClass('hidden');
        $('.errorEstanon_recepcions_id').addClass('hidden');
         if ((data.errors)) {
                        setTimeout(function () {
                            $('#create').modal('show');
                            toastr.error('COMPLETE EL CAMPO', '¡Error de Validación!', {timeOut: 5000});
                        }, 500);
                        if (data.errors.producto_id) {
                            $('.errorProducto_id').removeClass('hidden');
                            $('.errorProducto_id').text(data.errors.producto_id);
                        }
                         if (data.errors.precioUnitario) {
                            $('.errorPrecioUnitario').removeClass('hidden');
                            $('.errorPrecioUnitario').text(data.errors.precioUnitario);
                        }
                         if (data.errors.precioUnitario) {
                            $('.errorPresentacion_id').removeClass('hidden');
                            $('.errorPresentacion_id').text(data.errors.presentacion_id);
                        }
                        if (data.errors.cantidadDisponible) {
                            $('.errorCantidadDisponible').removeClass('hidden');
                            $('.errorCantidadDisponible').text(data.errors.cantidadDisponible);
                        }
                      
                        if (data.errors.estanon_recepcions_id) {
                            $('.errorEstanon_recepcions_id').removeClass('hidden');
                            $('.errorEstanon_recepcions_id').text(data.errors.estanon_recepcions_id);
                        }
        } else {
          toastr.success('SE HA EDITADO CORRECTAMENTE!', 'Alerta de Éxito', {timeOut: 5000});
     $('#table').append("<tr class='sto" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.producto_id + "</td>"+
          "<td>" + data.precioUnitario + "</td>"+
          "<td>" + data.presentacion_id + "</td>"+
          "<td>" + data.cantidadDisponible + "</td>"+
          "<td>" + data.estanon_recepcions_id + "</td>"+
  
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + 
          data.id + 
          "' data-producto_id='"
          + data.producto_id + 
             "' data-precioUnitario='" 
          + data.precioUnitario + 
             "' data-presentacion_id='" 
          + data.presentacion_id+  
          "' data-cantidadDisponible='" 
          + data.cantidadDisponible + 
          " 'data-estanon_recepcions_id='" 
          + data.estanon_recepcions_id + 
          "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm'  data-id='"
          + data.id +
          "' data-producto_id='"
          + data.producto_id + 
             "' data-precioUnitario='" 
          + data.precioUnitario + 
             "' data-presentacion_id='" 
          + data.presentacion_id+  
          "' data-cantidadDisponible='" 
          + data.cantidadDisponible + 
          " 'data-estanon_recepcions_id='" 
          + data.estanon_recepcions_id +   "'><span class='fa fa-eye'></span></button> <button class='edit-modalRol btn btn-warning btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modalRol btn btn-danger btn-sm' data-id='" + data.id + "' data-descripcion='" + data.descripcion + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
      "</tr>");
        }
      
},
  });
});
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Eliminar");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-descripcion').text('Eliminar Stock');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.id').html($(this).data('id'));
$('#myModal').modal('show');
});
$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteStock',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
      toastr.success('SE HA ELIMINADO CORRECTAMENTE!', 'Alerta Éxito', {timeOut: 5000});
      $('.sto' + $('.id').text()).remove();
    }
  });
});
  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#id3').text($(this).data('id'));
  $('#pro3').text($(this).data('producto_id'));
  $('#pre3').text($(this).data('precioUnitario'));
  $('#pres3').text($(this).data('presentacion_id'));
  $('#can3').text($(this).data('cantidadDisponible'));
  $('#est3').text($(this).data('estanon_recepcions_id'));
  $('.modal-title').text('Detalle');
  });
  /* processing bar 
  */
  var myApp;
myApp = myApp || (function () {
    var pleaseWaitDiv = $('<div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="modal-header"><h1>Processing...</h1></div><div class="modal-body"><div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div></div></div>');
    return {
        showPleaseWait: function() {
            pleaseWaitDiv.modal();
        },
        hidePleaseWait: function () {
            pleaseWaitDiv.modal('hide');
        },
    };
})();
</script>
  


    </body>
    </html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APISOFT</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css2/bootstrap-select.min.css')}}">


  
    {!!Html::style ('/css2/bootstrap.min.css')!!} 

    {!!Html::style ('/css2/bootstrap-select.min.css')!!}  
    
    
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
                <h2>{{ Auth::user()->name }}</h2>
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
                @if(Auth::check())
                    @if (Auth::user()->isAdmin())
                  <li><a><i class="fa fa-briefcase"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                     <li><a href="{{ url('users/') }}">Gestionar usuarios</a></li>
                    </ul>
                  </li>
                
                  <li><a><i class="fa fa-users"></i> Afiliados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Afiliado/') }}">Gestionar Afiliado</a></li>
                      <li><a href="{{ url('/AfiliadoApiario/') }}">Gestionar Afiliado-Apiario</a></li>
                      <li><a href="{{ url('/Apiario/') }}">Gestionar Apiaro</a></li>
                    
                    </ul>
                  </li>
                  @endif
                  @endif
                  <li><a><i class="glyphicon glyphicon-list-alt"></i> Recepción<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/RecepcionMateriaPrima') }}">Gestionar Recepción</a></li>
                      <li><a href="{{ url('/Cera/') }}">Gestionar Extración de cera</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-oil"></i> Planta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Estanon/') }}">Gestionar Estañones</a></li>
                      <li><a href="{{ url('/AfiliadoEstanon/') }}">Gestionar Afiliado-Estañon</a></li>
                   
                    
                    </ul>
                  </li>

                  <li><a><i class="glyphicon glyphicon-shopping-cart"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{ url('/Stock/') }}">Gestionar Stock</a></li>
                    
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
  <script src="{{asset('js2/bootstrap-select.min.js')}}"></script>
  
    <!-- jQuery -->

    {!!Html::script('/js2/jquery.min.js')!!}  
    @stack('scripts')
    <!-- Bootstrap -->
    {!!Html::script('/js2/bootstrap.min.js')!!}

    
    <!-- FastClick -->
    {!!Html::script('/js2/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('/js2/nprogress.js')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::script('/js2/jquery.mCustomScrollbar.concat.min.js')!!}
    <!-- Custom Theme Scripts -->
    {!!Html::script('/js2/custom.min.js')!!}
     {!!Html::script('/js2/dropdown.js')!!}




<!-- MODAL AFILIADO -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">

{{-- ajax Form Add Post--}}

  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-descripcion').text('Crear presentación');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addPresentacion',
      
      data: {
        '_token': $('input[name=_token]').val(),
        'descripcion': $('input[name=descripcion]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.descripcion);
} 
        } else {
          $('.error').remove();
          $('#table').append("<tr class='api" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.descripción + "</td>"+
  
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-nombre='"  + data.nombre + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm'  data-id='"
           + data.id + "' data-descripcion='" 
           + data.descripcion +  "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
           + data.id + "' data-descripcion='" + data.descripcion +  "' ><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#descripcion').val('');

  });
 
// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Editar Presentación");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-descripcion').text('Editar Presentación');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#idDes').val($(this).data('id'));
$('#nDes').val($(this).data('descripcion'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editPresentacion',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#idDes").val(),
'descripcion': $('#nDes').val(),

    },
success: function(data) {
      $('.api' + data.id).replaceWith(" "+
      "<tr class='api" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.descripción + "</td>"+
      
 "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-descripcion='" 
 + data.descripcion + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
          + data.id + "' data-descripcion='" + data.descripcion + 
        "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
          + data.id + "' data-descripcion='" + data.descripcion + 
       "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
      "</tr>");
    }
  });
});


  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#codPre').text($(this).data('id'));
  $('#PrePre').text($(this).data('presentacion'));
  $('.modal-title').text('Show Post');
  });
</script>
    

    </body>
    </html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apisoft | www.Apisoft.com</title>


  
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- jQuery 2.1.4 -->
  <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->






    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AS</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Apisoft</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red"></small>
                
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      Apisoft- Desarrollando Software
                      <small>www.Apisoft.com</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Modulo Afiliado</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="Afiliado"><i class="fa fa-circle-o"></i> Afiliado</a></li>
                <li><a href="Apiario"><i class="fa fa-circle-o"></i> Apiario</a></li>
                <li><a href="AfiliadoApiario"><i class="fa fa-circle-o"></i> AfiliadoApiario</a></li>
                <li><a href="Ubicacion"><i class="fa fa-circle-o"></i> Ubicacion</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="Usuario">
                <i class="fa fa-laptop"></i>
                <span>Modulo Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="Genero"><i class="fa fa-circle-o"></i> Genero</a></li>
                <li><a href="Rol"><i class="fa fa-circle-o"></i> Rol</a></li>
                <li><a href="EstadoCivil"><i class="fa fa-circle-o"></i> Estado Civil</a></li>
                <li><a href="Usuario"><i class="fa fa-circle-o"></i> Usuario</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Proceso De Planta</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="Estanon"><i class="fa fa-circle-o"></i>Estañones</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Producto Terminado</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Login</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Apisoft</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Apisoft &copy; 2019-2020 <a href="www.Apisoft.com">Ingenieria</a>.</strong> All rights reserved.
      </footer>

      

  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-crear').text('Crear Afiliado');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addAfiliado',
      data: {
        'id': $('input[name=idd]').val(),
        'Nombre': $('input[name=Nombre]').val(),
        'Apellido1': $('input[name=Apellido1]').val(),
        'Apellido2': $('input[name=Apellido2]').val(),
        'Telefono': $('input[name=Telefono]').val(),
        'email': $('input[name=email]').val(),
        'Direccion': $('input[name=Direccion]').val(),
        'Fecha_Ingreso': $('input[name=Fecha_Ingreso]').val(),
        'Num_Cuenta': $('input[name=Num_Cuenta]').val(),
        'genero_id': $("select[name=genero_id]").val(),
        'estado_civil_id': $('select[name=estado_civil_id').val(),
        'Estado_id': $('select[name=Estado_id]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.id);
          $('.error').text(data.errors.Nombre);
          $('.error').text(data.errors.Apellido1);
          $('.error').text(data.errors.Apellido2);
          $('.error').text(data.errors.Telefono);
          $('.error').text(data.errors.email);
          $('.error').text(data.errors.Direccion);
          $('.error').text(data.errors.Fecha_Ingreso);
          $('.error').text(data.errors.Num_Cuenta);
          $('.error').text(data.errors.genero_id);
          $('.error').text(data.errors.estado_civil_id);
          $('.error').text(data.errors.Estado_id);

 
        } else {
          $('.error').remove();
          $('#table').append("<tr class='afi" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.Nombre + "</td>"+
          "<td>" + data.Apellido1 + "</td>"+
          "<td>" + data.Apellido2 + "</td>"+
          "<td>" + data.Telefono + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.Direccion+ "</td>"+
          "<td>" + data.Fecha_Ingreso+ "</td>"+
          "<td>" + data.Num_Cuenta+ "</td>"+
          "<td>" + data.genero_id + "</td>"+
          "<td>" + data.estado_civil_id + "</td>"+
          "<td>" + data.Estado_id + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-Apellido1='" + data.Apellido1 + 
          "'data-Apellido2='" + data.Apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.Estado_id +
 "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-Apellido1='" + data.Apellido1 + 
          "'data-Apellido2='" + data.Apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.Estado_id +
 "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-Apellido1='" + data.Apellido1 + 
          "'data-Apellido2='" + data.Apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.Estado_id +
"'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
         
        }
      },
    });
    $('#idd').val('');
    $('#Nombre').val('');
    $('#Apellido1').val('');
    $('#Apellido2').val('');
    $('#Telefono').val('');
    $('#email').val('');
    $('#Direccion').val('');
    $('#Fecha_Ingreso').val('');
    $('#Num_Cuenta').val('');
    $('#genero_id').val('');
    $('#estado_civil_id').val('');
    $('#Estado_id').val('');
  });


$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Editar Afiliado");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-descripcion').text('Editar Afiliado');
$('.deleteContent').hide();
$('.form-horizontal1').show();
$('#i').val($(this).data('id'));
$('#n').val($(this).data('nombre'));
$('#a1').val($(this).data('apellido1'));
$('#a2').val($(this).data('apellido2'));
$('#t').val($(this).data('telefono'));
$('#em').val($(this).data('email'));
$('#d').val($(this).data('direccion'));
$('#f').val($(this).data('fecha_ingreso'));
$('#nu').val($(this).data('num_cuenta'));
$('#g').val($(this).data('genero_id'));
$('#e').val($(this).data('estado_civil_id'));
$('#es').val($(this).data('estado_id'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editAfiliado',
    data: {
    
'id':$("#i").val(),
'Nombre':$('#n').val(),
'Apellido1':$('#a1').val(),
'Apellido2':$('#a2').val(),
'Telefono':$('#t').val(),
'email':$('#em').val(),
'Direccion':$('#d').val(),
'Fecha_Ingreso':$('#f').val(),
'Num_Cuenta':$('#nu').val(),
'genero_id':$('#g').val(),
'estado_civil_id':$('#e').val(),
'Estado_id':$('#es').val(),

    },
success: function(data) {
      $('.afi' + data.id).replaceWith(" "+
      "<tr class='afi'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.Nombre + "</td>"+
          "<td>" + data.Apellido1 + "</td>"+
          "<td>" + data.Apellido2 + "</td>"+
          "<td>" + data.Telefono + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.Direccion+ "</td>"+
          "<td>" + data.Fecha_Ingreso+ "</td>"+
          "<td>" + data.Num_Cuenta+ "</td>"+
          "<td>" + data.genero_id + "</td>"+
          "<td>" + data.estado_civil_id + "</td>"+
          "<td>" + data.Estado_id + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-Apellido1='" + data.Apellido1 + 
          "'data-Apellido2='" + data.Apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.Estado_id +
 "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-Apellido1='" + data.Apellido1 + 
          "'data-Apellido2='" + data.Apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.Estado_id +
 "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-Apellido1='" + data.Apellido1 + 
          "'data-Apellido2='" + data.Apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.Estado_id +
"'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
    }
  });
});


// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Delete");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete Post');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.title').html($(this).data('descripcion'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteAfiliado',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
       $('.afiliado' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  
  $('#iaa').val($(this).data('iii'));
$('#jaja').val($(this).data('nom'));
;
  $('.modal-show').text('Datos');
  });

 
</script>


    
  </body>
</html>

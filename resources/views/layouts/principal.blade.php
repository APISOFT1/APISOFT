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




    {!!Html::style ('/vendor/switch/switchery.min.css')!!} 

    {!!Html::style ('/css2/bootstrap.min.css')!!} 

    {!!Html::style ('/css/green.css')!!} 


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
              <a href="{{ url('/admin') }}" class="site_title">
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
                <li><a><i class="fa fa-briefcase"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{ url('/roles/') }}">Gestionar Rol</a></li>
                     <li><a href="{{ url('/permissions/') }}">Gestionar Permisos</a></li>
                     <li><a href="{{ url('/users/') }}">Gestionar Users</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Afiliados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Afiliado/') }}">Gestionar Afiliado</a></li>
                      <li><a href="{{ url('/Ubicacion/') }}">Gestionar Ubicacion</a></li>
                      <li><a href="{{ url('/AfiliadoApiario/') }}">Gestionar Afiliado-Apiario</a></li>
                      <li><a href="{{ url('/Apiario/') }}">Gestionar Apiaro</a></li>
                    
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-list-alt"></i> Recepción<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/RecepcionMateriaPrima') }}">Gestionar Recepción</a></li>
                      <li><a href="{{ url('/Cera/') }}">Gestionar Extración de cera</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-oil"></i> Planta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Estanon/') }}">Gestionar Estañones</a></li>
                      <li><a href="{{ url('/RecepEstanon/') }}">Gestionar Recepción-Estañón</a></li>
                      <li><a href="{{ url('/Homogeneizacion/') }}">Gestionar Homogeneización</a></li>
                    
                    </ul>
                  </li>

                  <li><a><i class="glyphicon glyphicon-shopping-cart"></i> Producto Terminado <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('/Estanon/') }}">Gestionar Estañones</a></li>
                      <li><a href="{{ url('/AfiliadoEstanon/') }}">Gestionar Afiliado-Estañon</a></li>
                      <li><a href="{{ url('/Homogeneizacion/') }}">Gestionar Homogeneización</a></li>
                    
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
  
  
    <!-- jQuery -->

    {!!Html::script('/js2/jquery.min.js')!!}  
    @stack('scripts')
    <!-- Bootstrap -->
    {!!Html::script('/js2/bootstrap.min.js')!!}

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <!-- FastClick -->
    {!!Html::script('/js2/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('/js2/nprogress.js')!!}
    <!-- jQuery custom content scroller -->
    {!!Html::script('/js2/jquery.mCustomScrollbar.concat.min.js')!!}
    <!-- Custom Theme Scripts -->
    {!!Html::script('/js2/custom.min.js')!!}
     {!!Html::script('/js2/dropdown.js')!!}

     {!!Html::script('/js/switchery.min.js')!!}

     {!!Html::script('/js/icheck.min.js')!!}

     {!!Html::script('/js/icheck.js')!!}





<!-- MODAL AFILIADO -->
  
<<<<<<< HEAD

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
=======
>>>>>>> Caro
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
        'apellido1': $('input[name=apellido1]').val(),
        'apellido2': $('input[name=apellido2]').val(),
        'Telefono': $('input[name=Telefono]').val(),
        'email': $('input[name=email]').val(),
        'Direccion': $('input[name=Direccion]').val(),
        'Fecha_Ingreso': $('input[name=Fecha_Ingreso]').val(),
        'Num_Cuenta': $('input[name=Num_Cuenta]').val(),
        'genero_id': $("select[name=genero_id]").val(),
        'estado_civil_id': $('select[name=estado_civil_id').val(),
        'estado_id': $('input[name=estado_id]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.id);
          $('.error').text(data.errors.Nombre);
          $('.error').text(data.errors.apellido1);
          $('.error').text(data.errors.apellido2);
          $('.error').text(data.errors.Telefono);
          $('.error').text(data.errors.email);
          $('.error').text(data.errors.Direccion);
          $('.error').text(data.errors.Fecha_Ingreso);
          $('.error').text(data.errors.Num_Cuenta);
          $('.error').text(data.errors.genero_id);
          $('.error').text(data.errors.estado_civil_id);
          $('.error').text(data.errors.estado_id);

 
        } else {
          $('.error').remove();
          $('#table').append("<tr class='item" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.Nombre + "</td>"+
          "<td>" + data.apellido1 + "</td>"+
          "<td>" + data.apellido2 + "</td>"+
          "<td>" + data.Telefono + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.Direccion+ "</td>"+
          "<td>" + data.Fecha_Ingreso+ "</td>"+
          "<td>" + data.Num_Cuenta+ "</td>"+
          "<td>" + data.genero_id + "</td>"+
          "<td>" + data.estado_civil_id + "</td>"+
          "<td>" + data.estado_id + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-apellido1='" + data.apellido1 + 
          "'data-apellido2='" + data.apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-estado_id='" + data.estado_id +
 "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-apellido1='" + data.apellido1 + 
          "'data-apellido2='" + data.apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-estado_id='" + data.estado_id +
 "' ><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-apellido1='" + data.apellido1 + 
          "'data-apellido2='" + data.apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-estado_id='" + data.estado_id +
"'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
         
        }
      },
    });
    $('#idd').val('');
    $('#Nombre').val('');
    $('#apellido1').val('');
    $('#apellido2').val('');
    $('#Telefono').val('');
    $('#email').val('');
    $('#Direccion').val('');
    $('#Fecha_Ingreso').val('');
    $('#Num_Cuenta').val('');
    $('#genero_id').val('');
    $('#estado_civil_id').val('');
    $('#estado_id').val('');
  });


$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Editar ");
$('#footer_action_button').addClass('fa fa-pencil');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-descripcion').text('Editar ');
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
'apellido1':$('#a1').val(),
'apellido2':$('#a2').val(),
'Telefono':$('#t').val(),
'email':$('#em').val(),
'Direccion':$('#d').val(),
'Fecha_Ingreso':$('#f').val(),
'Num_Cuenta':$('#nu').val(),
'genero_id':$('#g').val(),
'estado_civil_id':$('#e').val(),
'estado_id':$('#es').val(),

    },
success: function(data) {
      $('.afi' + data.id).replaceWith(" "+
      "<tr class='afi'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.Nombre + "</td>"+
          "<td>" + data.apellido1 + "</td>"+
          "<td>" + data.apellido2 + "</td>"+
          "<td>" + data.Telefono + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.Direccion+ "</td>"+
          "<td>" + data.Fecha_Ingreso+ "</td>"+
          "<td>" + data.Num_Cuenta+ "</td>"+
          "<td>" + data.genero_id + "</td>"+
          "<td>" + data.estado_civil_id + "</td>"+
          "<td>" + data.estado_id + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-apellido1='" + data.apellido1 + 
          "'data-apellido2='" + data.apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.estado_id +
 "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-apellido1='" + data.apellido1 + 
          "'data-apellido2='" + data.apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.estado_id +
 "' ><span class='fa fa-pencil-esquare-o'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" 
 + data.id + 
          "' data-Nombre='" + data.Nombre + 
          "'data-apellido1='" + data.apellido1 + 
          "'data-apellido2='" + data.apellido2+
           "'data-Telefono='" + data.Telefono +
            "' data-email='" + data.email +
             "'data-Direccion='" + data.Direccion + 
             "'data-Fecha_Ingreso='" + data.Fecha_Ingreso + 
             "'  data-Num_Cuenta='" + data.Num_Cuenta +
              "'data-genero_id='" + data.genero_id + 
              "'data-estado_civil_id='" + data.estado_civil_id +
               "'data-Estado_id='" + data.estado_id +
"'><span class='fa fa-trash'></span></button></td>"+
          "</tr>");
    }
  });
});

/*

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
$('.Nombre').text($(this).data('Nombre'));
$('.apellido1').text($(this).data('apellido1'));
$('.apellido2').text($(this).data('apellido2'));
$('.Telefono').text($(this).data('Telefono'));
$('.email').text($(this).data('email'));
$('.Direccion').text($(this).data('Direccion'));
$('.Fecha_Ingreso').text($(this).data('Fecha_Ingreso'));
$('.Num_Cuenta').text($(this).data('Num_Cuenta'));
$('.genero_id').text($(this).data('genero_id'));
$('.estado_civil_id').text($(this).data('estado_civil_id'));
$('.estado_id').text($(this).data('estado_id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.id').html($(this).data('id'));
$('.Nombre').html($(this).data('Nombre'));
$('.apellido1').html($(this).data('apellido1'));
$('.apellido2').html($(this).data('apellido2'));
$('.Telefono').html($(this).data('Telefono'));
$('.email').html($(this).data('email'));
$('.Direccion').html($(this).data('Direccion'));
$('.Fecha_Ingreso').html($(this).data('Fecha_Ingreso'));
$('.Num_Cuenta').html($(this).data('Num_Cuenta'));
$('.genero_id').html($(this).data('genero_id'));
$('.estado_civil_id').html($(this).data('estado_civil_id'));
$('.estado_id').html($(this).data('estado_id'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteAfiliado',
    data: {
      'id': $('.id').text(),
      'Nombre': $('.Nombre').text(),
      'apellido1': $('.apellido1').text(),
      'apellido2': $('.apellido2').text(),
      'Telefono': $('.Telefono').text(),
      'email': $('.email').text(),
      'Direccion': $('.Direccion').text(),
      'Fecha_Ingreso': $('.Fecha_Ingreso').text(),
      'Num_Cuenta': $('.Num_Cuenta').text(),
      'genero_id': $('.genero_id').text(),
      'estado_civil_id': $('.estado_civil_id').text(),
      'estado_id': $('.estado_id').text()
      
    },
    success: function(data){
       $('.afi' + $('.id').text()+ $('.Nombre').text()+
       $('.apellido1').text()+ $('.apellido2').text()+ $('.Telefono').text()+ $('.email').text()+ $('.Direccion').text()+
       $('.Fecha_Ingreso').text()+ $('.Num_Cuenta').text()+ $('.genero_id').text()+ $('.estado_civil_id').text()+ $('.genero_id').text()).remove();
    }
  });
});
*/


  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  

$('#iaa').val($(this).data('id'));
$('#jaja').val($(this).data('nombre'));
;
  $('.modal-show').text('Datos');
  });


<script type="text/javascript">
$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'), // tab nav items
            allWells = $('.setup-content'), // content div
            allNextBtn = $('.nextBtn'); // next button

    allWells.hide(); // hide all contents by defauld

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    // next button
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='email'],input[type='password'],input[type='url']"),
            isValid = true;
           // Validation
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        // move to next step if valid
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });


 
    $('div.setup-panel div a.btn-primary').trigger('click');
});


</script>


  </script>
  </body>
</html>
<<<<<<< HEAD
<script>


var timeoutId = 0;
$('#discount').keyup(function(e){
   clearTimeout(timeoutId);
   timeoutId = setTimeout(discount,1000);
});

function discount(){
  let amount = $('#discount').val();
  if(!isNaN(amount)){
    let discount = amount * 0.05;
    let total =  amount - discount;
    $("#total").val(total);
  } 
}

</script>
=======
  <style type="text/css">
.form-control {
    height: 37px;
}
.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}


 
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
>>>>>>> Caro

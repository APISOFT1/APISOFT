@extends('layouts.principal')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  AFILIADO CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')

<h1 class="text-center">LISTADO DE  AFILIADOS </h1>


<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">
		@include('Afiliado.search') 

</div>
<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
    <table class="table table-bordered" id="table">
      <tr>
			<th width="150px" >Cedula</th>
  		<th> <div class="size2">Afiliado</th>
  		<th>Telefono</th>
  		<th>Correo</th>
    	<th>Direccion</th>
  		<th>FechaIngreso</th>
  		<th>Numero de Cuenta</th>
    	<th>Genero</th>
  		<th>Estado Civil</th>
			<th>Estado</th>
        <th ><div class="size">
          <a href="addAfiliado" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      @foreach ($afi as $value)
        <td>{{$value->id}}</td>
  	  	<td>{{$value->Nombre}} {{$value->apellido1}} {{$value->apellido2}}</td>
        <td>{{$value->Telefono}}</td>
  		  <td>{{$value->email}}</td>
        <td>{{$value->Direccion}}</td>
  	  	<td>{{$value->Fecha_Ingreso}}</td>
        <td>{{$value->Num_Cuenta}}</td>
	    	<td>{{$value->Genero->descripcion}}</td>
	    	<td>{{$value->Estado_Civil->descripcion}}</td>
				<td> <?php  if ($value->estado_id=='1') {
			# code...
			print("Activo");
		} else {
			print("Inactivo");
		}
		  ?></td>  		
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" 
            data-id="{{$value->id}}"
            data-Nombre="{{$value->Nombre}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm"
            data-id="{{$value->id}}"
            data-Nombre="{{$value->Nombre}}"
            data-apellido1="{{$value->apellido1}}"
            data-apellido2="{{$value->apellido2}}"
            data-Telefono="{{$value->Telefono}}"
            data-email="{{$value->email}}"
            data-Direccion="{{$value->Direccion}}"
            data-Fecha_Ingreso="{{$value->Fecha_Ingreso}}"
            data-Num_Cuenta="{{$value->Num_Cuenta}}"
            data-genero_id="{{$value->Genero->descripcion}}"
            data-estado_civil_id="{{$value->Estado_Civil->descripcion}}"
            data-estado_id="{{$value->estado_id}}"><i class="glyphicon glyphicon-pencil"></i> </a>

            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->Nombre}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$afi->links()}}
</div>
{{-- Modal Form Create Post --}}

<div id="create" class="modal fade" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
       
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="id">Cedula:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" name="id"
              placeholder="Ingrese Su Cedula" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="Nombre">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Nombre" name="Nombre"
              placeholder="Nombre" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="apellido1">Apellido1 :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="apellido1" name="apellido1"
              placeholder="Primer Apellido" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="apellido2">Apellido2:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="apellido2" name="apellido2"
              placeholder="Segundo Apellido" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="Telefono">Telefono:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Telefono" name="Telefono"
              placeholder="Telefono" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
					<div class="form-group row add">
            <label class="control-label col-sm-2" for="email">Emai:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email"
              placeholder="Ingrese su Correo" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
					<div class="form-group row add">
            <label class="control-label col-sm-2" for="Direccion">Direccion:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Direccion" name="Direccion"
              placeholder="Ingrese Su Direccion" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="Fecha_Ingreso">Fecha de Ingreso:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="Fecha_Ingreso" name="Fecha_Ingreso"
              placeholder="YYYY-MM-DD" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="Num_Cuenta">Numero Cuenta:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Num_Cuenta" name="Num_Cuenta"
              placeholder="Ingrese su Numero de Cuenta" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="genero_id">Genero:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="genero_id" name="genero_id"
              placeholder="Genero" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="estado_civil_id">Estado Civil:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="estado_civil_id" name="estado_civil_id"
              placeholder="estado civil" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>

					<div class="form-group row add">
            <label class="control-label col-sm-2" for="estado_id">Estado</label>
	
				<div class="register-switch">
      <input type="radio" name="estado_id" value="{{$estado_id=1}}" id="estado_id" class="register-switch-input" checked>
      <label for="estado_id" class="register-switch-label">Activo</label>
      <input type="radio" name="estado_id" value="{{$estado_id=0}}" id="estado_id" class="register-switch-input">
      <label for="estado_id" class="register-switch-label">Inactivo</label>
	</div> 
					
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Guardar Afiliado
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cerrar
            </button>
          </div>
    </div>
  </div>
</div></div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripcion :</label>
                      <b id="di"/>
                    </div>
                    </div>
                    </div>
                  </div>
</div>
{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-descripcion"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="i" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Nombre">Nombre</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="n" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="apellido1">Primer Apellido</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="a1">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="apellido2">Segundo Apellido</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="a2">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Telefono">Telefono</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="t" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="email">Correo</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="em" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Direccion">Direccion</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="d" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Fecha_Ingreso">Fecha Ingreso</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="f">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="Num_Cuenta">Numero de Cuenta</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="nu" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="genero_id">Genero</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="g" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="estado_civil_id">Estado Civil</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="e" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="estado_id">Estado</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="es" >
            </div>
          </div>

        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="descripcion"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>

  	
@endsection
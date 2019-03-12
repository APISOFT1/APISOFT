@extends ('layouts.principal')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Recepcion de Materia Prima</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'RecepcionMateriaPrima','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
           

			
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
   <div class="form-group">
    <label for="afiliado">Afiliado</label>
    <select name="afiliado_id" id="afiliado_id" class="form-control selectpicker" data-live-search="true">
	@foreach ($afiliados as $afiliado)
     <option value="{{$afiliado->id}}">{{$afiliado->Nombre}} {{$afiliado->apellido1}} {{$afiliado->apellido2}}</option>
     @endforeach
    </select>
   </div>
  

            <div class="form-group">
            	<label for="fecha">Fecha</label>
				<input type="date" name="fecha" class="form-control"  required="required" placeholder="YYYY-MM-DD" />
            </div>
             
			<div class="form-group">
            	<label for="pesoBruto">Peso Bruto</label>
				<input type="number" name="pesoBruto" class="form-control" placeholder="Peso bruto..." />
            </div>
			<br />
			<div class="form-group">
            	<label for="">Numero muestra</label>
				<input type="number" name="numero_muestras" class="form-control" placeholder="Numero muestra..." />
            
            </div>
			<div class="form-group">
				<label for="user_id">Responsable</label>	
				<input  type="text" name="user_id"  disabled class="form-control" value="{{ Auth::user()->id}}"></option>
            </div>			
           
			<br />
		

            <div class="form-group">
            	<div class="col-md-6">
				<label for="tipoEntrega_id">Tipo Entrega</label>
					<select class="form-control" id="tipoEntrega_id" name="tipoEntrega_id">
						@foreach ($tipoEntregas as $entrega)
							<option value="{{ $entrega->id }}">{{ $entrega->Descripcion }}</option>
						@endforeach						
					</select>
				</div>
            </div>
          
			<br />
			<br />
			<br />
			<br />
			<br />
            <div class="form-group">
			
            	<div class="col-md-6">
            	<button class="btn btn-primary" type="submit">Guardar</button> 

            	<button class="btn btn-danger" type="reset">Cancelar</button>
				
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection
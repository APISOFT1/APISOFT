@extends ('layouts.admin')
@section ('contenido')
	
			
			{!!Form::model($estanon,['method'=>'PATCH','route'=>['Estanon.update',$estanon->id]])!!}
            {{Form::token()}}
			<div class="form-group">
            	<label for="Peso">Peso</label>
            	<input type="text" name="Peso" class="form-control" value="{{$estanon->Peso}}" placeholder="Peso...">
            </div>
           
            <div class="form-group">
            	<label for="Fecha">Fecha</label>
            	<input type="date" name="Fecha" class="form-control" value="{{$estanon->fecha}}" placeholder="Fecha...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection
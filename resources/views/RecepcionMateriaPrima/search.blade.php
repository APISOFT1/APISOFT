{!! Form::open(array('url'=>'RecepcionMateriaPrima','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<input type="text" class="form-control"  name="searchText" placeholder="Buscar..." value="{{$searchText}}">
</div>

{{Form::close()}}
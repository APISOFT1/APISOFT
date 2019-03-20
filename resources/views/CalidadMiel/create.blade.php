<div class="modal fade modal-slide-in-right" id="createCalidadMiel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Crear</h4>
            </div>
            
            <div class="modal-body">
            {!!Form::open(array('url'=>'CalidadMiel','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Fecha">Fecha</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="descripción...">
            </div>
	
            </div>

            <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}	
        </div>
    </div>
</div>
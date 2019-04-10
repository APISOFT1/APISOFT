@extends ('layouts.principalCera')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addCera')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  CERA CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  CERA</h1>

<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->



<!--Esta clase nos permite posicionar el buscador  -->

    @include('Apiario.search') 
  
    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>April 9, 2019 - April 9, 2019</span> <b class="caret"></b>
                    </div>


<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Código</th>
					<th>Descripción</th>
					<th>Recepción</th>
					<th>Peso Bruto</th>
                    <th>Peso Neto</th>
                    <th>Fecha</th>
					<th><a href="#"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i></th>
            <th><a href="#"
					class=" btn btn-success btn-sm" data-toggle="modal" data-target="#miModal">
            <i class="glyphicon glyphicon-plus"></i></th>
				</thead>
        {{ csrf_field() }}
           <?php  $no=1; ?>
               @foreach ($cera as $value)
					<tr class="api{$value->id}}">
          <td>{{ $no++ }}</td>
					<td>{{ $value->Descripcion}}</td>
					<td>{{ $value->RecepcionMateriaPrima->id}} - {{ $value->RecepcionMateriaPrima->afiliado->Nombre}} {{ $value->RecepcionMateriaPrima->afiliado->apellido1}} {{ $value->RecepcionMateriaPrima->afiliado->apellido2}}</td>
            <td>{{ $value->PesoBruto}}</td>
            <td>{{ $value->PesoNeto}}</td>
            <td>{{ $value->Fecha}}</td>
					<td>
					<a href="#" class="show-modal btn btn-info btn-sm"
					 data-id="{{$value->id}}" 
					 data-Descripcion="{{$value->Descripcion}}"
					 data-Recepcion_id="{{$value->Recepcion_id}}"
					 data-PesoBruto="{{$value->PesoBruto}}"
                     data-PesoNeto="{{$value->PesoNeto}}"
                     data-Fecha="{{$value->Fecha}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" 
						data-id="{{$value->id}}"
					 data-Descripcion="{{$value->Descripcion}}"
                     data-Recepcion_id="{{$value->Recepcion_id}}"
					 data-PesoBruto="{{$value->PesoBruto}}"
                     data-PesoNeto="{{$value->PesoNeto}}"
                     data-Fecha="{{$value->Fecha}}">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm"
						 data-id="{{$value->id}}"
						  data-title="{{$value->Descripcion}}">
              <i class="glyphicon glyphicon-trash"></i>
            </a>

          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$cera->links()}}
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

       
        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="Descripcion" name="Descripcion" placeholder="Descripción" required>
            <p class="No Ingreso la Descripcion"></p>
              <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>
                </div>
              
        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-right" id="PesoBruto" name="PesoBruto" placeholder="Peso Bruto" required>
            <p class="No Ingreso el Peso bruto"></p>
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
             
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           <input type="text" class="form-control has-feedback-left" id="PesoNeto" name="PesoNeto" placeholder="Peso Neto" required>
            <p class="No Ingreso el Peso Neto"></p>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
          
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="date" class="form-control has-feedback-right" id="Fecha" name="Fecha" required>
              <p class="No Ingreso la Fecha"></p>
              <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <input type="text" class="form-control has-feedback-left" id="resultado1" name="resultado" placeholder="Recepción" required>
              <p class="No Ingreso la Recepción"></p>
              <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
            </div> 
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#miModal">   <i class="fa fa-search"></i>
         
        </form>
      </div>
          <div class="modal-footer">
          <button class="btn btn-warning" type="submit" id="add">
              <span class="fa fa-save"></span> Guardar 
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="fa fa-times"></span> Cerrar
            </button>
          </div>
    </div>
  </div>
</div></div>

{{-- MODAL RECEPCION --}}
<div id="miModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Buscar Recepción</h4>
    </div>
    <div class="modal-body">
    <form class="form-horizontal">
    <div class="form-group">                                              
    <div class="col-sm-6">
    <input type="text" class="form-control" id="filtrar" placeholder="Buscar productos">
    </div>
    <a href="#" id="bus"><i class='glyphicon glyphicon-search'></i> Buscar</a>
                  </div>
                </form>                 
                                  <div class="outer_div">                                          
                                      
                                        <div class="table-responsive">
                                        <table class="table">

                                            <tbody class="buscar">    
                                        <tr  class="warning">
                                            <th>Código</th>
                                            <th>Afiliado</th>
                                            <th>pesoBruto</th>  
                                            <th>Fecha</th>
                                            <th class='text-center' style="width: 36px;">Agregar</th>
                                        </tr>
                                       

                                        @foreach ($recepciones as $value)
                                        <tr>
                                        
					                              <td>{{ $value->id}}</td>
				                             	  <td>{{ $value->afiliado->id}}{{ $value->afiliado->Nombre}}{{ $value->afiliado->apellido1}}{{ $value->afiliado->apellido2}}</td>
                                        <td>{{ $value->pesoBruto}}</td>
                                         <td>{{ $value->fecha}}</td>
                                        
                                            
                                            
                                            <td class='col-xs-2'>
                                                <div class="pull-right">
                                                    <input type="text" class="form-control" style="text-align:right" id="precio" value="">
                                                </div>
                                            </td>
                                            <td class='text-center'>
                                                <a class='btn btn-info'href="#" onclick="agregar(<?php echo $value->id; ?>)"><i class="glyphicon glyphicon-plus"></i></a>
                                            </td>
                                  
                                            @endforeach
                                        </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                  
              </div>
            </div>
          </div>
        </div>
        
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
                      <b id="i2"/>
                    </div>
                    <div class="form-group">
                      <label for="">Descripcion :</label>
                      
                      <b id="d2"/>
                    </div>
										<div class="form-group">
                      <label for="">Cantidad :</label>
                      <b id="ca2"/>
                    </div>
										<div class="form-group">
                   
                      <label for="">Ubicacion :</label>
                      <b id="ub2"/>
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
              <input type="text" class="form-control" id="ids" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="Descripcion">Descripcion</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="cri">
            </div>
          </div>

					<div class="form-group">
            <label class="control-label col-sm-2"for="cantidad">Cantidad</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="can">
            </div>
          </div>

        

        </form>

         <!-- Modal Busca Producto-->
   
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                  
              </div>
            </div>
          </div>
        </div>
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

<script>
  
</script>

@extends ('layouts.principalApiario')

<!-- mensaje de exito -->
<?php $message=Session::get('message') ?>

@if($message == 'addApiario')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  ROL CREADO CORRECTAMENTE
</div>
@endif
<!-- fin de mensaje de exito -->

@section ('contenido')
<h1 class="text-center">LISTADO DE  ROLES</h1>
@can('permisos')
<!-- Saltos de linea-->
<br>
<br>
<!-- Fin de salto de linea. No necesita una etiqueta de cierre-->

<!--Esta clase nos permite posicionar el buscador  -->
<div class="absolute3">

</div>

<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <tr>
                        
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Permiso</th>
                        <th><a href="{{ route('roles.create') }}"
					class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i></th>
				</thead>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions()->pluck('name') as $permission)
                                        <span class="label label-info label-many">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['roles.destroy', $role->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
    @else
                            Usted no tiene los permisos suficientes 
                        @endcan
@endsection
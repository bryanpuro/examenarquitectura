@extends('layouts.layoutadmin')

@section('contenido')
<h1>Lista De Usuarios</h1>

<div class="container">

	<!-- Session de Actualizado -->
    @if(Session::has('users_update'))
    <div class="alert alert-success" role="alert">
        <strong>{!! session('users_update') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
	<!-- Session de Eliminado -->
	@if(Session::has('users_delete'))
    <div class="alert alert-danger" role="alert">
        <strong>{!! session('users_delete_delete') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
	

		@if(count($users) > 0)
  		<table class="table table-striped task-table">
    		<thead>
      			<tr>
				  <th>Rol</th>
				  <th>Cedula</th>
				  <th>Nombres</th>
				  <th>Apeliidos</th>
				  <th>Direccion</th>
				  <th>Telefono</th>
				  <th>Email</th>
				  <th>Editar</th>
				  <th>Eliminar</th>
        			
      			</tr>
   			 </thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					@foreach ($roles as $rol)
					@if ($user->id_roles == $rol->id_roles)
					@if ($rol ->id_roles==1)
						<td> Administrador</td>
						@elseif ($rol ->id_roles==2)
						<td> Empleado</td>
						@endif
						@endif
					@endforeach
					<td> {!! $user->CI !!} </td>
					<td> {!! $user->nombres !!} </td>
					<td> {!! $user->apellidos !!} </td>
					<td> {!! $user->direccion !!} </td>
					<td> {!! $user->telefono !!} </td>
					<td> {!! $user->email !!} </td>
					<td> 
						<div class="btn btn-warning">	
							<a href="{!! url('agregarusuario/' . $user->id_users .	 '/edit') !!}" class="btn btn-success">Editar</a> 
						</div>
					</td>		
					<td> 
						{!! Form::open(array('url'=>'agregarusuario/' . $user->id_users, 'method' => 'DELETE')) !!}
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-warning">Eliminar</button> 
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
  		</table>
 		 @endif

  </div> 

@endsection
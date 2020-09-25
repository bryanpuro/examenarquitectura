@extends('layouts.layoutempleado')

@section('contenido')
<h1>Lista de Clientes</h1>

<div class="container">

	<!-- Session de Actualizado -->
    @if(Session::has('clientes_update'))
    <div class="alert alert-success" role="alert">
        <strong>{!! session('clientes_update') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
	<!-- Session de Eliminado -->
	@if(Session::has('clientes_delete'))
    <div class="alert alert-danger" role="alert">
        <strong>{!! session('clientes_delete_delete') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
	

		@if(count($clientes) > 0)
  		<table class="table table-striped task-table">
    		<thead>
      			<tr>
				  
				  <th>Cedula</th>
				  <th>Nombres</th>
				  <th>Apeliidos</th>
				  <th>Direccion</th>
				  <th>Telefono</th>
				  
				  
      			</tr>
   			 </thead>
			<tbody>
				@foreach ($clientes as $cliente)
				<tr>
					<td> {!! $cliente->CI !!} </td>
					<td> {!! $cliente->nombre !!} </td>
					<td> {!! $cliente->apellido !!} </td>
					<td> {!! $cliente->direccion !!} </td>
					<td> {!! $cliente->telefono !!} </td>
					<td> {!! $cliente->email !!} </td>
					
					<td> 
							
						<a href="{!! url('clientes/' . $cliente->id_cliente .	 '/edit') !!}" class="btn btn-success">Editar</a> 
						
					</td>		
					<td> 
						{!! Form::open(array('url'=>'clientes/' . $cliente->id_cliente, 'method' => 'DELETE')) !!}
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
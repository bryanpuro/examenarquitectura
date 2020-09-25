@extends('layouts.layoutadmin')

@section('contenido')
<h1>lista Categorias</h1>

<div class="container">

	

		@if(count($categories) > 0)
  		<table class="table table-striped task-table">
    		<thead>
      			<tr>
				  <th>Numero</th>
				  <th>Nombre Categoria</th>
        			<th>Editar</th>
					<th>Eliminar</th>
      			</tr>
   			 </thead>
			<tbody>
				@foreach ($categories as $category)
				<tr>
					<td> {!! $category->id_cat !!} </td>
					<td> {!! $category->categoria !!} </td>
					<td> 
						<div class="btn btn-warning">	
						
							<a href="{!! url('catbicicletas/' . $category->id_cat .	 '/edit') !!}" class="btn btn-success">Editar</a> 
						</div>
					</td>		
			<td> 
				{!! Form::open(array('url'=>'catbicicletas/' . $category->id_cat, 'method' => 'DELETE')) !!}
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

@endsection
@extends('layouts.layoutadmin')

@section('contenido')
<h1>Listado Bicicletas</h1>

<div class="container">

	<!-- Session de Actualizado -->
    @if(Session::has('bicicleta_update'))
    <div class="alert alert-success" role="alert">
        <strong>{!! session('bicicleta_update') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
	<!-- Session de Eliminado -->
	@if(Session::has('bicicleta_delete'))
    <div class="alert alert-danger" role="alert">
        <strong>{!! session('bicicleta_delete_delete') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
	

		@if(count($bicicletas) > 0)
  		<table class="table table-striped task-table">
    		<thead>
      			<tr>
				  <th>Stock</th>
				  <th>Modelo</th>
				  <th>Marca</th>
				  <th>Categoria</th>
				  <th>Imagen</th>
				  <th>Editar</th>
				  <th>Eliminar</th>
        			
      			</tr>
   			 </thead>
			<tbody>
				@foreach ($bicicletas as $bicicleta)
				<tr>
					<td> {!! $bicicleta->stock !!} </td>
					<td> {!! $bicicleta->modelo !!} </td>
					<td> {!! $bicicleta->marca !!} </td>

					@foreach ($categories as $category)
						@if ($bicicleta->id_cat == $category->id_cat)
						<td> {!! $category->categoria !!} </td>
						@endif
					@endforeach
					<td> {!! Html::image("imagenesbicis/".$bicicleta->imagen, $bicicleta->marca, array('width'=>'60')) !!} </td>
					<td> 
						<div class="btn btn-warning">	
							<a href="{!! url('bicicletas/' . $bicicleta->id_bicicleta .	 '/edit') !!}" class="btn btn-success">Editar</a> 
						</div>
					</td>		
					<td> 
						{!! Form::open(array('url'=>'bicicletas/' . $bicicleta->id_bicicleta, 'method' => 'DELETE')) !!}
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
@extends('layouts.layoutempleado')

@section('contenido')
<h1>Lista Bicicletas</h1>
<!-- MAIN -->

@if(count($bicicletas) > 0)
  		<table class="table table-striped task-table">
    		<thead>
      			<tr>
				  <th>Stock</th>
				  <th>Modelo</th>
				  <th>Marca</th>
				  <th>Categoria</th>
        			<th>&nbsp;</th>
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
						
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
     
  		</table>
      
      {!! $bicicletas->render() !!}
     
      
 		 @endif
      
      

@endsection
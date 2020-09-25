@extends('layouts.layoutempleado')

@section('contenido')
<h1>Formulario de Alquiler Bicicletas</h1>

<div class="container">
	
{!! Form::open(array('url'=>'vistaalquiler','class'=>'customform'))!!}

<div class="line">
 <div class="margin">
<div class="s-12 m-12 l-6">
{!! Form::label('id_cliente', 'Datos del Cliente') !!}
{!! Form::select('id_cliente', $clientes, array('class'=>'border-radius')) !!}
</div>

    <div class="s-12 m-12 l-6">
	{!! Form::label('hora alquiler:', 'Hora De Alquiler') !!}
    <!-- //{!! Form::time('hora_alquiler', null, array('class'=>'form-group')) !!} -->
	<input type="time" name="hora_alquiler" min="08:00" max="18:00" step="600">
	</div>
	<br></br>
	<div class="s-12 m-12 l-6">
	{!! Form::label('hora_devolucion:', 'Hora De devolucion') !!}
	{!! Form::time('hora_devolucion', null, array('class'=>'form-group')) !!}
	</div>
	
	<div class="s-12 m-12 l-6">
    {!! Form::label('fecha_alquiler:', 'Fecha De Alquiler') !!}
    {!! Form::date('fecha_alquiler', null, array('class'=>'form-group')) !!}
	</div>
	
	<div class="s-12 m-12 l-6">
    {!! Form::label('fecha_devolucion:', 'Fecha De Devolucion') !!}
	{!! Form::date('fecha_devolucion', null, array('class'=>'form-group')) !!}
	</div>
	
	<div class="s-12 m-12 l-6">
    {!! Form::label('garantia:', 'Garantia') !!}
	{!! Form::text('garantia', null, array('class'=>'form-group')) !!}
	</div>
	
	<div class="s-12 m-12 l-6">
    {!! Form::label('iva_vsita:', 'Iva del Alquiler') !!}
	{!! Form::text('iva', null, array('class'=>'form-group')) !!}
	</div>
  
	{!! Form::submit('Siguiente', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
	</div>
</div>
    {!! Form::close() !!}
	
  </div> 


  @if(count($alquilerlist) > 0)
  		<table class="table table-striped task-table">
    		<thead>
      			<tr>
				  <th>Nombre Cliente</th>
				  <th>Hora Alquiler</th>
				  <th>Hora devolucion</th>
				  <th>Fecha Alquiler</th>
				  <th>Fecha Devolucion</th>
				  <th>Estado</th>
				  <th>Garantia</th>
        			<!-- <th>&nbsp;</th> -->
      			</tr>
   			 </thead>
			<tbody>
				@foreach ($alquilerlist as $alquiler)
				<tr>
                        @foreach ($listaclientes as $cliente)
						@if ($alquiler->id_cliente == $cliente->id_cliente)
						<td> {!! $cliente->nombre." ".$cliente->apellido !!} </td>
						@endif
					@endforeach
					<!-- <td> {!! $alquiler->id_cliente !!} </td> -->
					<td> {!! $alquiler->hora_alquiler !!} </td>
					<td> {!! $alquiler->hora_devolucion !!} </td>
					<td> {!! $alquiler->fecha_alquiler !!} </td>
					<td> {!! $alquiler->fecha_devolucion !!} </td>
					<td> {!! $alquiler->estado !!} </td>
                    <td> {!! $alquiler->garantia !!} </td>
                    <td> 
						
							<a href="{!! url('detallealquiler/' . $alquiler->id_alquiler) !!}" class="btn btn-success">Devolver</a> 
						
					</td>		
					<td> 


					
				</tr>
				@endforeach
			</tbody>
  		</table>
 		 @endif


@endsection
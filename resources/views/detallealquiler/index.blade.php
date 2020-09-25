@extends('layouts.layoutempleado')

@section('contenido')
<h1>Formulario de Alquiler Bicicletas</h1>

<div class="container">

<div class="col-lg-8 col-12">
                                @if(Session::has('cantidad_mayor'))
    <div class="alert alert-success" role="alert">
        <strong>{!! session('cantidad_mayor') !!}</strong>
        <!-- <button type="button" class="close" data-dismiss="alert" arial-label="close"> -->
            <!-- <spam aria-hidden="true">&times;</spam> -->
            <!-- </button> -->
    </div>
    @endif

	
{!! Form::open(array('url'=>'detallealquiler','class'=>'customform'))!!}
<div class="line">
<div class="margin">
<div class="s-12 m-12 l-6">
{!! Form::label('id_bicicleta', 'Bicicleta Modelo/Marca') !!}
{!! Form::select('id_bicicleta', $bicicletas, array('class'=>'nice-select')) !!}

</div>
<input type="hidden" name="iva" id="iva" value="<?php echo $iva_vista; ?>">
<input type="hidden" name="id_alquiler" id="id" value="<?php echo $alquiler->id_alquiler; ?>">
<div class="s-12 m-12 l-6">
{!! Form::label('id_bicicleta', 'Nombres del Cliente') !!}
<input type="text" name="id" id="id" value="<?php echo $clientes->nombre." ".$clientes->apellido ; ?>" disable= "true">

</div>
<div class="s-12 m-12 l-6">    
{!! Form::label('precio', 'Precio') !!}
{!! Form::text('precio', null, array('class'=>'form-group', )) !!}

</div>
<div class="s-12 m-12 l-6">
{!! Form::label('cantidad', 'Cantidad') !!}
{!! Form::text('cantidad', null, array('class'=>'form-group', )) !!}<br>

</div>
<br>

<!-- {!! Form::text('iva', null, array('class'=>'form-group', )) !!} -->
{!! Form::submit('Siguiente', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
<br>

</div>
</div>
{!! Form::close() !!}

{!! Form::open(array('url'=>'reporte/' . $alquiler->id_alquiler, 'method' => 'DELETE')) !!}

						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class='submit-form button background-danger border-radius text-white'>Cancelar Alquiler</button> 
						{!! Form::close() !!}

	
  <table>
  <thead>
      		<tr>
          <th>marca bici</th>
				  <th>precio</th>
				  <th>cantidad</th>
          <th>valor</th>
          <th></th>
      		</tr>
  </thead>
  <tbody>
  @if ($detalquiler == NULL)
   <h1 style="color: red;">Datos no Ingresados</h1> 

  @else
    @foreach ($detalquiler as $det)
  <tr>
  @foreach ($bicicletaslist as $bicicleta)
						@if ($bicicleta->id_bicicleta == $det->id_bicicleta)
						<td> {!! $bicicleta->marca !!} </td>
						@endif
					@endforeach
  <td> {!! $det->precio !!} </td>
	<td> {!! $det->cantidad !!} </td>
  <td> {!! $det->precio_final !!} </td>
  <td> 
						{!! Form::open(array('url'=>'detallealquiler/' . $det->id_detalle, 'method' => 'DELETE')) !!}
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-warning">Eliminar</button> 
						{!! Form::close() !!}
					</td>
  </tr>
  @endforeach
  
  
  <th>
          <td><td>SubTotal <td>{!! $subtotal !!}</td> </td></td>
          </th>
          <tr>
          <th>
          <td><td>Total <td>{!! $total !!}</td> </td></td>
          </th>
				 </tr>
  
  </tbody>
  </table>
	
  @endif
  {!! Form::close() !!}
  </div> 
  <!-- {!! Form::open(array('url'=>'reporte'))!!}
  <input type="hidden" name="id_alquiler"  value="<?php echo $alquiler->id_alquiler; ?>">
  {!! Form::submit('Reporte', array('class'=>'btn primary')) !!}
  {!! Form::close() !!} -->
  
  
<h1><a href="{{ route('reporte', ['id_alquiler' => $alquiler->id_alquiler]) }}">Ver Reporte</a></h1>

@endsection
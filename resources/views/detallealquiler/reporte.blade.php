@extends('layouts.layoutempleado')

@section('contenido')
<h1>Reporte de Alquiler Bicicletas</h1>

<label>CI/RUC :</labe>
<label for="Nombre Cliente">{!! $clientes->CI  !!}</label> <br>
<label>Nombres del Cliente :</labe>
<label for="Nombre Cliente">{!! $clientes->nombre  !!} {!! $clientes->apellido  !!}</label> <br>
<label>Telefono :</labe>
<label for="Nombre Cliente">{!! $clientes->telefono  !!} </label><br>
<label>Direccion :</labe>
<label for="Nombre Cliente">{!! $clientes->direccion  !!} </label>


<table>
  <thead>
      		<tr>
          <th>marca bici</th>
				  <th>precio</th>
				  <th>cantidad</th>
          <th>valor</th>
          
      		</tr>
  </thead>
  <tbody>
  @if ($detalquiler == NULL)
   <h1 style="color: red;">datos no ingresados</h1> 

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

  </tr>
  @endforeach
  
 
  
  </tbody>
  <tr>

          <th>
          <td><td>SubTotal <td>{!! $subtotal !!}</td> </td></td>
          </th>
          <tr>
          <th>
          <td><td>Total <td>{!! $total !!}</td> </td></td>
          </th>
				 </tr>
          
      	
  </table>
  
  
  @endif
  <br>
  <a class="btn btn-warning" href="javascript:window.print()">INPRIMIR</a>

@endsection
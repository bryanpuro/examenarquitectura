@extends('layouts.layoutadmin')

@section('contenido')
 <!-- Start Contact -->
 
											<h2>Formulario de Edición de Bicicletas</h2>
										
                                        @include('common.errors')
                                        
										
										{!! Form::model($bicicletas , array('route' => array('bicicletas.update', $bicicletas->id_bicicleta), 'method'=>'PATCH', 'files'=>'true','class'=>'customform'))!!}
                                        <div class="line">
 										<div class="margin">
										 <div class="s-12 m-12 l-6">
													{!! Form::label('id_cat', 'Categoria:') !!}
                                            		{!! Form::select('id_cat', $categories, array('class'=>'nice-select')) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('stock', 'Stock:') !!}
													{!! Form::text('stock', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('marca', 'Marca de la Bicicleta') !!}
                                            		{!! Form::text('marca', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('modelo', 'Modelo de la Bicicleta') !!}
                                            		{!! Form::text('modelo', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('imagen', 'Imagen:') !!}
                                            		{!! Form::file('imagen', null, array('class'=>'form-group')) !!}
                                            	 </div>
                                             	
                                           				 {!! Form::submit('Actualizar Bicicleta', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
															</div>
														</div>
                                                {!! Form::close() !!}
                                   
		
@endsection
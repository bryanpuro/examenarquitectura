@extends('layouts.layoutadmin')

@section('contenido')

										
										<h2>Formulario de Creación Categorías</h2>
										
                                        <!-- Muestra el error de ingreso -->
                                        @include('common.errors')
                                       
										{!! Form::open(array('url'=>'catbicicletas','class'=>'customform' ))!!}
                                        <div class="line">
 										<div class="margin">
										 <div class="s-12 m-12 l-6">
                                            {!! Form::label('name', 'Nombre de Categoría:') !!}
                                             {!! Form::text('categoria', null, array('class'=>'form-group', )) !!}
                                             
											 {!! Form::submit('Crear Categoría', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
                                            </div>
                                            </div>
                                            </div>
                                                {!! Form::close() !!}
                                            
                                       		
							


@endsection
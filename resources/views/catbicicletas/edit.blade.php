@extends('layouts.layoutadmin')

@section('contenido')
 <!-- Start Contact -->
 <section id="Formulario" class="contact-us">
			
											<h2>Formulario de Edición de Categorias</h2>
										</div>
                                        <!-- Muestra el error de ingreso -->
                                        @include('common.errors') 
                                        
                                        {!! Form::model($categories , array('route' => array('catbicicletas.update', $categories->id_cat), 'method'=>'PUT','class'=>'customform'))!!}
                                        <div class="line">
 										<div class="margin">
										 <div class="s-12 m-12 l-6">
                                                    {!! Form::label('name', 'Nombre de Categoría:') !!}
                                                    {!! Form::text('categoria', null, array('class'=>'form-group', )) !!}
													
                                            {!! Form::submit('Modificar Categoria', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
											</div>
											</div>
											</div>
                                                {!! Form::close() !!}
                                         
		</section>
		<!--/ End Contact -->

@endsection
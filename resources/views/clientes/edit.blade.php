@extends('layouts.layoutempleado')

@section('contenido')
 <!-- Start Contact -->
 <section id="Formulario" class="contact-us">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="contact-main">
							<div class="row">
								<!-- Contact Form -->
								<div class="col-lg-8 col-12">

								<div class="form-main">
										<div class="text-content">
											<h2>Formulario de Edición Usuarios</h2>
										</div>
                                        <!-- Muestra el error de ingreso -->
                                        @include('common.errors')
                                        
										
										{!! Form::model($clientes , array('route' => array('clientes.update', $clientes->id_cliente), 'method'=>'PATCH','class'=>'customform'))!!}
                                        <div class="line">
 										<div class="margin">
										 <div class="s-12 m-12 l-6">
													{!! Form::label('CI:', 'Cedula') !!}
                                            		{!! Form::text('CI', null, array('class'=>'form-group', 'disabled' => 'true')) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('nombre', 'Nombres') !!}
                                            		{!! Form::text('nombre', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('apellido', 'Apellidos') !!}
                                            		{!! Form::text('apellido', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('direccion', 'Direccion') !!}
                                            		{!! Form::text('direccion', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('telefono', 'Telefono') !!}
                                            		{!! Form::text('telefono', null, array('class'=>'form-group', )) !!}
													</div>
                                             
                                           				 {!! Form::submit('Actualizar Cliente', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
															</div>
															</div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
										
									</div>
								</div>
								<!--/ End Contact Form -->
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Contact -->

@endsection
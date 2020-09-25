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
                                @if(Session::has('clientes_creada'))
    <div class="alert alert-success" role="alert">
        <strong>{!! session('clientes_creada') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
									
											<h2>Formulario de Creación de Clientes</h2>
										
                                        <!-- Muestra el error de ingreso -->
                                        @include('common.errors')
                                        
										{!! Form::open(array('url'=>'clientes','class'=>'customform'))!!}
										<div class="line">
 										<div class="margin">
                                        
                                            
                                            	
												<div class="s-12 m-12 l-6">
													{!! Form::label('CI:', 'Cedula') !!}
                                            		{!! Form::text('CI', null, array('class'=>'form-group', )) !!}
													</div>
													
													<div class="s-12 m-12 l-6">
													{!! Form::label('nombres', 'Nombres') !!}
                                            		{!! Form::text('nombre', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('apellidos', 'Apellidos') !!}
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
													
                                            	 
                                             	
												 
                                           				 {!! Form::submit('Crear cliente', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
															</div>
															</div>

                                                
                                                {!! Form::close() !!}
                                            </div>

		</section>
		<!--/ End Contact -->

@endsection
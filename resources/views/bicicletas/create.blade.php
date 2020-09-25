@extends('layouts.layoutadmin')

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
                                @if(Session::has('bicicleta_creada'))
    <div class="alert alert-success" role="alert">
        <strong>{!! session('bicicleta_creada') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <spam aria-hidden="true">&times;</spam>
            </button>
    </div>
    @endif
									
											<h2>Formulario de Creación de Bicicletas</h2>
										
                                        <!-- Muestra el error de ingreso -->
                                        @include('common.errors')
                                        
										{!! Form::open(array('url'=>'bicicletas', 'files'=>'true','class'=>'customform'))!!}
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
                                             
                                           				 {!! Form::submit('Crear Bicicleta', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
															</div>
														</div>
                                                {!! Form::close() !!}
                                           
										
							
		
		<!--/ End Contact -->

@endsection
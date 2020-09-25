@extends('layouts.layoutadmin')

@section('contenido')
 
											<h2>Formulario de Edición Usuarios</h2>
										</div>
                                        <!-- Muestra el error de ingreso -->
                                        @include('common.errors')
                                        
										
										{!! Form::model($users , array('route' => array('agregarusuario.update', $users->id_users), 'method'=>'PATCH','class'=>'customform'))!!}
										<div class="line">
 										<div class="margin">
										 <div class="s-12 m-12 l-6">
													{!! Form::label('id_roles', 'Rol de Usuario:') !!}
                                            		{!! Form::select('id_roles', $roles, array('class'=>'nice-select'))!!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('CI:', 'Cedula') !!}
                                            		{!! Form::text('CI', null, array('class'=>'form-group', 'disabled' => 'true')) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('nombres', 'Nombres') !!}
                                            		{!! Form::text('nombres', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('apellidos', 'Apellidos') !!}
                                            		{!! Form::text('apellidos', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('direccion', 'Direccion') !!}
                                            		{!! Form::text('direccion', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('telefono', 'Telefono') !!}
                                            		{!! Form::text('telefono', null, array('class'=>'form-group', )) !!}
													</div>
													<div class="s-12 m-12 l-6">
													{!! Form::label('email', 'Email') !!}
                                            		{!! Form::text('email', null, array('class'=>'form-group', 'disabled' => 'true')) !!}
													</div>
                                             	
                                           				 {!! Form::submit('Actualizar Empleado', array('class'=>'submit-form button background-primary border-radius text-white')) !!}
                                                	</div>
                                                </div>
                                                {!! Form::close() !!}
                                         
@endsection
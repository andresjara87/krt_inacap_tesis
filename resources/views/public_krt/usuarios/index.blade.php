@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Registrate</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Ups!</strong>Hay algunos problemas con los campos<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Usuario:</strong>
                    {!! Form::text('nickname', null, array('placeholder' => 'Nombre de Usuario','class' => 'form-control')) !!}
                </div>
            </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {!! Form::text('first_name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        {!! Form::text('last_name', null, array('placeholder' => 'Apellidos','class' => 'form-control')) !!}
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pregunta 1:</strong>
                       <input type="text" name="pregunta1" value="">
                    </div>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                         <strong>Pregunta 2:</strong>
                          <input type="text" name="pregunta2" value="">
                          </div>
                        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="form-group">
                                 <strong>Pregunta 3:</strong>
                                  <input type="text" name="pregunta3" value="">
                                  </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
                                           <div class="form-group">
                                            <strong>Pregunta 4:</strong>
                                             <input type="text" name="pregunta4" value="">
                                             </div>
                        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                                               <strong>Pregunta 5:</strong>
                                               <input type="text" name="pregunta5" value="">
                                                      </div>
          </div>



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection
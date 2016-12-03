@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Crear nuevo local</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('locales.index') }}"> Atras</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'local.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cliente:</strong>
               {!! Form::select('user_id', $users, null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoría:</strong>
                {!! Form::select('tag_id', $tags, null, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                          <strong>Nombre Local:</strong>
                                     <!--   {!! Form::select('tag',$tags) !!} -->
                                      {!! Form::text('nombre_local', null, array('placeholder' => 'Nombre Local','class' => 'form-control')) !!}
                                      </div>
                          </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Logo:</strong>
                        {!! Form::file('logo', null, array('class' => 'form-control')) !!}

                    </div>
         </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                 <strong>Encabezado:</strong>
                                 {!! Form::file('encabezado', null, array('class' => 'form-control')) !!}

                             </div>
                  </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Telefono:</strong>
                    <!--   {!! Form::select('tag',$tags) !!} -->
                     {!! Form::text('telefono', null, array('placeholder' => 'Teléfono','class' => 'form-control')) !!}
                     </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Dirección:</strong>
                             <!--   {!! Form::select('tag',$tags) !!} -->
                              {!! Form::text('direccion', null, array('placeholder' => 'Dirección','class' => 'form-control')) !!}
                              </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Precio mínimo local:</strong>
                                               <!--   {!! Form::select('tag',$tags) !!} -->
                                                {!! Form::text('precio_minimo', null, array('placeholder' => 'Precio Mínimo','class' => 'form-control')) !!}
                                                </div>
                                    </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection
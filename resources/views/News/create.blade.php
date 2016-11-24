@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Crear nueva noticia</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('news.index') }}"> Atras</a>
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
	{!! Form::open(array('route' => 'news.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo de la Noticia:</strong>
                {!! Form::text('nameNews', null, array('placeholder' => 'Titulo de la noticia','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cuerpo de la Noticia:</strong>
                {!! Form::textarea('bodyNews', null, array('placeholder' => 'Cuerpo de la noticia','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        {!! Form::file('imgNews', null, array('class' => 'form-control')) !!}

                    </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Tag:</strong>
                    <!--   {!! Form::select('tag',$tags) !!} -->
                     {!! Form::select('tag_id', $tags, null, array('class' => 'form-control')) !!}
                     </div>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection
@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Editar Noticia</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
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
	{!! Form::model($news, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['news.update', $news->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('nameNews', null, array('placeholder' => 'Titulo Noticia','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('bodyNews', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
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
                        {!! Form::select('tag_id', $tags, null, array('class' => 'form-control')) !!}

                                   </div>
                       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection
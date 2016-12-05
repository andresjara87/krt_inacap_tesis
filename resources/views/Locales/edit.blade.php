@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Editar Local</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('locales.index') }}"> Back</a>
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
	{!! Form::model($local, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' => ['local.update', $local->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuario:</strong>
                     <select name="user_id" class="form-control">
                                    @foreach ($filtro as $key => $f)
                                                   @if($filtro[$key]['user_id']==$local->user_id)
                                                     <option selected value="{{ $filtro[$key]['user_id'] }}">{{$filtro[$key]['nickname']}}</option>
                                                  @else
                                                     <option value="{{ $filtro[$key]['user_id'] }}">{{$filtro[$key]['nickname']}}</option>
                                                  @endif
                                    @endforeach
                                   </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
              {!! Form::select('tag_id', $tags, null, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre Local:</strong>
                                {!! Form::text('nombre_local', null, array('placeholder' => 'Nombre Local','class' => 'form-control')) !!}

                            </div>
                 </div>

                   <div class="col-xs-12 col-sm-12 col-md-12">
                                               <div class="form-group">
                                                   <strong>Logo:</strong>
                                                   {!! Form::file('logo', null, array('class' => 'form-control')) !!}
                                                   <img src="{{$logo}}">

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
                                                   <strong>Teléfono:</strong>
                                                    {!! Form::text('telefono', null, array('placeholder' => 'Teléfono','class' => 'form-control')) !!}

                                                              </div>
                                                       </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                                                                       <div class="form-group">
                                                                        <strong>Dirección:</strong>
                                                                         {!! Form::text('direccion', null, array('placeholder' => 'Dirección','class' => 'form-control')) !!}

                                                                                   </div>
                                    </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                                                          <div class="form-group">
                                                                 <strong>Precio_minimo:</strong>
                                                                         {!! Form::text('precio_minimo', null, array('placeholder' => 'Dirección','class' => 'form-control')) !!}

                                                           </div>
                       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection
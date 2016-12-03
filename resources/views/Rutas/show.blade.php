@extends('...layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Mostrar Local</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('locales.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cliente:</strong>
                {{ $local->user->nickname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoría:</strong>
                {{ $local->tag->name_tag }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        {{ $local->telefono }}
                    </div>
                </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                     <strong>Dirección:</strong>
                    {{ $local->direccion }}
              </div>
          </div>

        </div>

@endsection
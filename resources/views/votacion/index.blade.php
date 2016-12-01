@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Consultar Votación</h2>
	        </div>
	    </div>
	</div>
	<a class="btn btn-info" href="{{ route('votacion.show',$user->id) }}">Show</a>
@endsection
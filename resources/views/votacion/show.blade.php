@extends('layouts.app')

@section('content')
	<div class="row">
               @foreach($voting as $key => $voto)
                   <p>This is user {{ $voto->id }}</p>
               @endforeach

	</div>
@endsection
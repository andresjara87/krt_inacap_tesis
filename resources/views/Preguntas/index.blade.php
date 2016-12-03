@extends('layouts.app')

@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Locales CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('item-create')
	            <a class="btn btn-success" href="{{ route('local.create') }}"> Create New Noticia</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Usuario</th>
			<th>Categoría</th>
			<th>Telefono</th>
            <th>Dirección</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($locales as $key => $local)
	<tr>

		<td>{{ ++$i }}</td>
		<td>{{ $local->user->nickname }}</td>
		<td>{{ $local->tag->name_tag }}</td>
		<td>{{ $local->telefono }}</td>
		<td>{{ $local->direccion }}</td>



		<td>
			<a class="btn btn-info" href="{{ route('local.show',$local->id) }}">Show</a>
			@permission('item-edit')
			<a class="btn btn-primary" href="{{ route('local.edit',$local->id) }}">Edit</a>
			@endpermission
			@permission('item-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['local.destroy', $local->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $locales->render() !!}
@endsection
@extends('layouts.app')

           @section('content')
           	<div class="row">
           	    <div class="col-lg-12 margin-tb">
           	        <div class="pull-left">
           	            <h2>Noticias CRUD</h2>
           	        </div>
           	        <div class="pull-right">
           	        	@permission('item-create')
           	            <a class="btn btn-success" href="{{ route('news.create') }}"> Create New Noticia</a>
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
           			<th>Title</th>
           			<th>Description</th>
           			<th width="280px">Action</th>
           		</tr>
           	@foreach ($tidings as $key => $news)
           	<tr>
           		<td>{{ ++$i }}</td>
           		<td>{{ $news->nameNews }}</td>
           		<td>{{ $news->tag->name_tag }}</td>

           		<td>
           			<a class="btn btn-info" href="{{ route('news.show',$news->id) }}">Show</a>
           			@permission('item-edit')
           			<a class="btn btn-primary" href="{{ route('news.edit',$news->id) }}">Edit</a>
           			@endpermission
           			@permission('item-delete')
           			{!! Form::open(['method' => 'DELETE','route' => ['news.destroy', $news->id],'style'=>'display:inline']) !!}
                       {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                   	{!! Form::close() !!}
                   	@endpermission
           		</td>
           	</tr>
           	@endforeach
           	</table>
           	{!! $tidings->render() !!}
           @endsection
@extends('layouts.layoutKrt')

@section('content')
<a class="ventanaAbrir" href="#">abrir ventana</a>
	<div class="ventana">
    			<div class="form-preguntas">
    			<div class="cerrar">Cerrar X</div>
            {!! Form::open(array('route' => 'voting.update','method'=>'POST')) !!}
    			<div class="titulo-preguntas">Para mejorar tu experiencia de usuario responde las siguentes preguntas</div>
    			<div class="lista-preguntas">
    				<label>Te gusta la comida peruana?</label>
    				<span class="star-rating star-5">
    				<input type="radio" name="comidaPeruana" value="{{$comidaPeruana=1}}"><i></i>
    				<input type="radio" name="comidaPeruana" value="{{$comidaPeruana=2}}"><i></i>
    				<input type="radio" name="comidaPeruana" value="{{$comidaPeruana=3}}"><i></i>
    				<input type="radio" name="comidaPeruana" value="{{$comidaPeruana=4}}"><i></i>
    				<input type="radio" name="comidaPeruana" value="{{$comidaPeruana=5}}"><i></i>


    				</span>
    			</div>
    			<div class="lista-preguntas">
    				<label>Te gusta salir a bailar con tus amigos(a)?</label>
    				<span class="star-rating star-5">
    				<input type="radio" name="bailar" value="{{$bailar=1}}"><i></i>
    				<input type="radio" name="bailar" value="{{$bailar=2}}"><i></i>
    				<input type="radio" name="bailar" value="{{$bailar=3}}"><i></i>
    				<input type="radio" name="bailar" value="{{$bailar=4}}"><i></i>
    				<input type="radio" name="bailar" value="{{$bailar=5}}"><i></i>

    				</span>
    			</div>
    		<div class="lista-preguntas">
    				<label>Tu crees que es buen panorama ir a pubs restobar?</label>
    				<span class="star-rating star-5">
    				<input type="radio" name="pubRestobar" value="{{$pubRestobar=1}}"><i></i>
    				<input type="radio" name="pubRestobar" value="{{$pubRestobar=2}}"><i></i>
    				<input type="radio" name="pubRestobar" value="{{$pubRestobar=3}}"><i></i>
    				<input type="radio" name="pubRestobar" value="{{$pubRestobar=4}}"><i></i>
    				<input type="radio" name="pubRestobar" value="{{$pubRestobar=5}}"><i></i>

    				</span>
    			</div>
    			<div class="lista-preguntas">
    				<label>Te gustaria enterarte de eventos de la ciudad?</label>
    				<span class="star-rating star-5">
    				<input type="radio" name="eventos" value="{{$eventos=1}}"><i></i>
    				<input type="radio" name="eventos" value="{{$eventos=2}}"><i></i>
    				<input type="radio" name="eventos" value="{{$eventos=3}}"><i></i>
    				<input type="radio" name="eventos" value="{{$eventos=4}}"><i></i>
    				<input type="radio" name="eventos" value="{{$eventos=5}}"><i></i>
    				</span>
    			</div>
    			<div class="lista-preguntas">
    				<label>Cuanto te gustan las pizzas?</label>
    				<span class="star-rating star-5">
    				<input type="radio" name="pizzeria" value="{{$pizzas=1}}"><i></i>
    				<input type="radio" name="pizzeria" value="{{$pizzas=2}}"><i></i>
    				<input type="radio" name="pizzeria" value="{{$pizzas=3}}"><i></i>
    				<input type="radio" name="pizzeria" value="{{$pizzas=4}}"><i></i>
    				<input type="radio" name="pizzeria" value="{{$pizzas=5}}"><i></i>
    				</span>
    			</div>
<input type="hidden" value="{{ $var }}" name="session" class="sessionNull"/>
<input type="hidden" value="{{ $user }}" name="user" class="sessionNull"/>
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        	<button type="submit" class="btn btn-primary">Aceptar</button>

{!! Form::close() !!}
    			</div>

    		</div>




@endsection

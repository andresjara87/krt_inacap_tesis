<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Krt</title>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<!--	<link rel="stylesheet" type="text/css" href="../../../public/css/style.css" />
    	<link rel="stylesheet" href="../../../public/css/jquery.mCustomScrollbar.css" />-->
    	{{ Html::style('css/style.css') }}

</head>
<body>
<header>
<section id="header-izquierda">
<!--	<img width="165" src="../../../public/images/logo.png">-->
	{{ Html::image('images/logo.png') }}
</section>
<section id="header-derecha">
<section id="login">
	@if (Auth::guest())
	<a href="{{ url('/login') }}">Login</a><a href="{{ url('/register') }}">Crear Cuenta</a>
	@else
	<a href="{{ url('/logout') }}">Logout</a>
	@endif
	</section>
		<nav>
			<li>
				<a href="#">Discoteques</a>
				<a href="#">Pubs</a>
				<a href="#">Restaurantes</a>
				<a href="#">Botillerias</a>
				<a href="#">Fastfood</a>
				<a href="#">Radiotaxis</a>
			</li>
		</nav>
		<div class="clear"></div>
</section>
<div class="clear"></div>
</header>
<section id="slideshow">
	{{ Html::image('images/slide/invitado.jpg') }}
</section>
<section id="contenedor">
<section id="principal">
	<section id="recomendacion">
	    <div class="tooltip"></div>
		<div id="menu-icono">
		<li>
		<a alt="Recomendación KRT" id="recomendacion-k" href="#"></a>
		<a alt="Recomendación Perfíl" id="colaborativo" href="#"></a>
		<a alt="Comida Internacional" id="todo" href="#"></a>
		<a alt="Top" id="top" href="#"></a>
		<a alt="Mensaje a un amigo" id="mensaje" href="#"></a>
		<a alt="Ruta" id="ruta" href="#"></a>
		</li>
		</div>
		<div id="busqueda">
			<input type="text" name="busqueda" /><input type="submit">
		</div>
		<div id="resultado-recomendacion">
	<!--	<div class="fotos"><img src="../../../public/images/locales/1.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/2.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/3.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/4.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/2.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/4.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/1.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/3.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/4.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/3.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/2.jpg"></div>
		<div class="fotos"><img src="../../../public/images/locales/1.jpg"></div>
		<div class="clear"></div>-->
		@yield('content')



		</div>
	</section>
<aside>
<div class="caja-comentario">
	<div class="autor">@andres</div>
	<div class="comentario">Excelente atencion en pizzeria kakaroto, la mejor pizza que he probado en mi vida</div>
</div>
<div class="caja-comentario">
	<div class="autor">@andres</div>
	<div class="comentario">Excelente atencion en pizzeria kakaroto, la mejor pizza que he probado en mi vida</div>
</div>
<div class="caja-comentario">
	<div class="autor">@andres</div>
	<div class="comentario">Excelente atencion en pizzeria kakaroto, la mejor pizza que he probado en mi vida</div>
</div>
<div class="caja-comentario">
	<div class="autor">@andres</div>
	<div class="comentario">Excelente atencion en pizzeria kakaroto, la mejor pizza que he probado en mi vida</div>
</div>
<div class="caja-comentario">
	<div class="autor">@andres</div>
	<div class="comentario">Excelente atencion en pizzeria kakaroto, la mejor pizza que he probado en mi vida</div>
</div>

</aside>
<div class="clear"></div>
</section>
<div id="anuncio">
{{ Html::image('images/publicidad/publicidad.jpg') }}
</div>
<section id="noticias">

	<article class="noticia1">
	   <div class="caja"><span>Participa por la gran oportunidad de asistir gratis a este increible show</span></div>
		{{ Html::image('images/noticias/1.jpg') }}
	</article>
	<article class="noticia2">
	  <div class="caja"><span>Famosa orquesta se presenta el 12 de enero</span></div>
	  {{ Html::image('images/noticias/2.jpg') }}

	</article>
	<div class="clear"></div>

</section>
</section>
<footer>
<section id="footer-color">

	<section id="footer-contenedor">
	<section id="contacto">
	<span>Contacto</span>
	<li>
		<a href="#">prueba</a>
	</li>


	</section><section id="servicios">
	<span>Servicios</span>
			<li>
		<a href="#">prueba</a>
	</li>
	</section><section id="zona-clientes">
	<span>Zona Clientes</span>
			<li>
		<a href="#">prueba</a>
	</li>
	</section><section id="logo-pie"></section>
	<div class="clear"></div>
</section>
</section>



<section id="footer-detalles">
	<span>www.krt.cl +569 66208304- contacto@krt.cl</span>
</section>
</footer>
<!--<script src="../../../public/js/script.js"></script>-->
{{ Html::script('js/script.js') }}
</body>
</html>
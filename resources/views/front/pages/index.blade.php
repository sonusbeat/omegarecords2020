@extends('templates/public/main')

@section('page-title', 'Estudio de Grabación Musical en Guadalajara')

@section('meta-description')
Somos un Estudio de Grabación en Guadalajara Jalisco Mexico. Ofrecemos Servicios de Producción, Mezcla, Masterización y Distribución Musical, ¡Visitenos Ahora!
@endsection

@section('meta-robots', 'index, follow')

@section('content')

@include('templates/public/_partials/carousel')
<div class="home-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<h2 class="hidden-title">Instalaciones de Estudio de Grabación</h2>
				<a href="{{ url('estudio') }}">
					<figure>
						<img src="imagenes/estudio-de-grabacion-omega-records-600-400.jpg"
							class="img1 img-responsive img-rounded"
							alt="Instalaciones de Estudio de Grabacion Omega Records"
						>
						<span class="img_txt">Instalaciones</span>
					</figure>
				</a>
				<p class="color3">
					Contamos con comodas instalaciones con <b>Tratamiento Acústico</b>
					adecuado para desarrollar un trabajo musical creativo
					y con un ambiente agradable
					<a href="{{ url('estudio') }}" class="more_arr_btn"><strong class="fa fa-chevron-circle-right fa-lg"></strong></a>
				</p>
			</div><!-- .col -->

			<div class="col-sm-6 col-md-4">
					<h2 class="hidden-title">Equipo de Grabación de Audio Profesional</h2>
					<a href="{{ url('equipo') }}">
						<figure>
							<img src="imagenes/equipo-de-audio-profesional-600-400.jpg"
								class="img1 img-responsive img-rounded"
								alt="Equipo de Audio de Omega Records"
							>
							<span class="img_txt">Equipo</span>
						</figure>
					</a>
					<p class="color3">
						Tenemos los mejores Equipos de Producción<br>
						de Audio Profesional para brindar una<br>
						<strong>Optima Calidad de Sonido</strong>
						<a href="{{ url('equipo') }}" class="more_arr_btn"><spam class="fa fa-chevron-circle-right fa-lg"></spam></a>
					</p>
			</div><!-- .col -->

			<div class="col-sm-6 col-md-4">
				<h2 class="hidden-title">Servicios de Grabación de Estudio Profesional</h2>
				<figure>
					<a href="{{ url('servicios') }}">
						<img src="imagenes/microfono-y-consola-de-audio-600-400.jpg"
							class="img1 img-responsive img-rounded"
							alt="Servicios de Omega Records"
						>
						<span class="img_txt">Servicios</span>
					</a>
				</figure>
				<p class="color3">
					Visite nuestra amplia gama de servicios generales relacionados con la <b>Industria Musical</b>
					<a href="{{ url('servicios') }}" class="more_arr_btn"><strong class="fa fa-chevron-circle-right fa-lg"></strong></a>
				</p>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .home-content -->
	<div class="box-1">
		<div class="container_24">
			<div class="grid_24">
				<div class="grid_8 alpha gray-text">
					<div class="about-us">
						<h2>¿ Quienes Somos ?</h2>

						<p>Somos una Productora, Sello Discografico y Estudio de Grabación en Guadalajara Jalisco México.</p>

						<p>Ofrecemos Servicios Integrales para la Grabación, Mezcla, Producción y Masterización para cualquier tipo de Proyecto Musical.</p>

						<p>Contamos con un Equipo de Trabajo Altamente Capacitado que te Ayudara a cubrir cada una de las necesidades de tu Proyecto</p>

					</div><!-- / .about-us -->
				</div>

				<div class="grid_8">
					<h2>Objetivos</h2>

					<div class="wrapper hline2">
						<div class="banner1">
							<div class="box">
								<h3 class="objetives">Preferencia</h3>
								<p class="color2">
									Ser tu Mejor Opción en Grabación de<br>
									Estudio de Audio Profesional.
								</p>
							</div>
						</div>
					</div>

					<div class="wrapper hline2">
						<div class="banner1">
							<div class="box">
								<h3 class="objetives">Servicio</h3>
								<p class="color2">
									Ofrecerte los Mejores Servicios para la
									Grabación, Producción, <br>
									Mezcla y Masterización Musical.
								</p>
							</div>
						</div>
					</div>

					<div class="wrapper hline2">
						<div class="banner1">
							<div class="box">
								<h3 class="objetives">Calidad</h3>
								<p class="color2">
									Mejorar Día con Día la Calidad <br>
									de Nuestros Servicios<br>
									para tus Proyectos Musicales.
								</p>
							</div>
						</div>
					</div>

				</div>

				<div class="grid_8 omega">
					<h2>Equipo de Trabajo</h2>

					<div class="banner2 marTop2">
						<img src="imagenes/colaboradores/ingeniero-sonido-luis-segura.jpg" alt="Colaborador Productor Musical" class="img2 no_resize">
						<div class="box">
							<h3><a href="#" class="link1">Luis Segura</a></h3>
							<p>Productor Musical</p>
						</div>
					</div>

					<div class="banner2">
						<img src="imagenes/colaboradores/daniel-gonzalez-desarrollador-web.jpg" alt="Colaborador Desarrollador Web" class="img2 no_resize">
						<div class="box">
							<h3><a href="#" class="link1">Daniel González</a></h3>
							<p>Web Master y<br>Distribución Digital</p>
						</div>
					</div>

					{{--
						<div class="banner2">
							<div style="
									margin-right: 20px;
									float: left;
									height: 90px;
									width: 90px;
									display: flex;
		    					justify-content: center;
							    align-items: center;
							">
								<i style="color: white;" class="fa fa-user fa-5x"></i>
							</div>
							<div class="box">
								<h3><a href="#" class="link1">Nombre</a></h3>
								<p>Posición</p>
							</div>
						</div>
					--}}

				</div>
			</div>
		</div>
	</div><!-- .box-1 -->
</div><!-- .div-content -->
@endsection


@section('additional-scripts')
<!--[if (gt IE 9)|!(IE)]><!-->
<script src="{{ asset('js/jquery.mobile.customized.min.js') }}"></script>
<!--<![endif]-->
<script src="{{ asset('js/camera.min.js') }}"></script>
@endsection

@section('custom-scripts')
<script>
	$(function() {
		$("#main-carousel").carousel({
			interval: 5000,
			   pause: 'hover',
			    wrap: true,
			keyboard: true
		});

		// Initialize the gallery
		$('.magnifier2').touchTouch();

		// Adds .current class to main menu
		$("nav a:contains('HOME')").parent().addClass('current');

		// Adds Tooltip
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

@if(env('GOOGLE_ANALYTICS'))
	@include('front/partials/google-analytics')
@endif
@endsection

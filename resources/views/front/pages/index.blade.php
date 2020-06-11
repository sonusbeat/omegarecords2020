@extends('templates/public/main')

@section('page-title', 'Estudio de Grabación Musical en Guadalajara')

@section('meta-description')
Somos un Estudio de Grabación en Guadalajara Jalisco Mexico. Ofrecemos Servicios de Producción, Mezcla, Masterización y Distribución Musical, ¡Visitenos Ahora!
@endsection

@section('meta-robots', 'index, follow')

@section('content')

@if(env('APP_ENV') == 'production')
    @include('templates/public/_partials/video')
@endif

@include('templates/public/_partials/carousel')

<div class="home-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-4">
				<h2 class="hidden-title">Instalaciones de Estudio de Grabación</h2>
                <div class="content-links">
                    <a href="{{ url('estudio') }}">
                        <figure>
                            <img src="imagenes/estudio-de-grabacion-omega-records-600-400.jpg"
                                 class="img1 img-responsive img-rounded"
                                 alt="Instalaciones de Estudio de Grabacion Omega Records"
                            >
                            <span class="img_txt">Instalaciones</span>
                        </figure>
                    </a>
                    <p class="color3 description">
                        Contamos con comodas instalaciones con <b>Tratamiento Acústico</b>
                        adecuado para desarrollar un trabajo musical creativo
                        y con un ambiente agradable
                    </p>
                </div><!-- /.content-links -->
			</div><!-- .col -->

			<div class="col-sm-12 col-md-4 col-lg-4">
				<h2 class="hidden-title">Servicios de Grabación de Estudio Profesional</h2>
                <div class="content-links">
                    <a href="{{ url('servicios') }}">
                        <figure>
                            <img src="{{ asset('imagenes/servicios-estudio-grabacion-600-400.jpg')}}"
                                class="img1 img-responsive img-rounded"
                                alt="Servicios de Omega Records"
                            >
                            <span class="img_txt">Servicios</span>
                        </figure>
                    </a>
                    <p class="color3 description">
                        Consulte nuestros servicios de grabación, mezcla, masterización y producción musical
                    </p>
                </div><!-- /.content-links -->
			</div><!-- .col -->

            <div class="col-sm-12 col-md-4 col-lg-4">
					<h2 class="hidden-title">Portafolio de grabación, producción, mezcla y masterización de nuestros trabajos realizados</h2>
                <div class="content-links">
                    <a href="{{ route('front.portfolio') }}">
                        <figure>
                            <img src="{{ asset('imagenes/portafolio-trabajos-realizados-600-400.jpg') }}"
                                 class="img1 img-responsive img-rounded"
                                 alt="Equipo de Audio de Omega Records"
                            >
                            <span class="img_txt">Portafolio</span>
                        </figure>
                    </a>
                    <p class="color3 description">
                        Revisa nuestros trabajos realizados de grabación, producción, mezcla y masterización de nuestros
                        clientes.
                    </p>
                </div><!-- /.content-links -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .home-content -->
	<div class="box-1">
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="about-us gray-text">
						<h2>¿ Quienes Somos ?</h2>

						<p>Somos una Productora, Sello Discografico y Estudio de Grabación en Guadalajara Jalisco México.</p>

						<p>Ofrecemos Servicios Integrales para la Grabación, Mezcla, Producción y Masterización para cualquier tipo de Proyecto Musical.</p>

						<p>Contamos con un Equipo de Trabajo Altamente Capacitado que te Ayudara a cubrir cada una de las necesidades de tu Proyecto</p>

					</div><!-- / .about-us -->
				</div><!-- /.col -->

				<div class="col-sm-12 col-lg-offset-1 col-lg-5 alpha gray-text">
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
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->
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

@if(env('APP_ENV') == 'production')
<script>
    setTimeout(function () {
        document.querySelector('#video').style.display='none';
        document.querySelector('#carousel').style.display='block';
    }, 42000);
</script>
@else
<script>
    document.querySelector('#carousel').style.display='block';
</script>
@endif

@if(env('GOOGLE_ANALYTICS'))
	@include('front/partials/google-analytics')
@endif
@endsection

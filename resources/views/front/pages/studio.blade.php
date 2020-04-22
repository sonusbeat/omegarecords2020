@extends('templates/public/main')

@section('page-title', 'Instalaciones de Estudio de Grabación')

@section('meta-description')
Contamos con instalaciones tratadas acústicamente para grabar Audio Profesional para tu Proyecto Musical para que de esta manera obtener el Mejor Sonido
@endsection

@section('meta-robots', 'index, follow')

@section('additional-styles')
<!-- Fancybox Styles -->
<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
@endsection

@section('content')
<!-- .div-content -->
<div class="div-content">
	<!-- .container -->
	<div class="container">
		<h2 class="v2 text-center">Galeria de Imágenes</h2><br>

		<!-- .row -->
		<div class="row">
			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Equipo Digital de Grabación" href="{{ asset('imagenes/instalaciones/imac-pro-tools-rack-plugins-digi-console-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/imac-pro-tools-rack-plugins-digi-console-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/imac-pro-tools-rack-plugins-digi-console-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/imac-pro-tools-rack-plugins-digi-console-small.jpg') }}" alt="Equipo Digital de Grabación">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Equipo Cuarto de Control" href="{{ asset('imagenes/instalaciones/cuarto-control-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/cuarto-control-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/cuarto-control-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/cuarto-control-small.jpg') }}" alt="Equipo Cuarto de Control">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Rack de Equipo de Audio" href="{{ asset('imagenes/instalaciones/rack-de-equipo-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/rack-de-equipo-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/rack-de-equipo-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/rack-de-equipo-small.jpg') }}" alt="Rack de Equipo de Audio">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Carrete de Cinta Akai" href="{{ asset('imagenes/instalaciones/carrete-cinta-magnetica-akai-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/carrete-cinta-magnetica-akai-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/carrete-cinta-magnetica-akai-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/carrete-cinta-magnetica-akai-small.jpg') }}" alt="Carrete de Cinta Akai">
					</picture>
				</a>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<br>

		<div class="row">
			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Grabaci&oacute;n cantante solista" href="{{ asset('imagenes/instalaciones/cantante-femenina-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/cantante-femenina-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/cantante-femenina-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/cantante-femenina-small.jpg') }}" alt="Grabaci&oacute;n cantante solista">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Grabación de Baterista de Fannelia" href="{{ asset('imagenes/instalaciones/grabacion-baterista-de-porter-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-baterista-de-porter-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-baterista-de-porter-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/grabacion-baterista-de-porter-small.jpg') }}" alt="Grabación de Baterista de Fannelia">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Grabación Guitarrista de Hamelin" href="{{ asset('imagenes/instalaciones/grabacion-guitarrista-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-guitarrista-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-guitarrista-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/grabacion-guitarrista-small.jpg') }}" alt="Grabación Guitarrista de Hamelin">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<div class="col-sm-6 col-md-3">
				<a href="{{ asset('imagenes/instalaciones/grabacion-cellista-y-violinista-large.jpg') }}" data-lightbox="instalaciones" data-title="Grabación de Cuerdas">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-cellista-y-violinista-medium.jpg') }}" media="(max-width: 960px)" />
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-cellista-y-violinista-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/grabacion-cellista-y-violinista-small.jpg') }}" alt="Grabación de Cuerdas" />
					</picture>

				</a>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<br>

		<!-- .row -->
		<div class="row">
			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Grabación Carlos Chav&eacute;z" href="{{ asset('imagenes/instalaciones/grabacion-tecladista-y-cantante-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-tecladista-y-cantante-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-tecladista-y-cantante-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/grabacion-tecladista-y-cantante-small.jpg') }}" alt="Grabación Carlos Chav&eacute;z">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Grabación Gus Valerio Tromb&oacute;n Sensemaya" href="{{ asset('imagenes/instalaciones/grabacion-saxofonista-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-saxofonista-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/grabacion-saxofonista-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/grabacion-saxofonista-small.jpg') }}" alt="Grabación Gus Valerio Tromb&oacute;n Sensemaya">
					</picture>
				</a>
			</div>
			<!-- /.col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Grabando a Paola Vergara" href="{{ asset('imagenes/instalaciones/grabando-a-paola-vergara-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/grabando-a-paola-vergara-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/grabando-a-paola-vergara-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/grabando-a-paola-vergara-small.jpg') }}" alt="Grabando a Paola Vergara">
					</picture>
				</a>
			</div>
			<!-- .col -->

			<!-- .col -->
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Microfono Blue" href="{{ asset('imagenes/instalaciones/microfono-blue-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/microfono-blue-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/microfono-blue-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/microfono-blue-small.jpg') }}" alt="Microfono Blue">
					</picture>
				</a>
			</div>
			<!-- /.col -->

		</div>
		<!-- /.row -->

		<!-- .row -->
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Cuarto de Grabación" href="{{ asset('imagenes/instalaciones/cuarto-grabacion-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/cuarto-grabacion-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/cuarto-grabacion-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/cuarto-grabacion-small.jpg') }}" alt="Cuarto de Grabación">
					</picture>
				</a>
			</div>

			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Micrónofo de Grabación de Estudio" href="{{ asset('imagenes/instalaciones/microfono-vertical-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/microfono-vertical-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/microfono-vertical-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/microfono-vertical-small.jpg') }}" alt="Micrónofo de Grabación de Estudio">
					</picture>
				</a>
			</div>

			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Set de Guitarras" href="{{ asset('imagenes/instalaciones/set-guitarras-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/set-guitarras-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/set-guitarras-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/set-guitarras-small.jpg') }}" alt="Set de Guitarras">
					</picture>
				</a>
			</div>

			<div class="col-sm-6 col-md-3">
				<a data-lightbox="instalaciones" data-title="Set de Microfonos" href="{{ asset('imagenes/instalaciones/set-microfonos-large.jpg') }}">
					<picture>
						<source srcset="{{ asset('imagenes/instalaciones/set-microfonos-medium.jpg') }}" media="(max-width: 960px)">
						<source srcset="{{ asset('imagenes/instalaciones/set-microfonos-small.jpg') }}" media="(min-width: 961px)">
						<img class="img-responsive img-thumbnail" src="{{ asset('imagenes/instalaciones/set-microfonos-small.jpg') }}" alt="Set de Microfonos">
					</picture>
				</a>
			</div>
		</div>
		<!-- /.row -->

		<br>

	</div>
	<!-- /.container -->

	<br>

</div>
<!-- /.div-content -->
@endsection

@section('additional-scripts')
<!-- Fancybox Scripts -->
<script src="{{ asset('js/lightbox.min.js') }}"></script>
<!-- Fancybox Scripts -->
<script src="{{ asset('js/picturefill.min.js') }}" async></script>
@endsection

@section('custom-scripts')
<script>
	$(function() {
		$("nav a:contains('ESTUDIO')").parent().addClass('current');

		// Picture element HTML5 shiv
    document.createElement( "picture" );
	});
</script>
@endsection

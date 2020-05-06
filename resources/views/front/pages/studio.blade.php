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

        @if($images->count())
            @foreach($images->chunk(4) as $row)
            <!-- .row -->
            <div class="row">
                @foreach($row as $image)
                <!-- .col -->
                <div class="col-sm-6 col-md-3">
                    <a data-lightbox="instalaciones" data-title="{{ $image->description }}" href="{{ asset("imagenes/studio_gallery/{$image->image}-large.jpg") }}">
                        <picture>
                            <source srcset="{{ asset("imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" media="(max-width: 960px)">
                            <source srcset="{{ asset("imagenes/studio_gallery/{$image->image}-medium.jpg") }}" media="(min-width: 961px)">
                            <img class="img-responsive img-thumbnail" src="{{ asset("imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" alt="{{ $image->image_alt }}">
                        </picture>
                    </a>
                </div>
                <!-- /.col -->
                @endforeach
            </div>
            <!-- /.row -->

            <br>
            @endforeach

            <div style="display:flex; justify-content:center;">
                {{ $images->render() }}
            </div>
        @else
            <div class="alert alert-warning text-center">
                <b>&iexcl; Aun no hay imagenes en esta secci&oacute;n !</b>
            </div>
        @endif
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

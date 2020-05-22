@extends('templates/public/main')

@section('page-title', 'Cursos de Omega Records')

@section('meta-description')
Contamos con cursos musicales profesionales como manejo de software musical, aprendizaje de instrumentos musicales, canto, produccion, teoria musical
@endsection

@section('meta-robots', 'index, follow')

@section('additional-styles')
<style>
    .description { margin: 20px 0; }
    .text-warning { color: #c83939; }
</style>
@endsection

@section('content')
<!-- .div-content -->
<div class="div-content">
	<!-- .container -->
	<div class="container">
		<h2 class="v2 text-center">Cursos Presenciales</h2><br>

        @if(isset($courses) && $courses->count())
            @foreach($courses as $course)
            <!-- .row -->
            <div class="row">
                <!-- .col -->
                <div class="col-sm-12 col-lg-4">
                    <a title="Ver {{ $course->title }}"
                       href="{{ route('front.course', $course->permalink) }}"
                    >
                        <img class="img-responsive img-thumbnail"
                             src="{{ asset("imagenes/courses/{$course->image}-thumbnail.jpg") }}"
                             alt="{{ $course->image_alt }}"
                        >
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-sm-12 col-lg-8">
                    <h3>
                        <a class="text-warning" href="{{ route('front.course', $course->permalink) }}">
                            {{ $course->title }}
                        </a>
                    </h3>
                    <div class="description">{{ $course->description }}</div>
                    <p><span><b>Instructor: </b>{{ $course->teacher->full_name() }}</span></p>
                    <p><span><b>Duraci&oacute;n: </b>{{ $course->duration }}</span></p>
                    <p><span><b>Fecha de Inicio: </b>{{ $course->start_date->formatLocalized('%e de %B, %Y') }}</span></p>
                </div>
            </div>
            <!-- /.row -->

            <br>
            @endforeach

            <div style="display:flex; justify-content:center;">
                {{ $courses->render() }}
            </div>
        @else
            <div class="alert alert-warning text-center">
                <b>&iexcl; A&uacute;n no hay cursos en esta secci&oacute;n !</b>
            </div>
        @endif
	</div>
	<!-- /.container -->

	<br>

</div>
<!-- /.div-content -->
@endsection

@section('custom-scripts')
<script>
	$(function() {
		$("nav a:contains('CURSOS')").parent().addClass('current');
	});
</script>
@endsection

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
    .alert ul { list-style: disc; margin: 10px 0 0 25px; }
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
                    <p><b>Instructor: </b>
                        <a href="{{ route('front.teacher', ['id' => $teacher->id, 'username' => $teacher->full_name()]) }}" title="Visitar perfil de {{ $teacher->full_name() }}">{{ $course->teacher->full_name() }}</a>
                    </p>
                    @if($course->duration)
                    <p><b>Duraci&oacute;n: </b>{{ $course->duration }}</p>
                    @endif
                    @if($course->start_date)
                    <p><b>Fecha de Inicio: </b>{{ $course->start_date->formatLocalized('%e de %B, %Y') }}</p>
                    @endif
                </div>
            </div>
            <!-- /.row -->

            <br>
            @endforeach

            <div style="display:flex; justify-content:center;">
                {{ $courses->render() }}
            </div>
        @else
            <div class="alert alert-warning">
                <p style="margin-top:0;">Contamos con cursos presenciales para el aprendizaje musical tales como: <b><i>Composición</i></b> y <b><i>Producción Musical</i></b>, ejecución de instrumentos musicales como: <b><i>Guitarra</i></b>, <b><i>Bajo</i></b>, <b><i>Batería</i></b>, <b><i>Teclados.</i></b> Así como también contamos con la docencia de software musical como: <b><i>Pro Tools</i></b>, <b><i>Logic</i></b>, <b><i>Ableton Live</i></b> entre otros.</p>
            </div><!-- /.alert -->
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

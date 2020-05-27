@extends('templates/public/main')

@section('page-title', $course->seo_title)
@section('meta-description', $course->seo_description)
@section('meta-robots', $course->seo_robots)

@section('additional-styles')
<style>
    h4 { color: #ff9800; font-size: 15px; font-weight: bold; }
    ul { margin: 20px 0 15px 20px; list-style: disc; }
    .title { color: #c83939; margin-top: 0; }
    .description { margin-bottom: 20px; }
    a.link:link, a.link:hover { color: #ff9800; }
    .mt-40 { margin-top: 40px; }
    .mt-20 { margin-top: 20px; }
    h4:first-child { margin-top: 0; }
    .font-weight-bold { font-weight: bold; }
</style>
@endsection

@section('content')
<!-- .div-content -->
<div class="div-content">
	<!-- .container -->
	<div class="container">
        <!-- .row -->
        <div class="row mt-40">
            <!-- .col -->
            <div class="col-sm-12 col-lg-6">
                <img class="img-responsive"
                    src="{{ asset("imagenes/courses/{$course->image}-medium.jpg") }}"
                    alt="{{ $course->image_alt }}"
                >
            </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col-sm-12 col-lg-6">
                <h2 class="title">{{ $course->title }}</h2><br>
                <div class="description">{{ $course->description }}</div>

                <table class="table">
                    @if($course->price)
                    <tr>
                        <th>Precio:</th>
                        <td class="text-success">$ {{ number_format($course->price) }}</td>
                    </tr>
                    @endif

                    @if($course->start_date)
                    <tr>
                        <th>Fecha de Inicio:</th>
                        <td>{{ $course->start_date->formatLocalized('%e %B, %Y') }}</td>
                    </tr>
                    @endif

                    @if($course->start_date)
                        <tr>
                            <th>Duraci&oacute;n:</th>
                            <td>{{ $course->duration }}</td>
                        </tr>
                    @endif
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>

        @if($course->video)
        <div>{!! $course->video !!}</div>
        @endif

        <div class="mt-20 row">
            <div class="col-sm-12 col-lg-2">
                <h2 class="title">Instructor:</h2>
                <p><a href="{{ route('front.teacher', ['id' => $course->teacher->id, 'username' => $course->teacher->username()]) }}">
                        <img class="img-responsive img-rounded"
                             src="{{ asset("imagenes/instructores/{$course->teacher->image}-thumbnail.jpg") }}"
                             alt="{{ $course->teacher->image_alt }}">
                        <p style="margin-top: 10px; font-size: 12px;"
                           class="text-info font-weight-bold">{{ $course->teacher->full_name() }}</p>
                    </a></p>
            </div><!-- /.col -->
            <div class="col-sm-12 col-lg-6">
                <h2 class="title">Vision General</h2>
                <div>{!! $course->overview !!}</div>
            </div><!-- /.col -->
            <div class="col-sm-12 col-lg-4">
                <h2 class="title">Aprenderás</h2>
                <div>{!! $course->topics !!}</div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <br>
	</div>
	<!-- /.container -->
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

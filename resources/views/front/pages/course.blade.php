@extends('templates/public/main')

@section('page-title', $course->seo_title)
@section('meta-description', $course->seo_description)
@section('meta-robots', $course->seo_robots)

@section('additional-styles')
<style>
    .title { color: #c83939; margin-top: 0; }
    .description { margin-bottom: 20px; }
    .mt-40 { margin-top: 40px; }
    .mt-20 { margin-top: 20px; }
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
                    <tr>
                        <th>Instructor:</th>
                        <td>{{ $course->teacher->full_name() }}</td>
                    </tr>

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

                    <tr>
                        <th>Duraci&oacute;n:</th>
                        <td>{{ $course->duration }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>
        <!-- .row -->
        <div class="row mt-20">
            <!-- .col -->
            <div class="col-sm-12 col-lg-{{ $course->video ? '6' : '12' }}">
                <h3>Vision General</h3>
                <div>{!! $course->overview !!}</div>
            </div>
            <!-- /.col -->
            @if($course->video)
            <!-- .col -->
            <div class="col-sm-12 col-lg-6">
                <div>{!! $course->video !!}</div>
            </div>
            <!-- /.col -->
            @endif
        </div>
        <!-- /.row -->

        <!-- .row -->
        <div class="row mt-20">
            <!-- .col -->
            <div class="col-sm-12 col-lg-6">
                <h3>Temas</h3>
                <div>{!! $course->topics !!}</div>
            </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col-sm-12 col-lg-6">
                <h3>Contenido</h3>
                <div>{!! $course->content !!}</div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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

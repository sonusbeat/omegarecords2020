@extends('templates/public/main')

@section('page-title', $course->title)

@section('meta-description')
{{ Str::limit($course->description, 160) }}
@endsection

@section('meta-robots', 'index, follow')

@section('additional-styles')
<style>
    .title { color: #c83939; margin-top: 0; }
    .description { margin-bottom: 20px; }
    .mt-40 { margin-top: 40px; }
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
                <div class="teacher">
                    <b>Instructor: </b>{{ $course->teacher->full_name() }}
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>
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

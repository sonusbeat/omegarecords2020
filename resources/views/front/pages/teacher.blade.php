@extends('templates/public/main')

@section('page-title', $teacher->seo_title)
@section('meta-description', $teacher->seo_description)
@section('meta-robots', $teacher->seo_robots)

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
            <div class="col-sm-12 col-lg-4">
                <img class="img-responsive"
                    src="{{ asset("imagenes/instructores/{$teacher->image}-medium.jpg") }}"
                    alt="{{ $teacher->image_alt }}"
                >
            </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col-sm-12 col-lg-8">
                <h2 class="title">{{ $teacher->full_name() }}</h2><br>

                <!-- Biography -->
                <section>{!! $teacher->biography !!}</section><br>

                <section>
                    <div class="text-right">
                        @if($teacher->facebook)
                            <a href="{{ $teacher->facebook }}" title="Visitar Facebook" target="_blank"><i class="text-primary fa fa-facebook-square fa-3x"></i></a>
                            &nbsp;
                        @endif

                        @if($teacher->twitter)
                            <a href="{{ $teacher->twitter }}" title="Visitar Twitter" target="_blank"><i class="text-info fa fa-twitter fa-3x"></i></a>&nbsp;
                        @endif

                        @if($teacher->instagram)
                            <a href="{{ $teacher->instagram }}" title="Visitar Instagram" target="_blank"><i class="text-warning fa fa-instagram fa-3x"></i></a>
                            &nbsp;
                        @endif

                        @if($teacher->youtube)
                            <a href="{{ $teacher->youtube }}" title="Visitar Youtube" target="_blank"><i class="text-danger fa fa-youtube fa-3x"></i></a>
                            &nbsp;
                        @endif
                    </div>
                </section>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <br>

        @if($teacher->courses->count())
        <section>
            <h3 class="mt-40">Cursos</h3><br>

            @foreach($teacher->courses->chunk(3) as $row)
                <div class="row mt-20">
                @foreach($row as $course)
                    <div class="col-sm-12 col-lg-4">
                        <a href="{{ route('front.course', $course->permalink) }}" title="Ver {{ $course->title }}">
                            <h4>{{ $course->title }}</h4><br>
                            <img src="{{ asset("imagenes/courses/{$course->image}-thumbnail.jpg") }}"
                                 alt="{{ $course->image_alt }}">
                        </a>
                    </div>
                @endforeach
                </div><!-- /.row -->
            @endforeach
        </section>
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
		$("nav a:contains('INSTRUCTORES')").parent().addClass('current');
	});
</script>
@endsection

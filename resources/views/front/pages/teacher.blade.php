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
            <div class="col-sm-12 col-lg-5">
                <img class="img-responsive"
                    src="{{ asset("imagenes/instructores/{$teacher->image}-medium.jpg") }}"
                    alt="{{ $teacher->image_alt }}"
                >
            </div>
            <!-- /.col -->

            <!-- .col -->
            <div class="col-sm-12 col-lg-7">
                <h2 class="title">{{ $teacher->full_name() }}</h2><br>

                <table class="table">
                    @if($teacher->facebook)
                    <tr>
                        <th>Facebook:</th>
                        <td>{{ $teacher->facebook }}</td>
                    </tr>
                    @endif

                    @if($teacher->twitter)
                    <tr>
                        <th>Twitter:</th>
                        <td>{{ $teacher->twitter }}</td>
                    </tr>
                    @endif

                    @if($teacher->instagram)
                    <tr>
                        <th>Instagram:</th>
                        <td>{{ $teacher->instagram }}</td>
                    </tr>
                    @endif

                    @if($teacher->youtube)
                    <tr>
                        <th>Youtube:</th>
                        <td>{{ $teacher->youtube }}</td>
                    </tr>
                    @endif
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>

        <section>
            <h3>Biograf&iacute;a:</h3>
            <td>{!! $teacher->biography !!}</td>
        </section>

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

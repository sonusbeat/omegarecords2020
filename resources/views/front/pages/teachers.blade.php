@extends('templates/public/main')

@section('page-title', 'Staff de Omega Records')

@section('meta-description')
Contamos con profesionales en la industria musical para la enseñanza musical como también para nuestros servicios de producción, mezcla, magnetización.
@endsection

@section('meta-robots', 'index, follow')

@section('additional-styles')
<style>
    .description { margin: 20px 0; }
    .text-warning { color: #c83939; }
    .alert ul { list-style: disc; margin: 10px 0 0 25px; }
    .font-weight-bold { font-weight: bold; }
</style>
@endsection

@section('content')
<!-- .div-content -->
<div class="div-content">
	<!-- .container -->
	<div class="container">
		<h2 class="v2 text-center">Nuestro Equipo de trabajo</h2><br>

        @if(isset($teachers) && $teachers->count())
            @foreach($teachers->chunk(3) as $row)
            <!-- .row -->
            <div class="row">
                @foreach($row as $teacher)
                <!-- .col -->
                <div class="col-sm-12 col-lg-4">
                    <a title="Ver Perfil"
                       href="{{ route('front.teacher', ['id' => $teacher->id, 'username' => $teacher->username()]) }}"
                    >
                        <img class="img-responsive img-thumbnail"
                             src="{{ asset("imagenes/instructores/{$teacher->image}-thumbnail.jpg") }}"
                             alt="{{ $teacher->image_alt }}"
                        >
                        <h3 class="text-center">{{ $teacher->full_name() }}</h3>
                    </a>
                </div>
                <!-- /.col -->
                @endforeach
            </div><!-- /.row -->
            @endforeach

            <br>

            <div style="display:flex; justify-content:center;">
                {{ $teachers->render() }}
            </div>
        @else
            <div class="alert alert-warning">
                <p style="margin-top:0;" class="font-weight-bold text-center">Contamos con profesionales en la industria musical para la enseñanza, producción, mezcla y magnetización musical.</p>
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
		$("nav a:contains('STAFF')").parent().addClass('current');
	});
</script>
@endsection

@extends('templates/public/main')

@section('page-title', $course->seo_title)
@section('meta-description', $course->seo_description)
@section('meta-robots', $course->seo_robots)

@section('additional-styles')
<style>
    h4 { color: #ff9800; font-size: 15px; font-weight: bold; }
    .title { color: #c83939; margin-top: 0; }
    .description { margin-bottom: 20px; }
    a.link:link, a.link:hover { color: #ff9800; }
    .mt-40 { margin-top: 40px; }
    .mt-20 { margin-top: 20px; }
    h4:first-child { margin-top: 0; }
    .font-weight-bold { font-weight: bold; }

    .alert-warning { background-color: #ffa24a; color: white; }

    .error {
        margin-top: 10px;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<!-- .div-content -->
<div class="div-content">
	<!-- .container -->
	<div class="container">
        @if(session('message'))
            <div class="alert alert-success text-center mt-40"><b>{{ session('message') }}</b></div>
        @endif
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
        <div class="video-responsive">{!! $course->video !!}</div>
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
                <div class="overview-content">{!! $course->overview !!}</div>
            </div><!-- /.col -->
            <div class="col-sm-12 col-lg-4">
                <h2 class="title">Aprenderás</h2>
                <div class="topics-content">{!! $course->topics !!}</div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <br>

        @if(!session('hide-form'))
            <h2 class="title mt-20 text-center">Inscribete al curso de {{ $course->title }}</h2>

            <div class="row mt-40">
                <div class="col-sm-12 col-lg-6 col-lg-offset-3">
                    <div class="alert alert-warning">Aparta tu lugar o solicita informes acerca de este curso, en breve recibirás un correo electrónico con el programa completo y m&aacute;s detalles.</div>
                    @if($errors->any())
                        <div id="message" class="alert alert-danger text-center">
                            <b>Hubo {{ $errors->count() > 1 ? $errors->count() . ' errores' : '1 error' }} en el formulario</b>
                        </div>
                    @endif
                    <form action="{{ route('admin.course_messages.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">

                            @error('name')
                                <p class="error text-danger"><i class="fas fa-asterisk fa-1x"></i> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="error text-danger"><i class="fas fa-asterisk fa-1x"></i> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group @error('whatsapp') has-error @enderror">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}">
                            <p class="small text-warning" style="margin-top:5px;">* Opcional</p>
                            @error('whatsapp')
                                <p class="error text-danger"><i class="fas fa-asterisk fa-1x"></i> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group @error('message') has-error @enderror">
                            <label for="message">Mensaje</label>
                            <textarea type="email" class="form-control" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="error text-danger"><i class="fas fa-asterisk fa-1x"></i> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-default">Enviar</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
         @endif

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

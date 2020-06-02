@extends('templates.admin.main')
@section('page-title', 'Detalles del curso')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="media">
            @if($course->image)
                <img src="{{ asset("imagenes/courses/{$course->image}-medium.jpg") }}" class="mr-4 mb-2" alt="No Image" width="40%">
            @else
                <img src="{{ asset("images/no_image.jpg") }}" class="mr-4 mb-2" alt="No Image" width="40%">
            @endif

            <div class="media-body">
                <h3 class="mt-0">{{ $course->title }}</h3>
                <table class="table table-hover">
                    <tr>
                        <th><b>T&iacute;tulo</b></th>
                        <td>{{ $course->title }}</td>
                    </tr>
                    <tr>
                        <th><b>Enlace Permanente</b></th>
                        <td>{{ $course->permalink }}</td>
                    </tr>
                    <tr>
                        <th><b>Instructor</b></th>
                        <td>
                            <a href="{{ route('admin.teachers.show', $course->teacher->id) }}" class="text-info">
                                <b>{{ $course->teacher->full_name() }}</b>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th><b>Nombre alternativo<br>de la imagen</b></th>
                        <td>{{ $course->image_alt }}</td>
                    </tr>
                    <tr>
                        <th><b>Descripci&oacute;n</b></th>
                        <td>{!! $course->description !!}</td>
                    </tr>
                    <tr>
                        <th><b>Activo</b></th>
                        <td>
                            @if($course->active)
                                <span class="text-success font-weight-bold">Si</span>
                            @else
                                <span class="text-danger font-weight-bold">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><b>Fecha de creaci&oacute;n</b></th>
                        <td>{{ $course->created_at->formatLocalized('%e de %B del ') . $course->created_at->format('Y, g:m:s a') }}</td>
                    </tr>
                    <tr>
                        <th><b>Fecha de modificaci&oacute;n</b></th>
                        <td>{{ $course->updated_at->formatLocalized('%e de %B del ') . $course->updated_at->format('Y, g:m:s a') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <hr>

        <section>
            <h3>Video</h3>

            <div class="mb-4">
                @if(empty($course->video))
                <p class="text-danger font-weight-bold">&iexcl; No hay Video !</p>
                @else
                    {{ $course->video }}
                @endif
            </div>
        </section>

        <hr>

        <section>
            <h3>Vision General</h3>

            <div class="mb-2">
                {!! $course->overview !!}
            </div>
        </section>

        <hr>

        <section>
            <h3>Que aprenderás</h3>

            <div class="mb-2">
                {!! $course->topics !!}
            </div>
        </section>

        <hr>

        <section>
            <h3>Contenido del curso</h3>

            <div class="mb-2">
                {!! $course->content !!}
            </div>
        </section>

        <hr>

        <div class="row">
            <div class="col-12 col-lg-4">
                <section>
                    <h3>Precio</h3>

                    <div class="mb-4">
                        <span class="text-success font-weight-bold">
                            $ {{ number_format($course->price, 2) }}
                        </span>
                    </div>
                </section>
            </div>

            <div class="col-12 col-lg-4">
                <section>
                    <h3>Fecha de Inicio</h3>

                    <div class="mb-4">
                        <span class="text-info font-weight-bold">
                            {{ ($course->start_date) ? $course->start_date->format('M d Y') : 'Sin Fecha' }}
                        </span>
                    </div>
                </section>
            </div>

            <div class="col-12 col-lg-4">
                <section>
                    <h3>Duraci&oacute;n</h3>

                    <div class="mb-4">
                        <span class="text-black-50 font-weight-bold">
                            {{ $course->duration }}
                        </span>
                    </div>
                </section>
            </div>
        </div>

        <hr>

        <h2 class="mb-4">Seo</h2>

        <div class="row">
            <div class="col-12 col-lg-5">
                <h3>T&iacute;tulo Seo</h3>
                <div>{{ $course->seo_title }}</div>

                <h3>Robots</h3>
                @switch($course->seo_robots)
                         @case('index, follow')
                            <p>Indexar y Seguir</p>
                            @break

                         @case('noindex, follow')
                            <p>No Indexar y Seguir</p>
                            @break

                        @case('index, nofollow')
                            <p>Indexar y No Seguir</p>
                            @break

                        @case('noindex, nofollow')
                            <p>No Indexar y No Seguir</p>
                            @break
                    @endswitch
            </div>

            <div class="col-12 col-lg-7">
                <h3>Descripci&oacute;n Seo</h3>
                <div>{{ $course->seo_description }}</div>
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary btn-lg" href="{{ URL::previous() }}">
                <span class="fas fa-chevron-left"></span>&nbsp;Volver
            </a>
            <a class="btn btn-warning btn-lg" href="{{ route('admin.courses.edit', $course->id) }}"><span class="fas fa-edit"></span></a>
        </div>
    </div>
</div>
@endsection

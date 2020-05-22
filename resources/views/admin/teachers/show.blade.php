@extends('templates.admin.main')
@section('page-title', 'Detalles del instructor')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="media">
            @if($teacher->image)
                <img src="{{ asset("imagenes/instructores/{$teacher->image}-medium.jpg") }}" class="mr-4" alt="{{ $teacher->full_name() }}" title="{{ $teacher->full_name() }}" width="40%">
            @else
                <img src="{{ asset("images/no_image.jpg") }}" class="mr-4" alt="No Image" width="40%">
            @endif

            <div class="media-body">
                <h3 class="mt-0">{{ $teacher->full_name() }}</h3>
                <table class="table table-hover">
                    <tr>
                        <th><b>Email</b></th>
                        <td>{{ $teacher->email }}</td>
                    </tr>
                    <tr>
                        <th><b>WhatsApp</b></th>
                        <td>{{ $teacher->whatsapp }}</td>
                    </tr>
                    <tr>
                        <th><b>Nombre alternativo<br>de la imagen</b></th>
                        <td>{{ $teacher->image_alt }}</td>
                    </tr>
                    <tr>
                        <th><b>Activo</b></th>
                        <td>
                            @if($teacher->active)
                                <span class="text-success font-weight-bold">Si</span>
                            @else
                                <span class="text-danger font-weight-bold">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><b>Fecha de creaci&oacute;n</b></th>
                        <td>{{ $teacher->created_at->format('M d Y, g:m:s a') }}</td>
                    </tr>
                    <tr>
                        <th><b>Fecha de modificaci&oacute;n</b></th>
                        <td>{{ $teacher->updated_at->format('M d Y, g:m:s a') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <hr>

        <h3 class="mt-2">Redes Sociales</h3>

        <div class="row">
            <div class="col-12 col-lg-6">
                <dl>
                    <dt>Facebook</dt>
                    <dd>{{ ($teacher->facebook) ? $teacher->facebook : 'No tiene' }}</dd>

                    <dt class="font-weight-bold">Twitter</dt>
                    <dd>{{ ($teacher->twitter) ? $teacher->twitter : 'No tiene' }}</dd>
                </dl>
            </div>
            <div class="col-12 col-lg-6">
                <dl>
                    <dt class="font-weight-bold">Instagram</dt>
                    <dd>{{ ($teacher->instagram) ? $teacher->instagram : 'No tiene' }}</dd>

                    <dt class="font-weight-bold">Youtube</dt>
                    <dd>{{ ($teacher->youtube) ? $teacher->youtube : 'No tiene' }}</dd>
                </dl>
            </div>
        </div>

        <div class="mt-4">
            <h3>Biograf&iacute;a</h3>

            <div class="mb-4">{!! $teacher->biography !!}</div>
        </div>

        <hr>

        <h2 class="mb-4">Seo</h2>

        <div class="row">
            <div class="col-12 col-lg-5">
                <h3>T&iacute;tulo Seo</h3>
                <div>{{ $teacher->seo_title }}</div>

                <h3>Robots</h3>
                @switch($teacher->seo_robots)
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
                <div>{{ $teacher->seo_description }}</div>
            </div>
        </div>

        <hr>

        <h3>Cursos</h3>

        @foreach($teacher->courses->chunk(3) as $row)
        <div class="row">
            @foreach($row as $course)
            <div class="col-12 col-lg-4">
                <h4 class="mt-3">{{ $course->title }}</h4>
                <a href="{{ route('admin.courses.show', $course->id) }}">
                    <img src="{{ asset('imagenes/courses/'.$course->image.'-thumbnail.jpg') }}"
                         title="{{ $course->image_alt }}"D
                         alt="{{ $course->image_alt }}"D
                         class="img-fluid"
                    >
                </a>
            </div>
            @endforeach
        </div>
        @endforeach

        <hr>

        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary btn-lg" href="{{ route('admin.teachers.index') }}">
                <span class="fas fa-chevron-left"></span>&nbsp;Volver
            </a>
            <a class="btn btn-warning btn-lg" href="{{ route('admin.teachers.edit', $teacher->id) }}"><span class="fas fa-edit"></span></a>
        </div>
    </div>
</div>
@endsection

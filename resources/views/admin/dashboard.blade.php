@extends('templates.admin.main')

@section('custom-styles')
<style>
    .message { color: inherit; }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <div class="card card-hover">
            <a href="{{ route('admin.dashboard') }}">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </a>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <a href="{{ route('admin.users.index') }}">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                    <h6 class="text-white">Usuarios</h6>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <a href="{{ route('admin.studio_gallery.index') }}">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="fas fa-images"></i></h1>
                    <h6 class="text-white">Imagenes</h6>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <a href="{{ route('admin.equipment.index') }}">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="fas fa-microphone"></i></h1>
                    <h6 class="text-white">Equipo</h6>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <a href="{{ route('admin.courses.index') }}">
            <div class="card card-hover">
                <div class="box bg-purple text-center">
                    <h1 class="font-light text-white"><i class="fas fa-book"></i></h1>
                    <h6 class="text-white">Cursos</h6>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <a href="{{ route('admin.teachers.index') }}">
            <div class="card card-hover">
                <div class="box bg-theme text-center">
                    <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                    <h6 class="text-white">Instructores</h6>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <a href="{{ route('admin.course_messages.index') }}">
            <div class="card card-hover">
                <div class="box bg-orange text-center">
                    <h1 class="font-light text-white"><i class="fas fa-comments"></i></h1>
                    <h6 class="text-white">Mensajes</h6>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <!-- Proximamente -->
    </div>
    <div class="col-12 col-md-6 col-lg-4 col-xlg-4">
        <!-- Proximamente -->
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6">
        <!-- Images -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Ultimas Imagenes</h2>
            </div>
            <div class="card-body comment-widgets scrollable">
                @foreach($images as $image)
                <!-- Comment Row -->
                <div class="row p-sm-4 mb-3">
                    <div class="col-12 col-lg-7">
                        <h3 class="font-medium">{{ $image->title }}</h3>
                        <img src="{{ asset("imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" alt="{{ $image->image_alt }}" class="img-fluid img-rounded mb-4">
                    </div>
                    <div class="col-12 col-lg-5 d-flex flex-column justify-content-center">
                        <span class="m-b-15 d-block">{!! Str::limit($image->description, 100) !!}</span>
                        <div class="comment-footer">
                            <div class="d-block d-md-none">
                                <a class="btn btn-info btn-lg" href="{{ route('admin.studio_gallery.show', $image->id) }}">
                                    <span class="fas fa-eye"></span>
                                </a>
                                <a class="btn btn-warning btn-lg float-right" href="{{ route('admin.studio_gallery.edit', $image->id) }}">
                                    <span class="fas fa-edit"></span>
                                </a>
                                <hr>
                            </div>

                            <div class="d-none d-md-block">
                                <a class="btn btn-info btn-md" href="{{ route('admin.studio_gallery.show', $image->id) }}">
                                    <span class="fas fa-eye"></span>
                                </a>
                                <a class="btn btn-warning btn-md" href="{{ route('admin.studio_gallery.edit', $image->id) }}">
                                    <span class="fas fa-edit"></span>
                                </a>
                            </div>

                            <p class="mt-3 d-none d-lg-block text-muted"><span><b>Fecha:</b></span>&nbsp;{{ $image->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <!-- Messages -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Últimos Mensajes</h2>
            </div><!-- /.card-body -->
            <div class="comment-widgets scrollable ps-container ps-theme-default">
                @if(isset($messages) && $messages->count())
                    @foreach($messages as $message)
                        <!-- Comment Row -->
                        <div class="comment-row m-t-0">
                            <div class="comment-text w-100">
                                <a class="message" href="{{ route('admin.course_messages.show', $message->id) }}">
                                    <h3 class="font-medium">{{ $message->name }}</h3>
                                    <span class="m-b-15 d-block">{{ $message->message }}</span>
                                    <p class="text-muted">{{ $message->created_at->formatLocalized('%e de %B del %Y') }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center font-weight-bold mx-4">
                        &iexcl; A&uacute;n no hay mensajes !
                    </div>
                @endif
            </div><!-- /.comment-widgets -->
        </div><!-- /.card -->

        <!-- Equipment -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Ultimo Equipo</h2>
                <ul>
                @foreach($equipment as $item)
                    <li>
                        <a class="text-info font-weight-bold" href="{{ route('admin.equipment.edit', $item->id) }}">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <!-- Studio -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Ultimos Cursos</h2>
            </div>
            <div class="card-body comment-widgets scrollable">
            @foreach($courses as $course)
                <!-- Comment Row -->
                    <div class="row p-sm-4 mb-3">
                        <div class="col-12 col-lg-7">
                            <h3 class="font-medium">{{ $course->title }}</h3>
                            <img src="{{ asset("imagenes/courses/{$course->image}-thumbnail.jpg") }}"
                                 alt="{{ $course->image_alt }}" class="img-fluid img-rounded mb-4">
                        </div>
                        <div class="col-12 col-lg-5 d-flex flex-column justify-content-center">
                            <span class="m-b-15 d-block">{!! Str::limit($course->description, 100) !!}</span>
                            <div class="comment-footer">
                                <div class="d-block d-md-none">
                                    <a class="btn btn-info btn-lg"
                                       href="{{ route('admin.courses.show', $course->id) }}">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                    <a class="btn btn-warning btn-lg float-right"
                                       href="{{ route('admin.courses.edit', $course->id) }}">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <hr>
                                </div>

                                <div class="d-none d-md-block">
                                    <a class="btn btn-info btn-md"
                                       href="{{ route('admin.courses.show', $course->id) }}">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                    <a class="btn btn-warning btn-md"
                                       href="{{ route('admin.courses.edit', $course->id) }}">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                </div>

                                <p class="mt-3 d-none d-lg-block text-muted">
                                    <span><b>Fecha:</b></span>&nbsp;{{ $course->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Users -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Ultimos Usuarios</h2>
            </div>
            <div class="comment-widgets scrollable">
                @foreach($users as $user)
                <!-- Comment Row -->
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{ asset("imagenes/usuarios/{$user->image}-thumbnail.jpg") }}" alt="{{ $user->image_alt }}" width="250" class="img-thumbnail">
                    </div>
                    <div class="comment-text w-100 d-flex flex-column justify-content-center">
                        <h6 class="font-medium">{{ $user->full_name() }}</h6>
                        <span class="m-b-15 d-block">{!! Str::limit($user->description, 100) !!}</span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">{{ $user->created_at->format('d/m/Y') }}</span>

                            <a class="btn btn-info btn-sm" href="{{ route('admin.users.show', $user->id) }}">
                                <span class="fas fa-eye"></span>
                            </a>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user->id) }}">
                                <span class="fas fa-edit"></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

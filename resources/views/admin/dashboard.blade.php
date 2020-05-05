@extends('templates.admin.main')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
            <a href="{{ route('admin.dashboard') }}">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Dashboard</h6>
                </div>
            </a>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <a href="{{ route('admin.users.index') }}">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                    <h6 class="text-white">Usuarios</h6>
                </div>
            </div>
        </a>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
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
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ultimas Imagenes</h4>
            </div>
            <div class="comment-widgets scrollable">
                @foreach($images as $image)
                <!-- Comment Row -->
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{ asset("imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" alt="{{ $image->image_alt }}" width="250" class="img-thumbnail">
                    </div>
                    <div class="comment-text w-100 d-flex flex-column justify-content-center">
                        <h6 class="font-medium">{{ $image->title }}</h6>
                        <span class="m-b-15 d-block">{!! Str::limit($image->description, 100) !!}</span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">{{ $image->created_at->format('d/m/Y') }}</span>

                            <a class="btn btn-info btn-sm" href="{{ route('admin.studio_gallery.show', $image->id) }}">
                                <span class="fas fa-eye"></span>
                            </a>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.studio_gallery.edit', $image->id) }}">
                                <span class="fas fa-edit"></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ultimos Usuarios</h4>
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

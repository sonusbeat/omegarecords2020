@extends('templates.admin.main')
@section('page-title', 'Crear Imagen')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Imagen</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.studio_gallery.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin.studio-gallery._form')
        </form>
    </div>
</div>
@endsection

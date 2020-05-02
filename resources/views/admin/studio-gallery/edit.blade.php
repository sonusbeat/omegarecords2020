@extends('templates.admin.main')
@section('page-title', 'Editar Imagen')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Imagen</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.studio_gallery.update', $image->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin.studio-gallery._form')
        </form>
    </div>
</div>
@endsection

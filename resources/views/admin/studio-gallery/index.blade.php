@extends('templates.admin.main')
@section('page-title', 'Gestionar Imagenes')

@section('content')
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>&iexcl;&nbsp;{{ session('message') }}&nbsp;!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Gestionar Imagenes</h3>
            <a href="{{ route('admin.studio_gallery.create') }}" class="btn btn-primary"><span class="fas fa-file"></span></a>
        </div>
    </div>
    <div class="card-body">
        @if(isset($images) && $images->count())
        <table class="table">
            <thead>
            <tr>
                <th>Imagen</th>
                <th>T&iacute;tulo</th>
                <th>Slug</th>
                <th class="text-center">Activa</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $image)
                <tr>
                    <td>
                        <img src="{{ asset("/imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" alt="{{ $image->image_alt }}" width="150">
                    </td>
                    <td class="align-middle">{{ $image->title }}</td>
                    <td class="align-middle">{{ $image->slug }}</td>
                    <td class="text-center align-middle">
                        {!! activate_resource('studio_gallery', $image->id, $image->active) !!}
                    </td>
                    <td class="text-center align-middle">
                        <a class="btn btn-info" href="{{ route('admin.studio_gallery.show', $image->id) }}"><span
                                class="fas fa-info"></span></a>
                        <a class="btn btn-warning" href="{{ route('admin.studio_gallery.edit', $image->id) }}"><span
                                class="fas fa-edit"></span></a>
                        <form id="delete" action="{{ route('admin.studio_gallery.destroy', $image->id) }}" method="POST"
                              style="display:inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-warning text-center font-weight-bold">
                Aun no hay imagenes
            </div>
            <div class="block">
                <a class="btn btn-primary btn-md btn-block font-weight-bold" href="{{ route('admin.studio_gallery.create') }}">Crear Imagen</a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('custom-scripts')
<script>
    $(document).on("submit", "#delete", function() {
        return confirm("¿ Desea eliminar la imagen ?");
    });
</script>
@endsection

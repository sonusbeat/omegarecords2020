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
            <a href="{{ route('admin.studio_gallery.create') }}" class="btn btn-primary">A&ntilde;adir Imagen</a>
        </div>
    </div>
    <div class="card-body">
        @if(isset($images) && $images->count())
            <table class="table d-none d-lg-block">
            <thead>
            <tr>
                <th class="text-center">Posici&oacute;n</th>
                <th class="text-center">Imagen</th>
                <th class="text-center">T&iacute;tulo</th>
                <th class="text-center">Slug</th>
                <th class="text-center">Activado</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $image)
                <tr>
                    <td class="text-center align-middle">{{ $image->position }}</td>
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
                                class="fas fa-eye"></span></a>
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
            @foreach($images as $image)
            <div class="d-block mb-3 d-lg-none">
                <img class="img-fluid rounded mb-4" src="{{ asset("/imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" alt="{{ $image->image_alt }}">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.studio_gallery.show', $image->id) }}" class="btn btn-lg btn-info"><span class="fas fa-eye"></span></a>
                    <a href="{{ route('admin.studio_gallery.edit', $image->id) }}" class="btn btn-lg btn-warning"><span class="fas fa-edit"></span></a>
                    <form id="delete" action="{{ route('admin.studio_gallery.destroy', $image->id) }}" method="POST" class="display-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-lg"><span class="fas fa-trash"></span></button>
                    </form>
                </div>
            </div>
        @endforeach
        @else
            <div class="alert alert-warning text-center font-weight-bold">
                Aun no hay imagenes
            </div>
            <div class="block">
                <a class="btn btn-primary btn-md btn-block font-weight-bold" href="{{ route('admin.studio_gallery.create') }}">Crear Imagen</a>
            </div>
        @endif

        <div class="d-flex justify-content-center">
            {{ $images->render() }}
        </div>
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

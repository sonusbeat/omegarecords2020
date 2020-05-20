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
            <a href="{{ route('admin.studio_gallery.create') }}" class="btn btn-primary btn-lg">A&ntilde;adir Imagen</a>
        </div>
    </div>
    <div class="card-body">
        @if(isset($images) && $images->count())

            @foreach($images->chunk(3) as $row)
            <div class="row mb-3">
                @foreach($row as $image)
                <div class="col-12 col-md-6 col-lg-4 border border-black bg-light p-4">
                    <h4>{{ Str::limit($image->title, 26) }}</h4>

                    <a href="{{ route('admin.studio_gallery.show', $image->id) }}" title="Ver Detalles">
                        <img class="img-fluid rounded mb-4" src="{{ asset("/imagenes/studio_gallery/{$image->image}-thumbnail.jpg") }}" alt="{{ $image->image_alt }}">
                    </a>

                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('admin.studio_gallery.show', $image->id) }}" class="btn btn-lg btn-info"><span class="fas fa-info"></span></a>

                        {!! activate_resource('studio_gallery', $image->id, $image->active, 'lg') !!}

                        <a href="{{ route('admin.studio_gallery.edit', $image->id) }}" class="btn btn-lg btn-warning"><span class="fas fa-edit"></span></a>

                        {!! delete_resource('studio_gallery', $image->id, $image->active, 'lg') !!}
                    </div>

                    <p class="text-right"><b>Posici&oacute;n:</b>&nbsp;{{ $image->position }}</p>
                </div>
                @endforeach
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

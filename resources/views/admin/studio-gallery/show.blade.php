@extends('templates.admin.main')
@section('page-title', 'Detalles de la imagen')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="media">
            @if($image->image)
                <img src="{{ asset("imagenes/studio_gallery/{$image->image}-medium.jpg") }}" class="mr-4" alt="No Image" width="40%">
            @else
                <img src="{{ asset("images/no_image.jpg") }}" class="mr-4" alt="No Image" width="40%">
            @endif

            <div class="media-body">
                <h3 class="mt-0">{{ $image->title }}</h3>
                <table class="table table-striped">
                    <tr>
                        <th><b>T&iacute;tulo</b></th>
                        <td>{{ $image->title }}</td>
                    </tr>
                    <tr>
                        <th><b>Slug</b></th>
                        <td>{{ $image->slug }}</td>
                    </tr>
                    <tr>
                        <th><b>Nombre alternativo<br>de la imagen</b></th>
                        <td>{{ $image->image_alt }}</td>
                    </tr>
                    <tr>
                        <th><b>Descripci&oacute;n</br></th>
                        <td>{!! $image->description !!}</td>
                    </tr>
                    <tr>
                        <th><b>Activo</b></th>
                        <td>
                            @if($image->active)
                                <span class="text-success fas fa-check"></span>
                            @else
                                <span class="text-danger fas fa-times"></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><b>Fecha de creaci&oacute;n</b></th>
                        <td>{{ $image->created_at }}</td>
                    </tr>
                    <tr>
                        <th><b>Fecha de modificaci&oacute;n</b></th>
                        <td>{{ $image->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary btn-lg" href="{{ route('admin.studio_gallery.index') }}">
                <span class="fas fa-chevron-left"></span>&nbsp;Volver
            </a>
            <a class="btn btn-warning btn-lg" href="{{ route('admin.studio_gallery.edit', $image->id) }}"><span class="fas fa-edit"></span></a>
        </div>
    </div>
</div>
@endsection

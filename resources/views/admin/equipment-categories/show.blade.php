@extends('templates.admin.main')
@section('page-title', 'Detalles de la categoria')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="mt-0">{{ $category->name }}</h3>
        <div class="d-none d-lg-block">
            <table class="table table-striped">
            <tr>
                <p><b>Nombre</b></p>
                <p>{{ $category->name }}</p>
            </tr>
            <tr>
                <p><b>Activo</b></p>
                <p>
                    @if($category->active)
                        <span class="text-success fas fa-check"></span>
                    @else
                        <span class="text-danger fas fa-times"></span>
                    @endif
                </p>
            </tr>
            <tr>
                <p><b>Fecha de creaci&oacute;n</b></p>
                <p>{{ $category->created_at }}</p>
            </tr>
            <tr>
                <p><b>Fecha de modificaci&oacute;n</b></p>
                <p>{{ $category->updated_at }}</p>
            </tr>
        </table>
        </div>
        <div class="d-block d-lg-none">
            <p><b>Nombre</b></p>
            <p>{{ $category->name }}</p>

            <p><b>Activada</b></p>
            <p>{{ $category->active ? 'Si' : 'No' }}</p>

            <p><b>Fecha de creaci&oacute;n</b></p>
            <p>{{ $category->created_at }}</p>

            <p><b>Fecha de actualizaci&oacute;n</b></p>
            <p>{{ $category->updated_at }}</p>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary" href="{{ route('admin.equipment_categories.index') }}"><span class="fas fa-chevron-left"></span>&nbsp;Volver</a>
            <a class="btn btn-warning" href="{{ route('admin.equipment_categories.edit', $category->id) }}"><span class="fas fa-edit"></span></a>
        </div>
    </div>
</div>
@endsection

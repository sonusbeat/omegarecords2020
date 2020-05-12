@extends('templates.admin.main')
@section('page-title', 'Gestionar Categorias de Equipo')

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
    @if(isset($categories) && $categories->count())
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <h3 class="text-center text-lg-left mb-3">Gestionar Categorias de Equipo</h3>
            </div>
            <div class="col-sm-12 offset-lg-3 col-lg-3">
                <a href="{{ route('admin.equipment_categories.create') }}" class="btn btn-primary btn-block">Crear</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-none d-lg-block">
            <table class="table">
                <thead>
                <tr>
                    <th>Posici&oacute;n</th>
                    <th>Nombre</th>
                    <th class="text-center">Activo</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="align-middle">{{ $category->position }}</td>
                        <td class="align-middle">{{ $category->name }}</td>

                        <td class="align-middle text-center">
                            {!! activate_resource('equipment_categories', $category->id, $category->active, 'lg') !!}
                        </td>

                        <td class="text-center align-middle">
                            <a class="btn btn-lg btn-info"
                               href="{{ route('admin.equipment_categories.show', $category->id) }}"><span
                                    class="fas fa-info"></span></a>
                            <a class="btn btn-lg btn-warning"
                               href="{{ route('admin.equipment_categories.edit', $category->id) }}"><span
                                    class="fas fa-edit"></span></a>

                            {!! delete_resource('equipment_categories', $category->id, $category->active, 'lg') !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-block d-lg-none">
            @foreach($categories as $category)
            <table class="table table-dark">
                <tr>
                    <th class="font-weight-bold text-center py-2">Posici&oacute;n</th>
                    <td class="text-center bg-cyan text-white font-weight-bold py-2">{{ $category->position }}</td>
                </tr>
                <tr>
                    <th class="font-weight-bold text-center py-2 align-middle">Nombre</th>
                    <td class="text-center bg-cyan text-white font-weight-bold py-2">{{ $category->name }}</td>
                </tr>
                <tr>
                    <th class="font-weight-bold text-center py-2 align-middle">Activa</th>
                    <td class="text-center bg-{{ $category->active ? 'success' : 'danger' }} text-white font-weight-bold py-2">
                        {!! activate_resource('equipment_categories', $category->id, $category->active, 'lg') !!}
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="bg-white">
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-lg btn-info" href="{{ route('admin.equipment_categories.show', $category->id) }}"><span class="fas fa-info"></span></a>

                            <a class="btn btn-lg btn-warning" href="{{ route('admin.equipment_categories.edit', $category->id) }}"><span class="fas fa-edit"></span></a>

                            {!! delete_resource('equipment_categories', $category->id, $category->active, 'lg') !!}
                        </div>
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>
    @else
        <div class="card-body">
            <div class="alert alert-warning text-center font-weight-bold">
                &iexcl; Aun no hay categorias !
            </div>
            <a href="{{ route('admin.equipment_categories.create') }}" class="btn btn-primary btn-block">Crear</a>
        </div>
    @endif
</div>
@endsection

@section('custom-scripts')
<script>
    $(document).on("submit", "#delete", function() {
        return confirm("¿ Desea eliminar la categoría ?");
    });
</script>
@endsection

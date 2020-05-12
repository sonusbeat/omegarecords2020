@extends('templates.admin.main')
@section('page-title', 'Crear Categor&iacute;a de Equipo')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Crear Categor&iacute;a de Equipo</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.equipment_categories.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin.equipment-categories._form')
        </form>
    </div>
</div>
@endsection

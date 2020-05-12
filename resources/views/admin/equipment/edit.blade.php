@extends('templates.admin.main')
@section('page-title', 'Editar Equipo')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Editar Equipo</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.equipment.update', $equipment->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin.equipment._form')

        </form>
    </div>
</div>
@endsection

@extends('templates.admin.main')
@section('page-title', 'Añadir Equipo')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Añadir Equipo</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.equipment.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin.equipment._form')
        </form>
    </div>
</div>
@endsection

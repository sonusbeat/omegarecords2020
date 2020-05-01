@extends('templates.admin.main')
@section('page-title', 'Crear Usuario')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Usuario</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin.users._form')
        </form>
    </div>
</div>
@endsection

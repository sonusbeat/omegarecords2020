@extends('templates.admin.main')
@section('page-title', 'Editar Usuario')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Usuario</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin.users._form')

        </form>
    </div>
</div>
@endsection

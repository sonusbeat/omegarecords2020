@extends('templates.admin.main')
@section('page-title', 'Gestionar Usuarios')

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
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Gestionar Usuarios</h5>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><span class="fas fa-file"></span></a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo</th>
            <th class="text-center">Activo</th>
            <th class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->full_name() }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type == 'admin' ? 'Administrador' : 'Registrado' }}</td>
            <td class="text-center">
                @if($user->active)
                    <span class="text-success fas fa-check"></span>
                @else
                    <span class="text-danger fas fa-times"></span>
                @endif
            </td>
            <td class="text-center">
                <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}"><span class="fas fa-info"></span></a>
                <a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}"><span class="fas fa-edit"></span></a>
                <form id="delete" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger"><span class="fas fa-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('custom-scripts')
<script>
    $(document).on("submit", "#delete", function() {
        return confirm("¿ Desea eliminar el usuario ?");
    });
</script>
@endsection

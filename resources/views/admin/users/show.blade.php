@extends('templates.admin.main')
@section('page-title', 'Perfil de Usuario')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="media">
            @if($user->image)
                <img src="{{ asset("imagenes/usuarios/{$user->image}-medium.jpg") }}" class="mr-4" alt="User" width="40%">
            @else
                <img src="{{ asset("admin/assets/images/users/1.jpg") }}" class="mr-4" alt="User" width="40%">
            @endif

            <div class="media-body">
                <h3 class="mt-0">{{ $user->name }}</h3>
                <table class="table table-striped">
                    <tr>
                        <th><b>Email</b></th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th><b>Tipo</b></th>
                        <td>{{ $user->type == 'admin' ? 'Administrador' : 'Registrado' }}</td>
                    </tr>
                    <tr>
                        <th><b>Activo</b></th>
                        <td>
                            @if($user->active)
                                <span class="text-success fas fa-check"></span>
                            @else
                                <span class="text-danger fas fa-times"></span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><b>Fecha de creaci&oacute;n</b></th>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <th><b>Fecha de modificaci&oacute;n</b></th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary" href="{{ route('admin.users.index') }}"><span class="fas fa-chevron-left"></span></a>
            <a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}"><span class="fas fa-edit"></span></a>
        </div>
    </div>
</div>
@endsection

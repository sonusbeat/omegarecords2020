@extends('templates.admin.main')
@section('page-title', 'Gestionar mensajes de cursos')

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
    @if(isset($messages) && $messages->count())
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <h3 class="text-center text-lg-left mb-3">Gestionar mensajes de cursos</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-none d-lg-block">
            <table class="table">
                <thead>
                <tr>
                    <th>Curso</th>
                    <th>Prospecto</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->course->title }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>

                        <td class="text-center align-middle">
                            <a class="btn btn-info btn-lg" href="{{ route('admin.course_messages.show', $message->id) }}">
                                <i class="fas fa-info"></i>
                            </a>
                            {!! delete_resource('course_messages', $message->id, 0, 'lg') !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $messages->render() }}
        </div>
    </div>
    @else
        <div class="card-body">
            <div class="alert alert-warning text-center font-weight-bold">
                &iexcl; Aun no hay Mensajes !
            </div>
        </div>
    @endif
</div>
@endsection

@section('custom-scripts')
<script>
    $(document).on("submit", "#delete", function() {
        return confirm("¿ Desea eliminar el mensaje ?");
    });
</script>
@endsection

@extends('templates.admin.main')
@section('page-title', 'Gestionar Instructores')

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
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Gestionar Instructores</h3>
            @if(isset($teachers) && $teachers->count())
                <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary btn-lg">Crear Instructor</a>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if(isset($teachers) && $teachers->count())

            @foreach($teachers->chunk(3) as $row)
            <div class="row mb-3">
                @foreach($row as $teacher)
                <div class="col-12 col-md-6 col-lg-4 border border-black bg-light p-4">
                    <h4>{{ $teacher->full_name() }}</h4>

                    <a href="{{ route('admin.teachers.show', $teacher->id) }}" title="Ver Detalles">
                        <img class="img-fluid rounded mb-4" src="{{ asset("/imagenes/instructores/{$teacher->image}-thumbnail.jpg") }}" height="360" alt="{{ $teacher->image_alt }}">
                    </a>

                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="btn btn-lg btn-info"><span class="fas fa-info"></span></a>

                        {!! activate_resource('teachers', $teacher->id, $teacher->active, 'lg') !!}

                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-lg btn-warning"><span class="fas fa-edit"></span></a>

                        {!! delete_resource('teachers', $teacher->id, $teacher->active, 'lg') !!}
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center font-weight-bold">
                A&uacute;n no hay instructores
            </div>
            <div class="block">
                <a class="btn btn-info btn-md btn-block font-weight-bold" href="{{ route('admin.teachers.create') }}">Crear Instructor</a>
            </div>
        @endif

        <div class="d-flex justify-content-center">
            {{ $teachers->render() }}
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script>
    $(document).on("submit", "#delete", function() {
        return confirm("¿ Desea eliminar el instructor ?");
    });
</script>
@endsection

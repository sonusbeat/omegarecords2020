@extends('templates.admin.main')
@section('page-title', 'Gestionar Cursos')

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
            <h3 class="card-title">Gestionar Cursos</h3>
            @if(isset($courses) && $courses->count())
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-lg">Crear Curso</a>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if(isset($courses) && $courses->count())

            @foreach($courses->chunk(3) as $row)
            <div class="row mb-3">
                @foreach($row as $course)
                <div class="col-12 col-md-6 col-lg-4 border border-black bg-light p-4">
                    <h4>{{ Str::limit($course->title, 26) }}</h4>

                    <a href="{{ route('admin.courses.show', $course->id) }}" title="Ver Detalles">
                        <img class="img-fluid rounded mb-4" src="{{ asset("/imagenes/courses/{$course->image}-thumbnail.jpg") }}" height="360" alt="{{ $course->image_alt }}">
                    </a>

                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-lg btn-info"><span class="fas fa-info"></span></a>

                        {!! activate_resource('courses', $course->id, $course->active, 'lg') !!}

                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-lg btn-warning"><span class="fas fa-edit"></span></a>

                        {!! delete_resource('courses', $course->id, $course->active, 'lg') !!}
                    </div>

                    <p class="text-right"><b>Posici&oacute;n:</b>&nbsp;{{ $course->position }}</p>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center font-weight-bold">
                Aun no hay cursos
            </div>
            <div class="block">
                <a class="btn btn-info btn-md btn-block font-weight-bold" href="{{ route('admin.courses.create') }}">Crear Curso</a>
            </div>
        @endif

        <div class="d-flex justify-content-center">
            {{ $courses->render() }}
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script>
    $(document).on("submit", "#delete", function() {
        return confirm("¿ Desea eliminar el curso ?");
    });
</script>
@endsection

@extends('templates.admin.main')
@section('page-title', 'Editar Curso')

@section('custom-styles')
<!-- Custom Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Curso</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PATCH">

            @include('admin.courses._form')
        </form>
    </div>
</div>
@endsection

@section('custom-scripts')
@include('admin.courses._form-scripts')
@endsection

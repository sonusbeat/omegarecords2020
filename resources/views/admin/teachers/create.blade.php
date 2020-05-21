@extends('templates.admin.main')
@section('page-title', 'Crear Instructor')

@section('custom-styles')
<!-- Custom Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<style>

</style>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Instructor</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('admin.teachers._form')
        </form>
    </div>
</div>
@endsection

@section('custom-scripts')
@include('admin.teachers._form-scripts')
@endsection

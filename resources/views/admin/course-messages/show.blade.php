@extends('templates.admin.main')
@section('page-title', 'Detalles del mensaje')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="media">
            <div class="media-body">
                <h3 class="mt-0">Detalles del Mensaje del curso</h3>
                <table class="table table-hover">
                    <tr>
                        <th><b>Prospecto</b></th>
                        <td>{{ $message->name }}</td>
                    </tr>
                    <tr>
                        <th><b>Email</b></th>
                        <td>{{ $message->email }}</td>
                    </tr>
                    <tr>
                        <th><b>WhatsApp</b></th>
                        <td>{{ $message->whatsapp }}</td>
                    </tr>
                    <tr>
                        <th><b>Curso</b></th>
                        <td>
                            <a href="{{ route('admin.courses.show', $message->course->id) }}" class="text-info">
                                <b>{{ $message->course->title }}</b>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th><b>Mensaje</b></th>
                        <td>{{ $message->message }}</td>
                    </tr>
                    <tr>
                        <th><b>Fecha de creaci&oacute;n</b></th>
                        <td>{{ $message->created_at->formatLocalized('%e de %B del ') . $message->created_at->format('Y, g:m:s a') }}</td>
                    </tr>
                    <tr>
                        <th><b>Fecha de modificaci&oacute;n</b></th>
                        <td>{{ $message->updated_at->formatLocalized('%e de %B del ') . $message->updated_at->format('Y, g:m:s a') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-between mt-4">
            <a class="btn btn-primary btn-lg" href="{{ route('admin.course_messages.index') }}">
                <span class="fas fa-chevron-left"></span>&nbsp;Volver
            </a>
        </div>
    </div>
</div>
@endsection

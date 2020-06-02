@component('mail::message')
# {{ $course->title }}

Gracias **{{ $form['name'] }}** por su mensaje, en este correo electrónico le hemos enviado un archivo adjunto en PDF **{{ $filename }}** con toda la información del curso de su interés.

@endcomponent

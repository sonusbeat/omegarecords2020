@component('mail::message')
# Solicitud de información de:
"{{ $course->title }}"

---

## Nombre

{{ $form['name'] }}

## WhatsApp

{{ $form['whatsapp'] ? $form['whatsapp'] : 'Prefirió no enviarlo' }}

## Celular

{{ $form['whatsapp'] }}

## Mensaje

{{ $form['message'] }}
@endcomponent

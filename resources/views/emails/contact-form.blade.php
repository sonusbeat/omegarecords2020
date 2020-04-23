@component('mail::message')
# Formulario de Contacto

---

## Nombre

{{ $form['name'] }}

## Celular

{{ $form['mobile'] }}

## Mensaje

{{ $form['message'] }}
@endcomponent

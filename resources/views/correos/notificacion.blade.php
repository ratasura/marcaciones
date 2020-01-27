@component('mail::message')
# Novedades en su marcación

Estimado funcionario:

Se ha reportado un atraso en su marcación correspondiente al día de hoy.

{{-- @component('mail::button', ['url' => ''])
aceptar
@endcomponent --}}

Saludos,<br>
{{ config('app.name') }}
@endcomponent

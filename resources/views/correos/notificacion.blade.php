@component('mail::message')
# Novedades en su marcación

Estimado/a funcionario/a: {{$funcionario->nombre}}

@php
        $date = Carbon\Carbon::parse($fecha);
       $fec=$date->format('d-m-Y');
       
@endphp 

Se ha reportado un incidente en su marcación con fecha: {{$fec}}.
#Detalle:
{{$texto}}

{{-- @component('mail::button', ['url' => ''])
aceptar
@endcomponent --}}

Saludos,<br>
{{-- {{ config('app.name') }} --}}
#Sistema de Notificaciones.
@endcomponent

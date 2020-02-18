@extends ('layouts.admin')

@section ('contenido')
<p class="h3"> Marcaciones por funcionario </p>
@include('layouts.advertencia')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('listarmarcaciones')}}" name="form-general" class="form-horizontal" method="POST">
                          @csrf
                          <label for="fecInicio">Fecha de Inicio</label>
            <input type="date" name="fecInicio" value="{{$fecInicio}}">
                          <label for="fecFinal">Fecha Fin</label>
                          <input type="date" name="fecFinal" value="{{$fecFinal}}">
    
                          <label for="ci">Cédula</label>
            <input type="text" name="ci" value="{{$ci}}">   
                          <button type="submit">Enviar</button>
                                     
            </form>
        </div>  
        <div class="col">
            <table class="table table-bordered table-hover  table-responsive-lg">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($marcaciones)>0)                    
                        @foreach ($marcaciones as $item)
                        @php
                        $novedad = Carbon\Carbon::parse($item->fecha);
                        $hora=$novedad->toTimeString();
                        $fecha=$novedad->format('d-m-Y');
                        @endphp
                        <tr>
                            <td>{{$fecha}}</td>
                            <td>{{$hora}}</td>
                            <td>{{$item->ci}}</td>
                            <td>{{$item->nombre}}</td>
                        </tr>
                        @endforeach
                    
                     @else
                     <br>
                     <br>
                     <br>
                        <h3>No hay registros que coincidan con la búsqueda</h3>
                    @endif                   
                </tbody>
            </table>
            {{$marcaciones->links()}}
        </div>
    </div>
</div>
@endsection
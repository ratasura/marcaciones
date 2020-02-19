@extends ('layouts.admin')

@section ('contenido')
<p class="h1">Atrasos Registrados</p>
@include('layouts.advertencia')

<div class="row">
    <div class="col-lg-12">
        <form action="{{url('totalatrasospdf')}}" name="form-general" class="form-horizontal" method="get">
                      @csrf
                    <label for="fecInicio">Fecha de Inicio</label>
                    <input type="date" name="fecInicio" value="{{$fecInicio}}" >
                    <label for="fecFinal">Fecha Fin</label>
                    <input type="date" name="fecFinal"  value="{{$fecFinal}}">
                    <label for="ci">Nombre</label>
                    <input type="text" name="nombre" value="{{$nombre}}">   
                    <button type="submit">Enviar</button>                                 
        </form>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <a href="{{ action('ReportesController@totalatrasos', ['fecInicio'=>$fecInicio,'fecFinal'=>$fecFinal,'nombre'=>$nombre]) }}">    <button class=" btn btn-danger fa fa-file-pdf-o">     Reporte en PDF</button></a>
        </div>
    </div>    
 </div>
 <div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Fecha atraso</th>
                    <th>Hora atraso</th>
                 
                     
                </tr>
            </thead>
            <tbody>
                @if (count($atrasos)>0)
                    @foreach($atrasos  as $info)
                        @php
                            $novedad = Carbon\Carbon::parse($info->fechaincidente);
                            $hora=$novedad->toTimeString();
                            $fecha=$novedad->format('d-m-Y');
                        @endphp
                     <tr>
                        <td>{{$info->ci}}</td>
                        <td>{{$info->nombre}}</td>
                        <td>{{$fecha}}</td>
                        <td>{{$hora}}</td>
                        
                       
                    </tr>
                    @endforeach
                @else
                     <h3>No hay registros que coincidan con la búsqueda</h3>
                   @endif 
            </tbody>
        </table>
    </div>
    {{$atrasos->render()}}
 </div>

@endsection
@extends ('layouts.admin')

@section ('contenido')
<p>Listado de novedades </p>
<div class="row">
    <div class="col-lg-12">
        <form action="{{route('historico')}}" name="form-general" class="form-horizontal" method="POST">
                      @csrf
                      <label for="fecInicio">Fecha de Inicio</label>
        <input type="date" name="fecInicio" value="{{$fecInicio}}">
                      <label for="fecFinal">Fecha de Inicio</label>
                      <input type="date" name="fecFinal" value="{{$fecFinal}}">
                      <button type="submit">Enviar</button>
        </form>
    </div>    
 </div>

 <div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Marcacion</th>
                    <th>Acciones</th>
                     
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios  as $info)
                <tr>
                    <?php  
                    $cifun = $info->ci;
                    ?>
                    @foreach ($info->fechas($fecInicio, $fecFinal) as $fecha)
                    <?php 
                       $cifun2 = $fecha->ci 
                       ?>
                       @if($cifun=$cifun2) 
                            <th>{{$cifun}}</th>
                            <th>{{$fecha->nombre}}</th>
                            <th>{{Carbon\Carbon::parse($fecha->fecha)}}</th>
                            <th>
                                {{-- <a href="#"><button class="btn btn-primary" disabled data-toggle="modal" data-target="#fm-modal">Detalles</button></a> --}}
                                <a href="{{ route('notificar',
                                  ['id'=> $info->id,'fecha'=>$fecha->fecha])}} "
                                    class="btn btn-danger btn-sm">Notificar</a>
                                
                            </th> 
                       @endif
                       
                    @endforeach
                    
                </tr>
                @endforeach
                {{-- @if (session('status'))
                       <h2>{{ session('status') }}</h2>
                @endif --}}
            </tbody>
        </table>
    </div>
    {{$funcionarios->links()}}
 </div>
@endsection

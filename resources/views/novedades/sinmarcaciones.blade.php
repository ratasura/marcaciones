@extends ('layouts.admin')

@section ('contenido')
<p class="h1">Funcionarios sin marcaciones</p>
@include('layouts.advertencia')
<p></p>
<div class="row">
    <div class="col-lg-12">
        <form action="{{route('sinmarcaciones')}}" name="form-general" class="form-horizontal" method="POST">
                      @csrf
                      <label for="fecInicio">Fecha </label>
                    <input type="date" name="fecha" value="{{$fecha}}">
                        <button type="submit">Enviar</button>
                                 
        </form>
    </div>     -
 </div>

 <div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Acciones</th>
                     
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios  as $info)
                    <tr>         
                        <th >{{$info->nombre}}</th>
                         <th >{{$info->ci}}</th>
                             <th>
                                     {{-- <a href="#"><button class="btn btn-primary" disabled data-toggle="modal" data-target="#fm-modal">Detalles</button></a>  --}}
                                         <a href="{{ route('notificarnovedad',
                                        ['id'=> $info->id,'fecha'=>$fecha])}} " 
                                        class="btn btn-danger btn-sm">Notificar</a> 
                                </th>                        
                    </tr>
                @endforeach
             </tbody>
        </table>
    </div>
    {{$funcionarios->render()}}
 </div>



 
@endsection

@extends ('layouts.admin')

@section ('contenido')
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
    
                          <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{$nombre}}">   
                          <button type="submit">Enviar</button>
                                     
            </form>
        </div>  
        <div class="col">
            <table class="table table-bordered table-hover  table-responsive-lg">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cédula</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcaciones as $item)
                    <tr>
                        <td>{{$item->fecha}}</td>
                        <td>{{$item->ci}}</td>
                        <td>{{$item->nombre}}</td>
                    </tr>
                    @endforeach
                                        
                </tbody>
            </table>
            {{$marcaciones->links()}}
        </div>
    </div>
</div>
@endsection
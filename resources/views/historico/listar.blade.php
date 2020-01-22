@extends ('layouts.admin')

@section ('contenido')
<p>Listado de novedades</p>
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pruebas</h3>
            <form action="{{route('historico')}}" name="form-general" class="form-horizontal" method="POST">
                  @csrf
                  <label for="fecInicio">Fecha de Inicio</label>
                  <input type="date" name="fecInicio">
                  <label for="fecFinal">Fecha de Inicio</label>
                  <input type="date" name="fecFinal">
                  <button type="submit">Enviar</button>
              </form>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover table-striped"> 
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Marcacion 1</th>
                            <th>Marcacion 2</th>
                            <th>Marcacion 3</th>
                            <th>Marcacion 4</th> 
                            <th>Opciones</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($funcionarios  as $info)
                        <tr>
                            <td>{{$info['ci']}}</td>
                            <td>{{$info['nombre']}}</td>
                            @foreach($info->fechas($fecInicio, $fecFinal) as $fecha)
                               <td>{{Carbon\Carbon::parse($fecha->fecha)}}</td>
                               {{-- ->format('Y-m-d h:i:s') --}}
                            <td><a href="#"><button class="btn btn-primary">Detalles</button></a></td>                              
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$funcionarios->links()}}
        </div>
    </div>
</div>
@endsection
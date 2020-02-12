@extends ('layouts.admin')

@section ('contenido')
<p>Listado de atrasos </p>

<div class="row">
    <div class="col-lg-12">
        <form action="{{url('atrasos')}}" name="form-general" class="form-horizontal" method="get">
                      @csrf
                      <label for="fecInicio">Fecha de Inicio</label>
                    <input type="date" name="fecInicio" value="{{$fecInicio}}" >
                      <label for="fecFinal">Fecha Fin</label>
                    <input type="date" name="fecFinal"  value="{{$fecFinal}}">

                      <label for="ci">cédula</label>
                    <input type="text" name="ci" value="{{$ci}}">   
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
                    <th>Fecha atraso</th>
                    <th>Acciones</th>
                     
                </tr>
            </thead>
            <tbody>
                @foreach($atrasos  as $info)
                    <tr>                     
                        <td>{{$info->ci}}</td>
                        <td>{{$info->nombre}}</td>
                        @php
                            $minutos = Carbon\Carbon::parse($info->fechaincidente);
                            $minutosAtra=$minutos->toTimeString();
                                                                                
                        @endphp
                        {{-- <th>{{$info->fechaincidente}}</th> --}}
                        <td>{{$info->fechaincidente}}</td>
                        <td>
                        {{-- <a href="{{URL::action('FuncionarioController@edit',$fun->id)}}"><button class="btn btn-info">Editar</button></a> --}}
						<a href="" data-target="#modal-delete-{{$info->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> 
                        </td>
                    </tr>
                    @include('historico.atrasos.modal')
                @endforeach
                
            </tbody>
        </table>
    </div>
    {{$atrasos->render()}}
 </div>

@endsection
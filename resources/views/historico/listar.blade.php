@extends ('layouts.admin')

@section ('contenido')
<p class="h1">Notificar Atrasos </p>
@include('layouts.advertencia')
<p></p>
<div class="row">
    <div class="col-lg-12">
        <form action="{{route('historico')}}" name="form-general" class="form-horizontal" method="POST">
                      @csrf
                      <label for="fecInicio">Fecha de Inicio</label>
                        <input type="date" name="fecInicio" value="{{$fecInicio}}">
                      <label for="fecFinal">Fecha Fin</label>
                      <input type="date" name="fecFinal" value="{{$fecFinal}}">

                      <label for="pais">Jornada</label>
                            <select name="jornada" value="{{$jornada}}">
                                <option value="0">AM</option>
                                <option value="1">PM</option>
                                {{-- <option value="2">Ingreso 14hrs</option>                                 --}}
                            </select>
                      
                      <button type="submit">Enviar</button>
                                 
        </form>
    </div>    
 </div>

 <div class="row">
     {{-- mensajes flash --}}

            @if (session('flash'))
                <div class="alert alert-success" role="alert">
                    <strong>Aviso</strong> {{session('flash')}}
                    <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
             {{-- mensajes flash --}}
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
                        @foreach ($info->fechas($fecInicio, $fecFinal, $jornada) as $fecha)
                            <?php 
                                $cifun2 = $fecha->ci 
                            ?>
                           
                        @if($cifun=$cifun2) 
                                        @php
                                        $novedad = Carbon\Carbon::parse($fecha->fecha);
                                        $fechaAtraso=$novedad->toTimeString();
                                        @endphp
                                <th class="cedula">{{$cifun}}</th>
                                <th class="nombre">{{$fecha->nombre}}</th>
                                <th>{{$fechaAtraso}}</th>
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

<!-- para usa jscript ('scripst esta definida en admin.blade al final') -->
    @push('scripts') 

            <script>
                $(document).ready(function(){
                            duplicados();
                        });

             function duplicados ()
            {
                var nombres = document.getElementsByClassName("nombre");
               var nombres_array = [];
               var total = 0;
               for(i=0; i<nombres.length; i++){
                   nombres_array.push(nombres[i].value);
               }
                console.log(nombres_array);
            }
            </script>
        
    @endpush 

 
@endsection

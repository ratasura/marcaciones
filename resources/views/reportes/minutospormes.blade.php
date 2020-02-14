@extends ('layouts.admin')

@section ('contenido')
@include('layouts.advertencia')
<div class="container">
    
    <div class="row">
        <div class="col-lg-12">
            <form action="{{url('reportes')}}" name="form-general" class="form-horizontal" method="get" >
                @csrf
                
                <select name="mes" id="mes" >
                <option value="{{$mes}}" selected disabled hidden>{{$mes}}</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                 </select>
                 <button type="submit">Enviar</button>
            </form>
         </div>  
         <br>
         <br>
         <br>
         <div class="col-lg-12">
            <table class="table table-bordered table-dark table-responsive-lg">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Total minutos</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($atrasos as $item)
                    
                    <tr class="table-dark">
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->total}}</td>
                        
                    </tr>
                    @endforeach
                   
                                        
                </tbody>
            </table>
            {{$atrasos->links()}}
         </div>
         
      
    </div>    
</div>

{{-- @push('scripts')

<script>
    // $(document).ready(function () {
    //     seleccionado();
    // });

    function seleccionado(){
        var cod = document.getElementById("mes").value;        
        return cod;
    }
</script>
    
@endpush --}}


@endsection
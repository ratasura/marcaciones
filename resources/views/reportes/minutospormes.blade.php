@extends ('layouts.admin')

@section ('contenido')
<p class="h3"> Atrasos por funcionario </p>
@include('layouts.advertencia')
<div class="container">
    
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <form action="{{url('reportes')}}" name="form-general" class="form-horizontal" method="get" >
                    @csrf                    
                    <select class="form-control form-control-sm"  name="mes" id="mes" >
                    <option  >Escoja un mes...</option>
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
                     <br>
                     <button class="btn btn-primary" type="submit">Enviar</button>                                                     
                </form>
            </div>            
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <a href="{{ action('ReportesController@totalMinutosPdf', $mes) }}">    <button class=" btn btn-danger fa fa-file-pdf-o">     Reporte en PDF</button></a>
            </div>
            
            
           
            
            
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
                    @if(count($atrasos)>0)   
                        @foreach ($atrasos as $item)                    
                        <tr class="table-dark">
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->total}}</td>                        
                        </tr>
                        @endforeach
                    @else
                        <h3>No hay registros que coincidan con la búsqueda</h3>
                    @endif 

                </tbody>
            </table>
            {{$atrasos->links()}}
         </div>
         
      
    </div>    
</div>

@push('scripts')

<script>
 window.onload = function() {
  imprimirValor();
}
 
 function imprimirValor(){
    var select = document.getElementById("mes");
  //var options=document.getElementsByTagName("option");
  //console.log(select.value);
  //console.log(options[select.value].innerHTML)
  mes=$("#mes option:selected").text();
  //return select;
  //console.log(mes);
 }
</script>
    
@endpush


@endsection
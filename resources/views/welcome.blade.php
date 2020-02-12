@extends ('layouts.admin')

@section ('contenido')


  <div class="container">
         <div class="row">
             <div class="col-lg-12">
                <form action="{{url('welcome')}}" name="form-general" class="form-horizontal" method="get">
                    @csrf
                    <h3 class="card-title">Ingrese el mes</h3>
                    <select name="mes" >
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
             <div class="col">
                 <div class="jumbotron ">
                     <h1 class="display-3 mb-3">Estadísticas</h1>                   
                     <p class="lead mb-4">                         
                        <table table class="table table-bordered table-hover bg-dark text-white table-responsive-lg"">
                            <thead >
                                <tr>
                                    <th>Nombre</th>
                                    <th>Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atrasos as $item)
                                <tr>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->total}}</td>
                                    
                                </tr>
                                @endforeach
                                                 
                            </tbody>                            
                        </table>
                        {{$atrasos->links()}}
                    
                    </p>
                     <div>
                         {{-- <a href="#" class="btn btn-primary btn-lg">Leer mas</a>
                         <a href="#" class="btn btn-success btn-lg">Ver</a> --}}
                     </div>
                 </div>
             </div>
         </div>
     </div>

@endsection
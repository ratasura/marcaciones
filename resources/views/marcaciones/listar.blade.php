@extends ('layouts.admin')

@section ('contenido')
<p>Listado de marcaciones</p>
<div class="container">
    <div class="row">
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
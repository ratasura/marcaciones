<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">    
<title></title>
<style>
    
    h2, p{
        text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even){background-color: #f2f2f2}
    
    th {
      background-color: #666;
      color: white;
    }



    </style>
</head>


<body> 
    @php
        $date = Carbon\Carbon::parse($fecInicio);
        $date2 = Carbon\Carbon::parse($fecFinal);
        $fecha1=$date->format('d-m-Y');
        $fecha2=$date2->format('d-m-Y');

    @endphp
    
<p> Total de atrasos desde {{$fecha1}} al {{$fecha2}} </p> 
    {{-- <p>  {{App\Historico::periodo($mes)}} </p>  --}}
    <table class="table">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Fecha atraso</th>
                <th>Hora atraso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atrasos as $item)
                @php
                $novedad = Carbon\Carbon::parse($item->fechaincidente);
                $hora=$novedad->toTimeString();
                $fecha=$novedad->format('d-m-Y');
                @endphp
                <tr>
                    <td>{{$item->ci}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$fecha}}</td>
                    <td>{{$hora}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$atrasos->links()}} 
    <footer>
        <p>Realizado por:  {{ auth()->user()->name}}</p>
        <p>Información de contacto: <a href="mailto:{{ auth()->user()->email}}">{{ auth()->user()->email}}</a>.</p>
      </footer> 
</body>
</html>

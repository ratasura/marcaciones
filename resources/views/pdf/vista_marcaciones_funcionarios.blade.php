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
    
    <h2> Reporte marcaciones </h2> 
    {{-- <p>  {{App\Historico::periodo($mes)}} </p>  --}}
    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Cédula</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcaciones as $item)
            @php
            $novedad = Carbon\Carbon::parse($item->fecha);
            $hora=$novedad->toTimeString();
            $fecha=$novedad->format('d-m-Y');
            @endphp
            <tr>
                <td>{{$fecha}}</td>
                <td>{{$hora}}</td>
                <td>{{$item->ci}}</td>
                <td>{{$item->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$marcaciones->render()}}
    <footer>
        <p>Realizado por:  {{ auth()->user()->name}}</p>
        <p>Información de contacto: <a href="mailto:{{ auth()->user()->email}}">{{ auth()->user()->email}}</a>.</p>
      </footer> 
</body>
</html>

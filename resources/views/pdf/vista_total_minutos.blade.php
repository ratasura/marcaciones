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
    
    <h2> Reporte total en minutos </h2> 
    <p>  {{App\Historico::periodo($mes)}} </p> 
    <table class="table">
        <thead>
            <tr>
                <th>Funcionario</th>
                <th>Total minutos</th>
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
    {{-- {{$atrasos->links()}} --}}
    <footer>
        <p>Realizado por:  {{ auth()->user()->name}}</p>
        <p>Información de contacto: <a href="mailto:{{ auth()->user()->email}}">{{ auth()->user()->email}}</a>.</p>
      </footer> 
</body>
</html>



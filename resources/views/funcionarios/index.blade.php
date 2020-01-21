@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Funcionarios <a href="/funcionarios/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('funcionarios.search')
	</div>
</div>



<div class="row"> 

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="table-responsive">

			<table class="table table-striped table-bordered table-condensed table-hover">

				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Cedula</th>
					<th>Opciones</th>
				</thead>
				@foreach ($funcionarios as $fun)
					<tr>
						<td>{{$fun->nombre}}</td>
						<td>{{$fun->mail}}</td>
						<td>{{$fun->ci}}</td>
						<td>
						<a href="{{URL::action('FuncionarioController@edit',$fun->id)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$fun->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> 
					</td>
					</tr>
				@include('funcionarios.modal')

				@endforeach
			</table>

		</div>
		{{$funcionarios->render()}}

	</div>

</div>


@endsection
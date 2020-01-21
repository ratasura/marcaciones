@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Funcionario: {{$funcionario->nombre}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>


{!!Form::model($funcionario,['method'=>'PATCH','route'=>['funcionarios.update', $funcionario->id]])!!}
{!!Form::token()!!}

	<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
						<label for="ruc">Nombre</label>
						<input type="text" name="nombre" required value="{{$funcionario->nombre}}" class="form-control" placeholder="Nombre...">										
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
						<label for="razonsocial">Correo</label>
						<input type="text" name="mail"  value="{{$funcionario->mail}}"  class="form-control" placeholder="Razon Social...">										
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
						<label for="nombrecomercial">Cedula</label>
						<input type="text" name="ci"  value="{{$funcionario->ci}}"  class="form-control" placeholder="Cédula...">										
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger"  type="button" onclick="history.back(-1)">Cancelar</button> 
				</div>
		</div>

		

		</div>


{!!Form::close()!!}


	
@endsection
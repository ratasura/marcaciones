@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Funcionario</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'/funcionarios','method'=>'POST', 'autocomplete'=>'off'))!!}
		{!!Form::token()!!}
			<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required value="" class="form-control" placeholder="nombre...">										
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
						<label for="mail">Correo</label>
						<input type="text" name="mail"  value=""  class="form-control" placeholder="Mail...">										
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
						<label for="ci">Cedula</label>
						<input type="text" name="ci"  value=""  class="form-control" placeholder="Cédula...">										
				</div>
			</div>
			
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
		</div>

		

		</div>


		
		
	
		{!!Form::close()!!}
	</div>
</div>

@endsection
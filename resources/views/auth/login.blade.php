@extends('layouts.app')

@section('contenido')
  <hr>
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Acceso al sistema</h3>
      </div>
      <div class="panel-body">
        <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
          <label for="name">Usuario</label>
          <input class="form-control"
          type="text"
          name="name"
          value="{{old('name')}}"
          placeholder="ingresa tu usuario">

          {!! $errors->first('name','<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group" {{ $errors->has('password') ? 'has-error' : '' }}>
          <label for="password">Password</label>
          <input class="form-control"
           type="password"
            name="password"
             placeholder="ingresa tu password">

          {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
        </div>
        <button class="btn btn-primary btn-block">Acceder</button>
      </div>
        </form>
      </div>
      <div class="panel-footer">

      </div>
    </div>
  </div>
@endsection
@extends ('layouts.admin')
@section ('contenido')

<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @include('layouts.advertencia')
            </div>
            <div class="card-body">
                <form action=" {{url('cargar')}} " method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file" class="form-control" accept=".csv">
                    <input class="btn btn-primary" type="submit" value="Cargar archivo">
                </form>
                  @if (session('status'))
                  <h2>{{ session('status') }}</h2>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
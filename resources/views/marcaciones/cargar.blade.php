@extends ('layouts.admin')

@section ('contenido')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1>Cargar Archivo</h1>
            </div>
            <div class="card-body">
                <form action=" {{url('cargar')}} " method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file" class="form-control" accept=".csv">
                    <input class="btn btn-primary" type="submit" value="Submit">
                  </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
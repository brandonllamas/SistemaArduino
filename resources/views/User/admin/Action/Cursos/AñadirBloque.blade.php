@extends('User.admin.layout.Dasboard')

@section('content')
    <script>
        var style = document.getElementById('Cursos');
        style.classList.add('active');

    </script>
    <div class="container h-100">
        <div class="row justify-content-center ">
            <div class="col-sm-8 align-self-center text-center">
                <div class=" card-body">
                    <h5 class="card-title"><b> Bloques</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Ingrese los campos correspondientes </h6>
                    <br>
                    <p class="card-text">
                        @if (session('mensajeErr'))
                            <div class="alert alert-danger" role="alert">{{ session('mensajeErr') }}</div>
                        @endif
                        @if (session('mensaje'))
                            <div class="alert alert-success" role="alert">{{ session('mensaje') }}</div>
                        @endif
                    <form method="POST" action="{{ route('AñadirBloquesAdmin') }}">
                        @csrf
                        <div class="form-group">
                            <label>Numero del bloque</label>
                            <input type="number" class="form-control" name="id" aria-describedby="emailHelp">


                        </div>
                        <div class="form-group">
                            <label>Nombre del bloque</label>
                            <input type="text" class="form-control" name="Nombre">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    </p>

                </div>


            </div>
        </div>
    </div>
    </div>
@endsection

@extends('User.admin.layout.Dasboard')

@section('content')

    <script>
        var style = document.getElementById('ver');

    </script>
    <div class="container h-100">
        <div class="row justify-content-center ">
            <div class="col-sm-8 align-self-center text-center">
                @if (session('mensajeErr'))
                    <div class="alert alert-danger" role="alert">{{ session('mensajeErr') }}</div>
                @endif
                @error('name')
                <div class="alert alert-danger">
                    El nombre es obligatorio
                </div>
                @enderror
                @error('email')
                <div class="alert alert-danger">
                    El correo es obligatorio
                </div>
                @enderror
                @error('cedula')
                <div class="alert alert-danger">
                    La cedula es obligatoria
                </div>
                @enderror
                @error('cedula')
                <div class="alert alert-danger">
                    Su carnet debe ser obligatorio
                </div>
                @enderror
                @error('password')
                <div class="alert alert-danger">
                    La contraseña es obligatoria
                </div>
                @enderror
                <div class="tab-pane" id="tab_2">
                    <div class="card" ">
                        <div class=" card-body">
                        <h5 class="card-title"><b> Agregar profesores </b></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Agregar profesores al colegio</h6>
                        <p class="card-text"></p>

                    </div>
                </div>

                <form action="{{ route('UpdateUser', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label for="inputEmail4"><b>Nombre</b></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><b>Correo</b></label>

                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Correo del profesor" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress"><b>Cedula</b></label>

                        <input type="number" class="form-control" id="cedula" placeholder="Cedula" name="cedula"
                            value="{{ $user->cedula }}">
                    </div>
                    <div class="form-group">

                        <label for="inputAddress"><b>Numero de tarjeta</b></label>
                        <input type="text" class="form-control" id="IdCarnet" placeholder="Id de tarjeta estudiantil"
                            name="IdCarnet" value="{{ $user->IdCarnet }}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2"><b> Password</b></label>

                        <input type="password" class="form-control" id="password" placeholder="password" name="password">
                        <br><button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
            </div>

            </form>
        </div>
        </div>
    </div>
    </div>


@endsection

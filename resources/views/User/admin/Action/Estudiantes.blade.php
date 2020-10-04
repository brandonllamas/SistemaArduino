@extends('User.admin.layout.Dasboard')

@section('content')

    <script>
        var style = document.getElementById('Estudiantes');
        style.classList.add('active');

    </script>
    <div class="container h-100">
        <div class="row justify-content-center ">
            <div class="col-sm-8 align-self-center text-center">
                <div class="card">
                    <div class="card-header">

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                            </li>
                            <a class="nav-link active" href="#" onclick="Lista()" id="lista">Active</a>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="Nuevo()" id="nuevo">Nuevo</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        @if (session('mensaje'))
                            <div class="alert alert-success">{{ session('mensaje') }}</div>
                        @endif
                        <div class="card-body">
                            @if (session('mensajeErr'))
                                <div class="alert alert-danger" role="alert">{{ session('mensajeErr') }}</div>
                            @endif


                            <div class="tab-pane" id="tab_1">
                                <div class="card">
                                <div class=" card-body">
                                    <h5 class="card-title">Tabla de Estudiantes</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Estudiantes agregados</h6>
                                    <p class="card-text"></p>

                                </div>

                            </div>
                            <br>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Cedula</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Tarjeta estudiantil</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $item)
                                        @if ($item->roles->first()->name == 'Estudiante')
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->cedula }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->IdCarnet }}</td>
                                                <td>
                                                    <form action="{{ route('Profesor.eliminar', $item) }}" class="d-inline" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>


                                                <a href="{{ route('Editar',$item->id ) }}" class="btn btn-warning">Editar</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach


                                </tbody>
                            </table>


                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="card" >
                                <div class=" card-body">
                                <h5 class="card-title"><b> Agregar profesores </b></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Agregar profesores al colegio</h6>
                                <p class="card-text"></p>

                            </div>
                        </div>

                        <form action="{{ route('crearEstudiante') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4"><b>Nombre</b></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nombre completo ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4"><b>Correo</b></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Correo del profesor">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress"><b>Cedula</b></label>
                                <input type="number" class="form-control" id="cedula" placeholder="Cedula" name="cedula">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress"><b>Numero de tarjeta</b></label>
                                <input type="text" class="form-control" id="IdCarnet" placeholder="Id de tarjeta estudiantil" name="IdCarnet">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2"><b> Password</b></label>
                                <input type="password" class="form-control" id="password" placeholder="password"
                                    name="password">
                                <br><button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script>
        function Nuevo() {
            document.getElementById('tab_1').style.display = 'none';
            document.getElementById('lista').classList.remove('active');
            document.getElementById('nuevo').classList.add('active');
            document.getElementById('tab_2').style.display = 'inline';

        }

        function Lista() {
            document.getElementById('tab_2').style.display = 'none';
            document.getElementById('nuevo').classList.remove('active');
            document.getElementById('lista').classList.add('active');
            document.getElementById('tab_1').style.display = 'inline';
        }
        window.onload = (document.getElementById('tab_2').style.display = 'none');

    </script>

@endsection

@extends('User.admin.layout.Dasboard')

@section('content')

    <script>
        var style = document.getElementById('Cursos');


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
                                        <h5 class="card-title">Cursos del bloque {{ $idBloque }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Cursos agregados</h6>
                                        <p class="card-text"></p>

                                    </div>

                                </div>
                                <br>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Nombre de curso</th>
                                            <th scope="col">Capacidad</th>
                                            <th scope="col">Estado curso</th>
                                            <th scope="col">numeros estudiantes </th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($records as $item)

                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->nombreCurso }}</td>
                                                <td>{{ $item->Capacidad }}</td>
                                                <td>{{ $item->Estado_Curso }}</td>
                                                <td>0</td>
                                                <td>
                                                    <form action="{{ route('EliminarCursoAdmin', $item->id) }}" class="d-inline" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>


                                                </td>
                                            </tr>

                                        @endforeach


                                    </tbody>
                                </table>


                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="card">
                                    <div class=" card-body">
                                        <h5 class="card-title"><b> Agregar Cursos </b></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Agregar cursos del bloque {{ $idBloque }}
                                        </h6>
                                        <p class="card-text"></p>

                                    </div>
                                </div>

                                <form action="{{ route('AñadirCurso',$idBloque) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4"><b>Id Curso</b></label>
                                            <input type="text" class="form-control" id="id" name="id"
                                                placeholder="Ingrese el numero de curso ">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4"><b>Nombre Curso</b></label>
                                            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso"
                                                placeholder="Nombre del curos">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress"><b>Capacidad</b></label>
                                        <input type="number" class="form-control" id="Capacidad" placeholder="Capacidad"
                                            name="Capacidad">
                                    </div>
                                    <div class="form-check">


                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress"><b>Estado Curso</b></label>
                                        <select id="Estado" class="form-control" name="Estado">
                                            <option selected value="Libre">Libre</option>
                                            <option value="Clases">Clases</option>
                                            <option value="Ocupado">Ocupado</option>
                                            <option value="No_Disponible">No Disponible</option>
                                        </select>
                                    </div>
                                    <div class="fomr-group" id="gol">
                                        <label for="inputAddress" class="hidden-md-down"><b>Bloque</b> </label>
                                        <input type="text" name="bloqueId" id="bloqueId" value="{{ $idBloque }}"  class="hidden-md-down">
                                    </div>

                                    <div class="form-group">

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
                document.getElementById('gol').style.display = 'none';
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

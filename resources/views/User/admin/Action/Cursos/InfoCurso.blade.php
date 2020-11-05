@extends('User.admin.layout.Dasboard')

@section('content')

    <script>
        var style = document.getElementById('Cursos');


        style.classList.add('active');

    </script>
    <div class="container h-100">
        <div class="row justify-content-center ">
            <div class="col-sm-8 align-self-center text-center">

                <div class="tab-pane" id="tab_1">
                    <div class="card">
                        <div class=" card-body">
                            <h5 class="card-title">Ingreso del curso {{ $idCurso }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Estudiantes ingresados</h6>
                            <p class="card-text"></p>


                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nombre de Usuario</th>
                                        <th scope="col">Cedula</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Temperatura</th>
                                        <th scope="col">Entro/Salio</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($ingreso as $item)

                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                        <td>@foreach ($Personas as $user)


                                            @if ($item->Usuario_id==($user->IdCarnet))
                                           {{ $user->name}}
                                            @endif

                                        @endforeach</td>
                                        <td>@foreach ($Personas as $user)


                                            @if ($item->Usuario_id==($user->IdCarnet))
                                           {{ $user->cedula}}
                                            @endif

                                        @endforeach</td>

                                            <td>{{$item->Fecha}} </td>
                                            <td>{{$item->Temperatura}} C°</td>
                                            @if ($item->Ingreso==1)
                                                <td>
                                                    <p class="alert alert-success">Entrò</p>

                                                </td>
                                            @endif
                                            @if ($item->Salio==1)
                                            <td class="alert alert-danger">
                                                Saliò
                                            </td>
                                        @endif
                                        </tr>

                                    @endforeach


                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection

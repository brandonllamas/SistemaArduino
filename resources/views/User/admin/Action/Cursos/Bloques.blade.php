@extends('User.admin.layout.Dasboard')

@section('content')

    <script>
        var style = document.getElementById('Cursos');
        style.classList.add('active');

    </script>
    <div class="container h-100">
        <div class="row justify-content-center ">
            <div class="col-sm-10 align-self-center text-center">

                <div class=" card-body">
                    @if (session('mensaje'))
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
                    <h5 class="card-title"><b> Bloques</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><a href="{{ route('AñadirBloquesAdmin1') }}"
                            class="btn btn-primary">Agregar bloques</a> </h6>
                    <br>
                    <p class="card-text">

                    <div class="card-columns">
                        @foreach ($bloques as $item)
                            <div class="col-sm-6">
                                <div class="card" style="width:250px">
                                    <img class="card-img-top" src="{{ asset('img/bloque.jpg') }}" alt="Card image">
                                    <div class="card-body">
                                        <form action="{{ route('EliminarBloquesAdmin', $item) }}" class="d-inline"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-circle">X</button>
                                            <h4 class="card-title">{{ $item->NombreBloque }}</h4>
                                            <p><strong>Cursos actuales</strong>
                                                {{ $records = DB::table('cursos')->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')->where('bloque_curso.bloque_id', '=', $item->id)->Count() }}
                                            </p>
                                            <p><strong>Cursos Disponibles</strong>
                                                {{ $records = DB::table('cursos')->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')->where('bloque_curso.bloque_id', '=', $item->id)->where('cursos.Estado_Curso','=','Libre')->Count() }}
                                                   </p>
                                             <p><strong>Cursos en clase:</strong>
                                                {{ $records = DB::table('cursos')->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')->where('bloque_curso.bloque_id', '=', $item->id)->where('cursos.Estado_Curso','=','Clases')->Count() }}
                                            </p>
                                             <p><strong>Cursos Ocupados:</strong>
                                                {{ $records = DB::table('cursos')->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')->where('bloque_curso.bloque_id', '=', $item->id)->where('cursos.Estado_Curso','=','Ocupado')->Count() }}
                                             </p>
                                             <p><strong>Cursos no Disponible:</strong>
                                                {{ $records = DB::table('cursos')->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')->where('bloque_curso.bloque_id', '=', $item->id)->where('cursos.Estado_Curso','=','No_Disponible')->Count() }}
                                             </p>
                                            <p class="card-text">{{ $item->cursos }}</p>
                                            <a href="{{ route('Cursos', $item) }}" class="btn btn-primary">Ver Cursos</a>
                                    </div>
                                </div>

                        @endforeach
                    </div>
                </div>

                </p>

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

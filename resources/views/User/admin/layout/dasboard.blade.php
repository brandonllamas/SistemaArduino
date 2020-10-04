<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>
    <!-- Cabecera  -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        @guest
            @if (Route::has('register'))
                <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Salud </a>
            @endif
        @else
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">{{ Auth::user()->name }} </a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        @endguest
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <!-- Barra de al lado -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " id="home" href="/Admin">
                                <span data-feather="home"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                                  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                </svg></span>
                                Inicio <span class="sr-only">(current)</span>
                              </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="ver" href="{{route('ProfesorAdmin')}}">
                              <span data-feather="file"></span>
                              Profesores
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('BloquesAdmin') }}" id="Cursos">
                              <span data-feather="shopping-cart"></span>
                              Cursos
                            </a>
                          </li>
                          <li class="nav-item">
                          <a class="nav-link" id="Estudiantes" href="{{ route('EstudianteAdmin') }}">
                              <span data-feather="users"></span>
                              Estudiantes
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span data-feather="bar-chart-2"></span>
                              Agregar Clientes
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                              <span data-feather="layers"></span>
                              ver clientes
                            </a>
                          </li>
                        </ul>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Saved reports</span>
                            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                              <span data-feather="plus-circle"></span>
                            </a>
                          </h6>
                          <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                              </a>
                            </li>

                    </ul>
                </div>
            </nav>

        </div>

    </div>
    <main class="py-4">

        @yield('content')
    </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>

@extends('layouts.login')

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-sm-8 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($errors->any())
                        @foreach ($errors->all() as $item)
                        <div class="alert alert-danger" role="alert">
                            {{$item}}
                          </div>
                        @endforeach
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                                <div class="col-md-6">
                                    <!--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->
                                    <input id="email" type="email" placeholder="Ingrese su correo intitucional"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Ingrese su contraseña">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="checkbox mb-3">
                                <label>
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                  <label class="form-check-label" for="remember">
                                      {{ __('Remember Me') }}
                                  </label>
                                </label>
                              </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    <!--
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    -->
                                </div>

                            </div>

                        @endsection

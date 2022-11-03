@extends('layouts.app.login')

@section('content')

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="row">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <strong><a class="nav-link fst-italic" href="{{ route('home') }}"><img src="assets/img/logo/logo3.png" class="img-logo shadow" alt="">
                                    {{ 'Meu Álbum' }}</a></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row justify-content-center content-vh">
            <div class="col-md-4 m-auto">
                <div class="card border-0 p-3 bg-dark text-light shadow">
                    <div class="card-header border-0">
                        <h5 class="card-title float-start">LOGIN</h5>
                        <i class="bi bi-person-check float-end"></i>
                    </div>
                    <form name="formLogin">
                        @csrf
                        <div class="card-body border-0">
                            <div class="mb-3 messageBox">
                                <label for="email-login" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email-login" required autocomplete="email" autofocus placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="password-login" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password-login" name="password" required autocomplete="current-password" placeholder="********">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="Check" name="remember"{{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="Check">Check me out</label>
                            </div>
                            <div class="mb-3 form-check">
                                <a type="button" href="{{ route('reset-password') }}" class=" float-end">Forgot password <i class="bi bi-lock"></i></a>
                            </div>
                        </div>
                        <a href="{{ route('register') }}" class="text-warning"> Solicitar convite </a>
                        <div class="card-footer border-0 p-3 float-end">
                            <a type="button" href="{{ route('/') }}" class="btn btn-warning btn-sm rounded-0 shadow">Cancelar <i class="bi bi-x"></i></a>
                            <button type="submit" class="btn btn-sm btn-success rounded-0 shadow">Entrar <i class="bi bi-arrow-bar-right"></i></button>
                        </div>
                        @if (session('message'))
                    <div class=" mt-1 alert alert-info shadow alert-dismissible fade show border-0" role="alert">
                        <strong><i class="bi bi-exclamation-circle"> </i> {{ session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

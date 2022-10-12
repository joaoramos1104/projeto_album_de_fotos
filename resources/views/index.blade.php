@extends('layouts.login')

@section('content')
    <style>

    </style>
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
                <ul class="nav navbar float-end">
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-custom btn-light shadow" data-bs-toggle="modal" data-bs-target="#login">LOGIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container header">
        <div class="row justify-content-center">
            <div class="col-10 cont text-center">
                <h1>{{ 'Álbum de Fotos' }}</h1>
                <p>Envie suas fotos e capture os melhores momentos com álbum de fotos online. Compartilhe seu livro de fotos online com quem você quiser.</p>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="text-center">
                    <button class="btn btn-custom btn-light p-3 shadow" data-bs-toggle="modal" data-bs-target="#SolicitarConvite">SOLICITAR CONVITE</button>
                    <p>Já tem convite? <a href="{{ route('login') }}" class="text-warning"> login </a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="login" tabindex="-1" data-bs-backdrop="static" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-login text-dark">
                <div class="modal-header">
                    <h5 class="modal-title">LOGIN</h5>
                    <i class="bi bi-person-check"></i>
                </div>
                <form name="formLogin">
                    @csrf
                    <div class="modal-body">
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
                    </div>
                    <a href="{{ route('register') }}" class="text-warning"> Solicitar convite </a>
                    <div class="modal-footer p-3">
                        <button type="button" class="btn btn-warning btn-sm rounded-0 shadow" data-bs-dismiss="modal">Cancelar <i class="bi bi-x"></i></button>
                        <button type="submit" class="btn btn-sm btn-success rounded-0 shadow">Entrar <i class="bi bi-arrow-bar-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Solicitar Convite -->
    <div class="modal fade" id="SolicitarConvite" tabindex="-1" data-bs-backdrop="static" aria-labelledby="SolicitarConviteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-convite text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="SolicitarConviteLabel">Solicitar Convite</h5>
                    <i class="bi bi-envelope-check"></i>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Seu Nome" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="(21) 99999-8888">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="******">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirmar Senha</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="******">
                        </div>
                        <div class="modal-footer p-3">
                            <button type="button" class="btn btn-warning btn-sm rounded-0 shadow" data-bs-dismiss="modal">Cancelar <i class="bi bi-x"></i></button>
                            <button type="submit" class="btn btn-sm btn-success rounded-0 shadow">Solicitar <i class="bi bi-envelope-check"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="container">
        <div class="d-flex justify-content-center">
            <ul class="nav float-end social-icons m-auto">
                <li class="nav-item me-2 text-white">
                    <a class="social-icon" href="https://linkedin.com/in/joao-f-ramos1104" target="_blank"><i class="bi bi-linkedin"></i></a>
                </li>
                <li class="nav-item me-2">
                    <a class="social-icon" href="https://github.com/joaoramos1104" target="_blank"><i class="bi bi-github"></i></a>
                </li>
                <li class="nav-item me-2">
                    <a class="social-icon" href="https://www.instagram.com/f.ramosjoao" target="_blank"><i class="bi bi-instagram"></i></a>
                </li>
                <li class="nav-item me-2">
                    <a class="social-icon" href="https://twitter.com/joaoramos1988" target="_blank"><i class="bi bi-twitter"></i></a>
                </li>
                <li class="nav-item m-auto text-dark">
                    <i class="bi bi-c-circle text-light"> {{ date('Y') }} João F. Ramos Junior</i>
                </li>
            </ul>
        </div>
    </footer>

@endsection

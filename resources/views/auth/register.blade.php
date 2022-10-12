@extends('layouts.login')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="row">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <strong><a class="nav-link fst-italic" href="{{ route('home') }}"><img src="assets/img/logo/logo5.png" class="img-logo shadow" alt=""> Meu Álbum</a></strong>
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
                        <h5 class="card-title float-start">SOLICITAR - CONVITE</h5>
                        <i class="bi bi-envelope-check float-end"></i>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nome</label>
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Seu Nome" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">E-mail</label>
                                <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="phone" class="form-label">Telefone</label>
                                <input id="phone" type="tel" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="(21) 99999-8888">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Senha</label>
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="******">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="password-confirm" class="form-label">Confirmar Senha</label>
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password" placeholder="******">
                            </div>
                            <div class="card-footer border-0 p-3 float-end">
                                <a type="button" href="{{ route('/') }}" class="btn btn-warning btn-sm rounded-0 shadow">Cancelar <i class="bi bi-x"></i></a>
                                <button type="submit" class="btn btn-sm btn-success rounded-0 shadow">Solicitar <i class="bi bi-envelope-check"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
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

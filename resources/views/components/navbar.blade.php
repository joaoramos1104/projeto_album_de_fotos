    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
{{--                <div class="row">--}}
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <h4><strong><a class="nav-link fst-italic" href="{{ route('home') }}"><img src="{{ url('assets/img/logo/logo3.png') }}" class="img-logo shadow" alt="">
                                {{ 'Meu Álbum' }}</a></strong></h4>
                        </li>
                    </ul>
{{--                </div>--}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                    <ul class="nav float-end">
                        <li class="nav-item">
                            <strong>{{ 'Bem vindo(a)' }}</strong> <p>{{ Auth::user()->name }}</p>
                        </li>
                        <li class="nav-item ms-2">
                            <a href="{{ route('logout') }}" class="btn btn-sm btn-dark"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">Sair <i class="bi bi-box-arrow-right"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @if(Auth::user()->admin)
                        <li class="nav-item ms-2">
                            <a href="{{ route('admin') }}" class="btn btn-sm btn-success"> Admin</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>

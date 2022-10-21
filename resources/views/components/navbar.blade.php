    <div class="container-fluid">
        <nav class="navbar">
            <div class="container">
                <div class="row">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <strong><a class="nav-link fst-italic" href="{{ route('home') }}"><img src="{{ url('assets/img/logo/logo3.png') }}" class="img-logo shadow" alt="">
                                {{ 'Meu Álbum' }}</a></strong>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar float-end social-icons">
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
        </nav>
    </div>

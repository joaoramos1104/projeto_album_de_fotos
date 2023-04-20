    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <h4><strong><a class="nav-link fst-italic text-light" href="{{ route('home') }}" style="font-family: Calligraffitti;"><img src="{{ url('assets/img/logo/logo3.png') }}" class="img-logo shadow" alt="">
                                {{ 'Meu Álbum' }}</a></strong></h4>
                        </li>
                    </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                    <ul class="nav float-end">
                        <div class="dropdown">
                            <h6><strong>{{ 'Bem vindo(a)' }}</strong></h6>
                            <a class="dropdown-toggle text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="nav-item ms-2">
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Sair <i class="bi bi-box-arrow-right"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @if(Auth::user()->admin)
                                <li class="nav-item ms-2">
                                    <a href="{{ route('admin') }}" class="dropdown-item"> Admin <i class="bi bi-person-bounding-box"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

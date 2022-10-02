@extends('layouts.admin')

@section('content')
<div class="containe-fluid">
    <nav class="navbar">
        <div class="container">
            <div class="row">
                <ul class="navbar-nav ms-1">
                    <li class="nav-item">
                        <strong><a class="nav-link fst-italic" href="#"><img src="assets/img/logo/logo5.png" class="img-logo shadow" alt=""> Meu Álbum</a></strong>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar float-end social-icons">
                <li class="nav-item">
                    <strong>Administrador</strong> <p>João F. Ramos</p>
                </li>
                <li class="nav-item ms-2">
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-primary"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Sair <i class="bi bi-box-arrow-right"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="text-center">
    <button class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#novo">Novo Álbum <i class="bi bi-folder-plus"></i></button>
</div>
<div class="container mt-3">
    <hr class="border-bottom border-light">
</div>
@foreach($albums as $album)
<div class="container mb-3 text-center">
    <div class="row justify-content-center">
        <h3 class="mb-1 p-3 fst-italic">{{ $album->name }} <i class="bi bi-image"></i></h3>
        <div class="mb-3 p-3">
            <button class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#add{{ $album->id }}">Adicionar Tema e Fotos <i class="bi bi-image"></i></button>
        </div>
        @foreach($album->themes as $theme)
        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="{{ env('APP_URL') }}/storage/{{ $theme->hasImages[0]->photo_url }}" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel{{ $theme->id }}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $theme->name_theme }}</h5>
                    <p class="card-text">{{ $theme->description_theme }}</p>
                    <form>
                        @csrf
                        <input type="submit" class="btn btn-sm btn-danger shadow" formaction="{{ route('excluir_tema', $theme->id) }}" formmethod="post" value="Excluir">
                        @method("DELETE")
                    </form>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $theme->id }}">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>
            <!-- Modal Carousel -->
            <div class="modal fade" id="imgCarousel{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content modal-carousel">
                        <div class="modal-body">
                            <div id="carousel{{ $theme->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach($theme->hasImages as $key => $value)
                                    <button type="button" data-bs-target="#carousel{{ $key }}" data-bs-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide{{ $key }}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner p-3">
                                    @foreach($theme->hasImages as $key => $image)
                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                        <img src="{{ env('APP_URL') }}/storage/{{ $image->photo_url }}" class="d-block modal-img" alt="...">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $theme->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $theme->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer m-auto">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fechar <i class="bi bi-box-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal edit-->
            <div class="modal fade" id="ModalEdit{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelEdit{{ $theme->id }}" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabelEdit{{ $theme->id }}">Editar -
                                {{ $theme->name_theme }}</h5>
                            <i class="bi bi-image"></i>
                        </div>
                        <div class="container-fluid">
                            <div class="modal-body">
                                <div class="row col">
                                    <div class="col-md-5 col-sm-12 border-end border-darck m-auto">
                                        <form class="p-2" method="post" action="{{ route('editar_tema', $theme->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="album_id" value="{{ $theme->id }}">
                                            <div class="m-1 input-group">
                                                <span class="input-group-text" id="EditTema">Tema</span>
                                                <input type="text" class="form-control form-control-sm" aria-describedby="EditTema" name="name" value="{{ $theme->name_theme }}">
                                            </div>
                                            <div class="m-1 input-group">
                                                <span class="input-group-text" id="inputDecricao" >Descrição</span>
                                                <input type="text" class="form-control form-control-sm" aria-describedby="inputDecricao" name="description" value="{{ $theme->description_theme }}">
                                            </div>
                                            <div class="col-2 m-auto">
                                                <button type="submit" class="input-group-text btn btn-sm btn-outline-success" data-bs-dismiss="modal">Salvar <i class="bi bi-arrow-bar-right"></i></button>
                                            </div>
                                        </form>
                                        <form class="p-2">
                                            <strong><p>Adicionar nova Foto</p></strong>
                                            <div class="input-group">
                                                <input type="file" class="form-control form-control-sm">
                                                <button type="submit" class="input-group-text btn btn-sm btn-outline-success" data-bs-dismiss="modal">Enviar <i class="bi bi-arrow-bar-right"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-7 col-sm-12 scroll">
                                        <form method="post" action="">
                                            <div class="row col">
                                                @foreach($theme->hasImages as $image)
                                                <div class="card card-edit text-center">
                                                    <img src="{{ env('APP_URL') }}/storage/{{ $image->photo_url }}" class="tabel-img" alt="...">
                                                    <div class="card-body">
                                                        <form>
                                                            @csrf
                                                            <input type="submit" class="btn btn-sm btn-outline-danger shadow" formaction="{{ route('excluir_photo', $image->id) }}" formmethod="post" value="Excluir">
                                                            @method("DELETE")
                                                        </form>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col modal-footer">
                                        <button type="button" class="btn btn-sm btn-warning m-auto" data-bs-dismiss="modal">Cancelar <i class="bi bi-box-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container mt-3">
        <hr class="border-bottom border-light">
    </div>
</div>

<!-- Modal Adicionar Tema -->
<div class="modal fade" id="add{{ $album->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd{{ $album->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="staticBackdropLabelAdd{{ $album->id }}">{{ $album->name }} - Adicionar Temas e Fotos</h5>
                <i class="bi bi-image"></i>
            </div>
            <div class="container-fluid">
                <div class="modal-body">
                    <div class="row col">
                        <div class="border-end border-darck m-auto">
                            <form method="post" action="{{ route('novo_tema') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="album_id" value="{{ $album->id }}">
                                <div class="input-group m-1">
                                    <input type="file" class="form-control" name="photo_url[]" multiple>
                                </div>
                                <div class="row">
                                    <div class="m-1 input-group">
                                        <span class="input-group-text" id="AddTema">Tema</span>
                                        <input type="text" class="form-control form-control-sm" aria-describedby="AddTema" name="name" value="" placeholder="Tema" required>
                                    </div>
                                    <div class="m-1 input-group">
                                        <span class="input-group-text" id="inputDecricao" >Descrição</span>
                                        <input type="text" class="form-control form-control-sm" aria-describedby="inputDecricao" name="description" value="" placeholder="Descrição" required>
                                    </div>
                                    <div class="col-2 m-auto">
                                        <button type="submit" class="input-group-text btn btn-sm btn-outline-success" data-bs-dismiss="modal">Salvar <i class="bi bi-arrow-bar-right"></i></button>
                                    </div>
                                </div>
                                <div class="modal-footer m-auto">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal">Sair <i class="bi bi-box-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Novo -->
<div class="modal fade" id="novo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelNovo" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="staticBackdropLabelNovo">Novo Álbum</h5>
                <i class="bi bi-image"></i>
            </div>
            <div class="container p-3">
                <div class="modal-body">
                    <form method="post" action="{{ route('novo_album') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name_album" value="" placeholder="Nome do novo Álbum" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="button-addon">Salvar <i class="bi bi-check2-circle"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer m-auto">
                    <button type="submit" class="btn btn-sm btn-warning" data-bs-dismiss="modal">Cancelar <i class="bi bi-box-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

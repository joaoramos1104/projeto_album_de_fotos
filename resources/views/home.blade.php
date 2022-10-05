@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav class="navbar">
            <div class="container">
                <div class="row">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <strong><a class="nav-link fst-italic" href="#"><img src="assets/img/logo/logo5.png" class="img-logo shadow" alt=""> Meu Álbum</a></strong>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar float-end social-icons">
                    <li class="nav-item">
                        <strong>Bem vindo(a)</strong> <p>{{ Auth::user()->name }}</p>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-info"
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
    @foreach($albums as $album)
    <div class="container mb-3 text-secondary text-center ">
        <h3 class="mb-3 p-3 fst-italic">{{ $album->name }} <i class="bi bi-image"></i></h3>
        <div class="row justify-content-center">
            @foreach($album->themes as $theme)
            <div class="col-md-3 col-sm-12 p-3 m-auto">
                <div class="card border-0 text-center mt-3">
                    <a href="#" class="bg-card-img"><img src="{{ env('APP_URL') }}/storage/{{ $theme->hasImages[0]->photo_url }}" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel{{ $theme->id }}"></a>
                    <div class="card-body mt-1">
                        <h5 class="card-title">{{ $theme->name_theme }}</h5>
                        <p class="card-text">{{ $theme->description_theme }}</p>
                        <a href="#" class="btn btn-sm btn-comment shadow" data-bs-toggle="modal" data-bs-target="#comment{{ $theme->id }}">Comentários <span class="badge bg-danger rounded-pill m-1">{{ count($theme->comments) }}</span></a>
                    </div>
                </div>
            </div>

                <!-- Modal Comment-->
                <div class="modal fade" id="comment{{ $theme->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $theme->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content modal-comment">
                            <div class="modal-header bg-white">
                                <h5 class="modal-title" id="staticBackdropLabel{{ $theme->id }}"> Comentários - {{ $theme->name_theme }} </h5>
                                <i class="bi bi-image"></i>
                            </div>
                            <div class="container p-3">
                                <div class="modal-body">
                                    <div class="list-group shadow scroll-comments">
                                        @foreach($theme->comments as $comment)
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">{{ $comment->name_user }}</h6>
                                                <small>{{ $comment->created_at->format('d/m/Y - H:i') }}</small>
                                            </div>
                                            <p class="mb-1 float-start text-success">{!! $comment->comments !!}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <form method="post" action="{{ route('add_comentario') }}" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                                        <input type="hidden" name="name_user" value="{{ Auth::user()->name }}">
                                        <div class="input-group">
                                            <textarea type="text" class="form-control form-control-sm" name="comment" id="textarea{{ $theme->id }}" placeholder="Adicionar comentário"></textarea>
                                            <button type="submit" class="input-group-text btn btn-sm btn-outline-success">Enviar <i class="bi bi-arrow-bar-right"></i></button>
                                            <x-emojis />
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer m-auto">
                                <button type="button" class="btn btn-sm btn-warning" id="clean{{ $theme->id }}" data-bs-dismiss="modal">Sair <i class="bi bi-box-arrow-right"></i></button>
                            </div>
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

            @endforeach
        </div>
        <div class="container mt-3">
            <hr class="border-bottom border-dark">
        </div>
    </div>
    @endforeach
@endsection



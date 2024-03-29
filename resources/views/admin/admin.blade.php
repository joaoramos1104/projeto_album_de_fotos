@extends('layouts.admin.admin')

@section('content')
<div class="container text-center">
    <button class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#novo">Novo Álbum <i class="bi bi-folder-plus"></i></button>
    <a href="{{ route('visitors_users') }}" class="btn btn-light shadow" >Gerenciar Convites <i class="bi bi-envelope-check"></i></a>
</div>
<div class="container mt-3">
    <hr class="border-bottom border-light">
</div>
<div class="content-vh">
@foreach($albums as $album)
<div class="container mb-3 text-center"  id="content-album-admin">
    <div class="row justify-content-center">
        <h3 class="mb-1 p-3" style="font-family: Calligraffitti;"><strong> Álbum : {{ $album->name }}</strong> <i class="bi bi-image"></i></h3>
        <div class="col">
            <a href="{{ route('delete_album', $album->id) }}" class="btn btn-sm btn-danger"
            onclick="event.preventDefault();
            document.getElementById('delete_album{{$album->id}}').submit();">Excluir Album <i class="bi bi-x"></i>
            </a>
            <form id="delete_album{{$album->id}}" action="{{ route('delete_album', $album->id) }}" method="POST" class="d-none">
                @csrf
                @method("DELETE")
            </form>
        </div>
        <div class="mb-3 p-3">
            <a class="btn btn-success shadow"href="{{ route('new_theme', $album->id) }}">Adicionar Temas e Fotos <i class="bi bi-image"></i></a>
        </div>
        @foreach($album->themes as $theme)
        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="@if(isset($theme->hasImages[0]->photo_url )){{ env('APP_URL') }}/storage/{{ $theme->hasImages[0]->photo_url }}@else {{ 'assets/img/R.png' }} @endif" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel{{ $theme->id }}"></a>
                <div class="card-body">
                    <div class="mt-3">
                        <h5 class="card-title" style="font-family: Calligraffitti;"><strong>{{ $theme->name_theme }}</strong></h5>
                        <p class="card-text"><strong>{{ $theme->description_theme }}</strong></p>
                        <a href="#" class="btn btn-sm btn-dark mb-1 shadow" data-bs-toggle="modal" data-bs-target="#comment{{ $theme->id }}">Comentários <span class="badge bg-success rounded-pill m-1">{{ count($theme->comments) }}</span></a>
                    </div>
                    <div class="row d-flex">
                        <div class="col-6 m-auto">
                            <a href="{{ route('excluir_tema', $theme->id) }}" class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                document.getElementById('excluir_tema{{ $theme->id }}').submit();">Excluir <i class="bi bi-x"></i>
                            </a>
                            <form id="excluir_tema{{ $theme->id }}" action="{{ route('excluir_tema', $theme->id) }}" method="POST" class="d-none">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                        <div class="col-6 m-auto">
                            <a href="{{ route('get-theme', $theme->id) }}" class="btn btn-sm btn-light shadow">Editar <i class="bi bi-pencil-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Modal Comment-->
            <div class="modal fade" id="comment{{ $theme->id }}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $theme->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered small">
                    <div class="modal-content modal-comment shadow-lg bg-white rounded-0">
                        <div class="modal-header bg-white">
                            <h5 class="modal-title text-dark" id="staticBackdropLabel{{ $theme->id }}"> Comentários - {{ $theme->name_theme }} </h5>
                            <i class="bi bi-image"></i>
                        </div>
                        <div class="container p-3">
                            <div class="modal-body">
                                <div class="list-group scroll-comments">
                                    @foreach($theme->comments as $comment)
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">{{ $comment->name_user }}</h6>
                                                <small>{{ $comment->created_at->translatedFormat('l, d \d\e F, Y') }}</small>
                                            </div>
                                            <p class="mb-1 float-start text-success">{{ $comment->comments }}</p>
                                            <button type="button" class="btn btn-sm btn-danger float-end"
                                                onclick="event.preventDefault();
                                                document.getElementById('deleteComment{{$comment->id}}').submit();">Excluir <i class="bi bi-x"></i>
                                            </button>
                                            <form id="deleteComment{{$comment->id}}" action="{{ route('delete_comment',$comment->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer m-auto">
                            <button type="button" class="btn btn-sm btn-warning shadow" data-bs-dismiss="modal">Voltar <i class="bi bi-arrow-return-left"></i></button>
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
                                <div id="carouselHome">
                                    <div class="carousel-indicators">
                                        @foreach($theme->hasImages as $key => $value)
                                        <button type="button" data-bs-target="#carousel{{ $theme->id }}" data-bs-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide{{ $key }}"><img src="{{ env('APP_URL') }}/storage/{{ $value->photo_url }}"</button>
                                        @endforeach
                                    </div>
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
                            <h3 class="text-light mt-3 p-3">{{ $theme->name_theme }}</h3>
                        </div>
                        <div class="modal-footer m-auto">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Voltar <i class="bi bi-arrow-return-left"></i></button>
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
</div>
@endforeach

<!-- Modal Novo -->
<div class="modal fade" id="novo" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelNovo" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-dark shadow-lg bg-white rounded-0">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="staticBackdropLabelNovo">Novo Álbum</h5>
                <i class="bi bi-image"></i>
            </div>
            <div class="container p-3">
                <div class="modal-body">
                    <form method="post" action="{{ route('novo_album') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group m-1">
                            <input type="file" class="form-control" data-name="form-new-album" name="capa_album" multiple>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" data-name="form-new-album" name="name_album" value="" placeholder="Nome do novo Álbum" required>
                            <input type="text" class="form-control" data-name="form-new-album" name="descricao" value="" placeholder="Descrição">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="button-addon">Salvar <i class="bi bi-check2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer m-auto">
                    <button type="submit" class="btn btn-sm btn-warning shadow" data-bs-dismiss="modal">Cancelar <i class="bi bi-x"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

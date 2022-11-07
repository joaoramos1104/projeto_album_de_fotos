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
        <h3 class="mb-1 p-3 fst-italic">{{ $album->name }} <i class="bi bi-image"></i></h3>
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
            <button class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#add{{ $album->id }}">Adicionar Temas e Fotos <i class="bi bi-image"></i></button>
        </div>
        @foreach($album->themes as $theme)
        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="@if(isset($theme->hasImages[0]->photo_url )){{ env('APP_URL') }}/storage/{{ $theme->hasImages[0]->photo_url }}@else {{ 'assets/img/R.png' }} @endif" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel{{ $theme->id }}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $theme->name_theme }}</h5>
                    <p class="card-text">{{ $theme->description_theme }}</p>
                    <a href="#" class="btn btn-sm btn-dark mb-1 shadow" data-bs-toggle="modal" data-bs-target="#comment{{ $theme->id }}">Comentários <span class="badge bg-success rounded-pill m-1">{{ count($theme->comments) }}</span></a>
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

<!-- Modal Adicionar Tema -->
<div class="modal fade" id="add{{ $album->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd{{ $album->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-dark shadow-lg bg-white rounded-0" id="modal-new-theme">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="staticBackdropLabelAdd{{ $album->id }}">{{ $album->name }} - Adicionar Temas e Fotos</h5>
                <i class="bi bi-image"></i>
            </div>
            <div class="container-fluid">
                <div class="modal-body">
                    <div class="row col">
                        <div class="border-end border-darck m-auto" id="form-new-theme">
                            <form id="new-theme" name="new-theme" method="post" action="{{ route('novo_tema') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="album_id" value="{{ $album->id }}">
                                <div class="input-group m-1">
                                    <input type="file" class="form-control" data-name="form-new-theme" name="photo_url[]" multiple>
                                </div>
                                <div class="row">
                                    <div class="m-1 input-group">
                                        <span class="input-group-text" id="AddTema">Tema</span>
                                        <input type="text" class="form-control form-control-sm" aria-describedby="AddTema" data-name="form-new-theme" name="name"  value="" placeholder="Tema" required>
                                    </div>
                                    <div class="m-1 input-group">
                                        <span class="input-group-text" id="inputDecricao" >Descrição</span>
                                        <input type="text" class="form-control form-control-sm" aria-describedby="inputDecricao" data-name="form-new-theme" name="description" value="" placeholder="Descrição" required>
                                    </div>
                                    <div class="col-2 m-auto">
                                        <button type="submit" class="input-group-text btn btn-sm btn-outline-success">Salvar <i class="bi bi-check2"></i></button>
                                    </div>
                                </div>
                                <div class="modal-footer m-auto">
                                    <button type="button" class="btn btn-sm btn-warning shadow" data-bs-dismiss="modal">Voltar <i class="bi bi-arrow-return-left"></i></button>
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
<div class="modal fade" id="novo" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelNovo" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-dark shadow-lg bg-white rounded-0">
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

<!-- Modal loading -->
<div class="modal fade" id="loading" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark shadow-lg">

            <div class="modal-body">
                <div class="d-flex justify-content-center text-success">
                    <div class="spinner-border" role="status"> </div>
                    <strong> Loading...</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

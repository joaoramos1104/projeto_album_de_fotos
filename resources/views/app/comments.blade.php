@extends('layouts.app.app')

@section('content')
<div class="container">
    <div class="card text-dark shadow">
        <div class="card-header bg-white">
            <div class="float-start p-1">
                <h5 class="card-title">{{ 'Comentários ' }} - {{ $theme->name_theme }}</h5>
            </div>
            <div class="float-end p-1">
                <i class="bi bi-image"></i>
            </div>
        </div>
        <div class="container-fluid bg-trans">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-4 col-sm-12 border-end border-darck m-auto">
                        <div class="container-fluid p-1">
                            <div class="card-body bg-trans rounded shadow small">
                                <div class="list-group shadow scroll-comments" id="scroll-comments">
                                    @foreach($theme->comments as $comment)
                                    <div class="list-group-item list-group-item-action add-comment">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $comment->name_user }}</h6>
                                            <small>{{ $comment->created_at->translatedFormat('l, d \d\e F, Y') }}</small>
                                        </div>
                                        <p class="mb-1 float-start text-success">{!! $comment->comments !!}</p>
                                    </div>
                                    @endforeach
                                </div>
                                    <form id="new-comment" method="post" action="{{ route('add_comentario') }}" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                                        <input type="hidden" name="name_user" value="{{ Auth::user()->name }}">
                                        <div class="input-group">
                                            <textarea type="text" class="form-control form-control-sm" name="comment" data-name="textarea-comment" id="textarea{{ $theme->id }}" placeholder="Adicionar comentário"></textarea>
                                        </div>
                                        <x-emojis/>
                                        <div class="col d-flex justify-content-center mt-2">
                                            <button type="submit"class="input-group-text btn btn-sm btn-outline-success shadow">Enviar <i class="bi bi-arrow-bar-right"></i></button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="row col">
                            <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @foreach($theme->hasImages as $key => $value)
                                        <button type="button" data-bs-target="#carousel{{ $key }}" data-bs-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide{{ $key }}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner p-3">
                                    @foreach($theme->hasImages as $key => $image)
                                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                            <img src="{{ env('APP_URL') }}/storage/{{ $image->photo_url }}" class="d-block comment-img img-fluid" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col card-footer d-flex justify-content-center mt-2">
                        <a href="{{ route('photos_album', $theme->album->id) }}" type="button" class="btn btn-sm btn-warning m-auto shadow m-3">Voltar <i class="bi bi-arrow-return-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app.app')

@section('content')
    <div class="content-vh">
    @foreach($albums as $album)
    <div class="container mb-3 text-center" id="content-album">
        <h3 class="mb-3 p-3 fst-italic"><strong>{{ $album->name }}</strong> <i class="bi bi-image"></i></h3>
        <div class="row justify-content-center">
            @foreach($album->themes as $theme)
            <div class="col-md-3 col-sm-12 p-3 m-auto">
                <div class="card border-0 text-center mt-3">
                    <a href="#" class="bg-card-img"><img src="@if(isset($theme->hasImages[0]->photo_url )){{ env('APP_URL') }}/storage/{{ $theme->hasImages[0]->photo_url }}@else {{ 'assets/img/R.png' }} @endif" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel{{ $theme->id }}"></a>
                    <div class="card-body mt-1">
                        <div class="mt-3">
                            <h5 class="card-title"><strong>{{ $theme->name_theme }}</strong></h5>
                            <p class="card-text"><strong>{{ $theme->description_theme }}</strong></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class=" dropdown no-arrow">
                            <button class="btn btn-sm btn-comment shadow dropdown-toggle" type="button" id="dropdownMenu{{ $theme->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Comentários
                                <span class="badge bg-info rounded-pill"  id="count-comments{{ $theme->id }}">{{ count($theme->comments) }}</span>
                            </button>
                            <ul class="dropdown-menu animated-fade-in" aria-labelledby="dropdownMenu{{ $theme->id }}">
                                <li>
                                    <h6 class="dropdown-header">Comentários </h6>
                                </li>
                                <div id="scroll-drop-comments{{ $theme->id }}" class="scroll-drop-comments">
                                    @foreach($theme->comments as $comment)
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div>
                                                    <span class="small text-gray-500">{{ $comment->name_user }}</span>
                                                    <p class="small text-gray-500 m-0">{{ $comment->created_at->translatedFormat('d \d\e F, Y') }}</p>
                                                    <p class="small text-success m-0">{!! $comment->comments !!}</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-center small" href="{{ route('show_comments', $theme->id) }}">Adicionar comnentários <i class="bi bi-plus"></i></a></li>
                            </ul>
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
                                <h3 class="text-light">{{ $theme->name_theme }}</h3>
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
            <hr class="border-bottom border-dark">
        </div>
    </div>
    @endforeach
    </div>
@endsection



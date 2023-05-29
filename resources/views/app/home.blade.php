@extends('layouts.app.app')

@section('content')
    <div class="container">
        <div id="carouselCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators indicator">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="text-dark"><i class="bi bi-arrow-left-circle"></i></span>
                </button>
                @foreach($albums as $key => $value)
                <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide{{ $key }}"></button>
                @endforeach
                <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="text-dark"><i class="bi bi-arrow-right-circle"></i></span>
                </button>
            </div>
            <div class="carousel-inner">
            @foreach($albums as $key => $album)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <div class="row p-3">
                        <div class="capa-album col-md-6 col-sm-12 float-start m-auto text-center p-3">
                            <a href="{{ route('photos_album', $album->id) }}"><img src="@if(isset($album->capa_album )){{ env('APP_URL') }}/storage/{{ $album->capa_album }}@else {{ 'assets/img/R.png' }} @endif" class="d-block w-100 rounded-custom shadow" alt="..."></a>
                        </div>
                        <div class="col-md-4 col-sm-12 float-end m-auto text-center p-3">
                            <h1 class="fw-bold" style="font-family: Calligraffitti;">Álbum : {{ $album->name }}</h1>
                            <p>{{ $album->descricao }}</p>
                            <a class="btn btn-sm btn-light mb-1 shadow" href="{{ route('photos_album', $album->id) }}" >Ver Fotos</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



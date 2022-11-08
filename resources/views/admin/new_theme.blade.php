@extends('layouts.admin.admin')
<style>

</style>
@section('content')
    <div class="content-vh">
        <div class="container">
            <div class="card text-dark shadow">
                <div class="card-header bg-white">
                    <div class="float-start p-3">
                        <h5 class="card-title">{{ 'Novo Tema ' }}</h5>
                    </div>
                    <div class="float-end p-3">
                        <i class="bi bi-image"></i>
                    </div>
                </div>
                <div class="container-fluid bg-white">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 border-end border-darck m-auto">
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
                                </form>
                            </div>

                            <div class="col-md-8 col-sm-12 scroll-photo-theme">
                                <div class="row p-3" id="content-theme-admin">
                                    @foreach($album->themes as $theme)
                                        <div class="card col-md-4 col-sm-12 border-0 text-center m-auto p-3">
                                            <a href="#" class="bg-card-img"><img src="@if(isset($theme->hasImages[0]->photo_url )){{ env('APP_URL') }}/storage/{{ $theme->hasImages[0]->photo_url }}@else {{ 'assets/img/R.png' }} @endif" class="card-img-top" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel{{ $theme->id }}"></a>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $theme->name_theme }}</h5>
                                                <p class="card-text">{{ $theme->description_theme }}</p>
                                                <a href="{{ route('excluir_tema', $theme->id) }}" class="btn btn-sm btn-danger shadow"
                                                   onclick="event.preventDefault();
                                                   document.getElementById('excluir_tema{{ $theme->id }}').submit();">Excluir <i class="bi bi-x"></i>
                                                </a>
                                                <div class="col-6 m-auto">
                                                    <form id="excluir_tema{{ $theme->id }}" action="{{ route('excluir_tema', $theme->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
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
                            </div>
                        </div>
                    </div>

                    <div class="col card-footer m-auto">
                        <a href="{{ route('admin') }}" type="button" class="btn btn-sm btn-warning m-auto shadow m-3">Voltar <i class="bi bi-arrow-return-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

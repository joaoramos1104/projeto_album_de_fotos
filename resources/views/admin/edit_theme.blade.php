@extends('layouts.admin.admin')
<style>

</style>
@section('content')
    <div class="container">
        <div class="card text-dark shadow">
            <div class="card-header bg-white">
                <div class="float-start p-3">
                    <h5 class="card-title">{{ 'Editar Tema ' }}</h5>
                </div>
                <div class="float-end p-3">
                    <i class="bi bi-image"></i>
                </div>
            </div>
            <div class="container-fluid bg-white">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 border-end border-darck m-auto">
                            <form id="formEditTheme" class="p-2" method="post" action="{{ route('editar_tema', $theme->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="m-1 input-group shadow">
                                    <span class="input-group-text" id="EditTema">Tema</span>
                                    <input type="text" class="form-control form-control-sm" aria-describedby="EditTema" name="name" value="{{ $theme->name_theme }}">
                                </div>
                                <div class="m-1 input-group shadow">
                                    <span class="input-group-text" id="description" >Descrição</span>
                                    <input type="text" class="form-control form-control-sm" aria-describedby="description" name="description" value="{{ $theme->description_theme }}">
                                </div>
                                <div class="col-2 m-auto">
                                    <button type="submit" class="input-group-text btn btn-sm btn-outline-success shadow">Salvar <i class="bi bi-check2"></i></button>
                                </div>
                            </form>
                            <form id="add_new_photo" method="post" action="{{ route('nova_foto') }}" enctype="multipart/form-data">
                                @csrf
                                <strong><p>Adicionar nova Foto</p></strong>
                                <div class="input-group shadow">
                                    <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                                    <input type="file" class="form-control form-control-sm" name="photo_url">
                                    <button type="submit" class="input-group-text btn btn-sm btn-outline-success">Enviar <i class="bi bi-check2"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-7 col-sm-12 scroll-photo-theme">
                            <div class="row col">
                                @foreach($theme->hasImages as $image)
                                    <div id="card-edit" class="card card-edit text-center">
                                        <img id="img-card-edit" src="{{ env('APP_URL') }}/storage/{{ $image->photo_url }}" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <button class="btn btn-sm btn-danger shadow"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('delete_photo{{$image->id}}').submit();">Excluir <i class="bi bi-x"></i>
                                            </button>
                                            <form id="delete_photo{{$image->id}}" action="{{ route('delete_photo', $image->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col card-footer m-auto">
                    <a href="{{ route('admin') }}" type="button" class="btn btn-sm btn-warning m-auto shadow m-3">Voltar <i class="bi bi-arrow-bar-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="container">
        <div class="card text-dark shadow">
            <div class="card-header bg-white">
                <div class="float-start p-3">
                    <h5 class="card-title">{{ 'Editar Tema ' }}</h5>
                </div>
                <div class="float-end p-3">
                    <i class="bi bi-image"></i>
                </div>
            </div>
            <div class="container-fluid bg-white">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-md-5 col-sm-12 border-end border-darck m-auto">
                        <form class="p-2" method="post" action="{{ route('editar_tema', $theme->id) }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="album_id" value="{{ $theme->id }}">
                            <div class="m-1 input-group shadow">
                                <span class="input-group-text" id="EditTema">Tema</span>
                                <input type="text" class="form-control form-control-sm" aria-describedby="EditTema" name="name" value="{{ $theme->name_theme }}">
                            </div>
                            <div class="m-1 input-group shadow">
                                <span class="input-group-text" id="inputDecricao" >Descrição</span>
                                <input type="text" class="form-control form-control-sm" aria-describedby="inputDecricao" name="description" value="{{ $theme->description_theme }}">
                            </div>
                            <div class="col-2 m-auto">
                                <button type="submit" class="input-group-text btn btn-sm btn-outline-success shadow" data-bs-dismiss="modal">Salvar <i class="bi bi-check2"></i></button>
                            </div>
                        </form>
                        <form method="post" action="{{ route('nova_foto') }}" enctype="multipart/form-data">
                            @csrf
                            <strong><p>Adicionar nova Foto</p></strong>
                            <div class="input-group shadow">
                                <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                                <input type="file" class="form-control form-control-sm" name="photo">
                                <button type="submit" class="input-group-text btn btn-sm btn-outline-success">Enviar <i class="bi bi-check2"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-7 col-sm-12 scroll-photo-theme">
                        <div class="row col">
                            @foreach($theme->hasImages as $image)
                                <div class="card card-edit text-center">
                                    <img src="{{ env('APP_URL') }}/storage/{{ $image->photo_url }}" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <button class="btn btn-sm btn-danger shadow"
                                                onclick="event.preventDefault();
                                                            document.getElementById('delete_photo{{$image->id}}').submit();">Excluir <i class="bi bi-x"></i>
                                        </button>
                                        <form id="delete_photo{{$image->id}}" action="{{ route('delete_photo', $image->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col card-footer">
                    <a href="{{ route('admin') }}" type="button" class="btn btn-sm btn-warning m-auto shadow mt-1">Voltar <i class="bi bi-arrow-bar-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    --}}
@endsection

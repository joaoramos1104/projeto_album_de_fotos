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
<div class="container mb-3 text-center">
    <div class="row justify-content-center">
        <h3 class="mb-1 p-3 fst-italic">Fotos com a família <i class="bi bi-image"></i></h3>
        <div class="mb-3 p-3">
            <button class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#add">Adicionar Tema e Fotos <i class="bi bi-image"></i></i></button>
        </div>
        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/7.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/2.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/5.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/3.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <hr class="border-bottom border-light">
    </div>
</div>

<div class="container mt-3 mb-3 text-center">
    <div class="row justify-content-center">
        <h3 class="text-center mb-3 p-3 fst-italic">Minhas Lembranças <i class="bi bi-image"></i></h3>
        <div class="mb-3 p-3">
            <button class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#add">Adicionar Tema e Fotos <i class="bi bi-image"></i></button>
        </div>
        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/6.jpg" class="card-img-top shadow " alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/1.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/9.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 p-3 m-auto">
            <div class="card border-0 text-center mt-3">
                <a href="#" class="bg-card-img"><img src="assets/img/8.jpg" class="card-img-top shadow" alt="..." data-bs-toggle="modal" data-bs-target="#imgCarousel"></a>
                <div class="card-body">
                    <h5 class="card-title">Tema</h5>
                    <p class="card-text">Descrição</p>
                    <a href="#" class="btn btn-sm btn-danger shadow">Excluir <i class="bi bi-x"></i></a>
                    <a href="#" class="btn btn-sm btn-light shadow" data-bs-toggle="modal" data-bs-target="#ModalEdit">Editar <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

    </div>
    <div class="container mt-3">
        <hr class="border-bottom border-light">
    </div>
</div>

<!-- Modal Carousel -->
<div class="modal fade" id="imgCarousel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content modal-carousel">
            <div class="modal-body">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner p-3">
                        <div class="carousel-item active">
                            <img src="assets/img/3.jpg" class="d-block modal-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/1.jpg" class="d-block modal-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/7.jpg" class="d-block modal-img" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer m-auto">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fechar <i class="bi bi-box-arrow-right"></i></i></button>
            </div>
        </div>
    </div>
</div>


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
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nome do novo Álbum" aria-label="Recipient's username" aria-describedby="button-addon">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button" id="button-addon">Salvar <i class="bi bi-check2-circle"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer m-auto">
                    <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal">Cancelar <i class="bi bi-box-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="ModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelEdit" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelEdit">Editar - Álbum Title</h5>
                <i class="bi bi-image"></i>
            </div>
            <div class="container-fluid">
                <div class="modal-body">
                    <div class="row col">
                        <div class="col-md-5 col-sm-12 border-end border-darck m-auto">
                            <form class="p-2">
                                <div class="m-1 input-group">
                                    <span class="input-group-text" id="EditTema">Tema</span>
                                    <input type="text" class="form-control form-control-sm" aria-describedby="EditTema" value="Tema">
                                </div>
                                <div class="m-1 input-group">
                                    <span class="input-group-text" id="inputDecricao" >Descrição</span>
                                    <input type="text" class="form-control form-control-sm" aria-describedby="inputDecricao" value="Descrição">
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
                            <div class="modal-footer m-auto">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal">Cancelar <i class="bi bi-box-arrow-right"></i></button>
                            </div>


                        </div>
                        <div class="col-md-7 col-sm-12 scroll">
                            <form>
                                <div class="row col">
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/1.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/2.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/3.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/4.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/5.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/6.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/7.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card card-edit text-center">
                                        <img src="assets/img/8.jpg" class="tabel-img" alt="...">
                                        <div class="card-body">
                                            <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Adicionar -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content text-dark">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="staticBackdropLabelAdd">Álbum title - Adicionar</h5>
                <i class="bi bi-image"></i>
            </div>
            <div class="container-fluid">
                <div class="modal-body">
                        <div class="row col">
                            <div class="col-md-5 col-sm-12 border-end border-darck m-auto">
                                <form>
                                    <div class="input-group m-1">
                                        <input type="file" class="form-control">
                                        <button type="submit" class="input-group-text btn btn-sm btn-outline-success" data-bs-dismiss="modal">Enviar <i class="bi bi-arrow-bar-right"></i></button>
                                    </div>

                                    <div class="row">
                                        <div class="m-1 input-group">
                                            <span class="input-group-text" id="EditTema">Tema</span>
                                            <input type="text" class="form-control form-control-sm" aria-describedby="EditTema" value="Tema">
                                        </div>
                                        <div class="m-1 input-group">
                                            <span class="input-group-text" id="inputDecricao" >Descrição</span>
                                            <input type="text" class="form-control form-control-sm" aria-describedby="inputDecricao" value="Descrição">
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

                            <div class="col-md-7 col-sm-12 scroll">
                                <div class="card card-edit text-center">
                                    <img src="assets/img/1.jpg" class="" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/2.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/3.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/4.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/5.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/6.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/7.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                                <div class="card card-edit text-center">
                                    <img src="assets/img/8.jpg" class="tabel-img" alt="...">
                                    <div class="card-body">
                                        <a href="#" type="button" class="btn btn-sm btn-outline-danger shadow">Excluir <i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

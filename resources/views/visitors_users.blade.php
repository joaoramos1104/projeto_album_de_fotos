@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row p-3">
            <div class="mt-1">
                <h5>Convidados e Usuários</h5>
                <div class="col">
                    <button class="btn btn-sm btn-success shadow" data-bs-toggle="modal" data-bs-target="#new-visitor">Novo Convite <i class="bi bi-envelope-check"></i></button>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-md-12 p-3 rounded shadow  bg-white">
                    <div class="table-responsive p-3">
                        <table id="table_user" class="table table-sm table-hover table-borderless small p-3" style="width: 100%">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Novo Convite -->
    <div class="modal fade" id="new-visitor" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelNewVisitor" aria-hidden="true">
        <div class="modal-dialog modal-lg shadow-lg rounded-0">
            <div class="modal-content text-dark">
                <div class="modal-header bg-white rounded-0">
                    <h5 class="modal-title" id="staticBackdropLabelNewVisitor">{{ 'Novos Convites ' }}</h5>
                    <i class="bi bi-envelope-check"></i>
                </div>
                <div class="container-fluid bg-white">
                    <div class="modal-body p-3">
                        <h3>Convidados e Usuários</h3>
                        <div class="row p-3">
                            <div class="col-12 col-sm-12 p-3 m-auto">
                                <form class="row g-3" id="formCreateVisitorUser" action="{{ route('create_visitor_user') }}">
                                    @csrf
                                    <div class="col-md-7">
                                        <label class="form-label">Nome</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                            <input type="text" class="form-control form-control-sm" name="name" value="" data-name="formCreateVisitorUser" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label  class="form-label">Telefone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <input type="text" class="form-control form-control-sm" name="phone_visitor_user" value="" data-name="formCreateVisitorUser" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="email" class="form-control form-control-sm" aria-describedby="inputGroupPrepend" name="email" value="" data-name="formCreateVisitorUser" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" class="form-control form-control-sm" name="password" data-name="formCreateVisitorUser" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Confirmar Senha</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" class="form-control form-control-sm" name="password_confirmation" data-name="formCreateVisitorUser" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select form-select-sm" name="status_visitor_user" required>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 ms-3">
                                        <label class="form-label">Visitante</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="visitor_user" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 ms-3">
                                        <label class="form-label">Administrador</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="admin_user" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="email_send_visitor">
                                            <label class="form-check-label">
                                                Enviar convite - E-mail.
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col">
                                        <div class="col float-end">
                                            <button type="button" id="cleanFormCreateUserVisitor" class="btn btn-sm btn-warning m-1 shadow" data-bs-dismiss="modal">Cancelar <i class="bi bi-x"></i></button>
                                            <button class="btn btn-sm btn-success m-1 shadow" type="submit">Salvar <i class="bi bi-check2"></i></button>
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

@endsection


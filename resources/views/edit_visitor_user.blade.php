@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card text-dark shadow">
            <div class="card-header bg-white">
                <div class="float-start p-3">
                    <h5 class="card-title">{{ 'Editar Convites ' }}</h5>
                </div>
                <div class="float-end p-3">
                    <i class="bi bi-person-bounding-box"></i>
                </div>
            </div>
            <div class="container-fluid bg-white">
                <div class="card-body p-3">
                    <h3>Editar</h3>
                    <div class="row p-3">
                        <div class="col-12 col-sm-12 p-3 m-auto">
                            <form class="row g-3" id="formEditVisitorUser" action="{{ route('update_visitor_user',$data->id ) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-7">
                                    <label class="form-label">Nome</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                                        <input type="text" class="form-control form-control-sm" name="name" value="{{ $data->name }}" required>
                                        <input type="hidden" class="form-control form-control-sm" name="id" value="{{ $data->id }}" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label  class="form-label">Telefone</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" class="form-control form-control-sm" name="phone" value="{{ $data->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">E-mail</label>
                                    <div class="input-group">
                                        <span class="input-group-text">@</span>
                                        <input type="email" class="form-control form-control-sm" aria-describedby="inputGroupPrepend" name="email" value="{{ $data->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nova Senha</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control form-control-sm" name="password" data-name="VisitorUserPassword">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirmar Nova Senha</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" class="form-control form-control-sm" name="password_confirmation" data-name="VisitorUserPassword">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select form-select-sm" name="status" required>
                                        <option value="{{ $data->active }}">Ativo</option>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>
                                <div class="col-md-3 ms-3">
                                    <label class="form-label">Visitante</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="visitor" type="checkbox" @if($data->visitor === 1) checked @else  @endif>
                                        <label class="form-check-label"></label>
                                    </div>
                                </div>
                                <div class="col-md-3 ms-3">
                                    <label class="form-label">Administrador</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="admin" type="checkbox" @if($data->admin === 1) checked @else @endif>
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
                                        <a  href="{{ route('visitors_users') }}" type="button" class="btn btn-sm btn-warning m-1">Cancelar <i class="bi bi-x"></i></a>
                                        <button class="btn btn-sm btn-success m-1" type="submit">Salvar <i class="bi bi-check2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

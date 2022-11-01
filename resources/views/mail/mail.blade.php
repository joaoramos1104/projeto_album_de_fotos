

<div class="card text-center">
{{--    <div class="card-header">--}}
{{--        <strong class="nav-link fst-italic"><a  href="#"><img src="{{ url('assets/img/logo/logo3.png') }}" width="30px" alt=""{{ 'Meu Álbum' }}</strong>--}}
{{--    </div>--}}
    <div class="card-body">
        <h5 class="card-title">Olá {{ $data[0]['name'] }}!</h5>
        @if($data[0]['active'] == 0)
            <p class="card-text">Recebemos sua solicitação, em breve você receberá a confirmação de cadastro.</p>
            <p class="card-text"><strong>Status:</strong>Aguardando aprovação.</p>
        @else
            <p class="card-text">Solicitação aprovada!</p>
            <p class="card-text"><strong>E-mail:</strong> {{ $data[0]['email'] }}</p>
            <p class="card-text"><strong>Telefone:</strong> {{ $data[0]['phone'] }}</p>
            <p class="card-text"><strong>Senha:</strong> {{ $data[0]['password'] }}</p>
            <a href="{{ route('/') }}" class="btn btn-success">Fazer login</a>
        @endif

    </div>
    <div class="card-footer text-muted">
        2 days ago
    </div>
</div>





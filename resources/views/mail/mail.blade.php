<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email | Confimação Registro</title>

    <style>
        body{
            font-family: "Muli", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", "bootstrap-icons";
            background: #dee2e6;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            width: 80%;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 20px;
            padding: 5%;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;

        }

        .card-body {
            flex: 1 1 auto !important;
            padding: 2rem 2rem !important;
        }


        .card-title {
            margin-bottom: .5rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
        }
        .btn-success{
            color: #fff !important;
            background-color: darkgreen !important;
            border-color: #035203 !important;
        }

        .btn {
            display: inline-block !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: #fff !important;
            text-align: center !important;
            text-decoration: none !important;
            vertical-align: middle !important;
            cursor: pointer !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            user-select: none !important;
            border: 1px solid transparent !important;
            padding: .375rem .75rem !important;
            font-size: 1rem !important;
            box-shadow: 0 .5rem 1rem rgba(107, 109, 108, 0.377)!important;
            border-radius: 5px;
        }

        p, h4{
            color: #212529;
            text-decoration: none;
        }
        .fst-italic {
            font-style: italic!important;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .social-icon {
            background-color: rgb(225, 218, 218) !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 3.5rem;
            width: 3.5rem;
            border-radius: 100%;
            font-size: 1.5rem;
            margin-right: 1.5rem;

        }

        .text-success{
            color: darkgreen;
        }

        .text-warning{
            color: rgb(228, 181, 28);
        }

        .card-footer {
            padding: 0.5rem 1rem;
        }

        .text-center{
            text-align: center;
        }
        .m-auto{
            margin: auto;
        }

    </style>
</head>
<body>

<div class="card text-center">
    <div class="card-header">
        <strong class="nav-link fst-italic"><a  href="#"><img src="{{ $message->embed('assets/img/logo/logo-56x50.png') }}" alt="Logo"></a> Meu Álbum</strong>
    </div>
    <div class="card-body">
        <h4>Olá {{ $data[0]['name'] }}!</h4>
        @if($data[0]['active'] == 0)
        <p >Recebemos sua solicitação, em breve você receberá a confirmação de cadastro.</p>
        <p class="text-warning">Aguardando aprovação.</p>
        @else
        <p class="text-success">Solicitação aprovada!</p>
        <p class="card-text"><strong>E-mail: </strong>{{ $data[0]['email'] }}</p>
        <p class="card-text"><strong>Telefone: </strong>{{ $data[0]['phone'] }}</p>
            @if(isset($data[0]['password']))
            <p class="card-text"><strong>Sua senha: </strong> {{ $data[0]['password'] }}</p>
            @endif
        <a href="{{ route('/') }}" class="btn btn-success">LOGIN</a>
        <div>
            <a href="{{ route('/') }}" class="text-warning">Esqueci minha senha.</a>
        </div>
        @endif

    </div>
    <div class="card-footer text-center">
        <ul class="nav m-auto">
            <li class="nav-item m-auto">
                <a class="social-icon" href="https://linkedin.com/in/joao-f-ramos1104" target="_blank"><img src="{{ $message->embed('assets/img/svg/linkedin.svg') }}"></a>
            </li>
            <li class="nav-item m-auto">
                <a class="social-icon" href="https://github.com/joaoramos1104" target="_blank"><img src="{{ $message->embed('assets/img/svg/github.svg') }}"></a>
            </li>
            <li class="nav-item m-auto">
                <a class="social-icon" href="https://www.instagram.com/f.ramosjoao" target="_blank"><img src="{{ $message->embed('assets/img/svg/instagram.svg') }}"></a>
            </li>
            <li class="nav-item m-auto">
                <a class="social-icon" href="https://twitter.com/joaoramos1988" target="_blank"><img src="{{ $message->embed('assets/img/svg/twitter.svg') }}"></a>
            </li>
        </ul>
    </div>
</div>

</body>
</html>


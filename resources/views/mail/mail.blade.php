<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        /* Base */

        body,
        body *:not(html):not(style):not(br):not(tr):not(code) {
            box-sizing: border-box !important;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif !important,
            'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol' !important;
            position: relative !important;
        }

        body {
            -webkit-text-size-adjust: none !important;
            background-color: #ffffff !important;
            color: #718096 !important;
            height: 100% !important;
            line-height: 1.4 !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        p,
        ul,
        ol,
        blockquote {
            line-height: 1.4 !important;
            text-align: left !important;
        }

        a {
            color: #3869d4 !important;
        }

        a img {
            border: none !important;
        }

        /* Typography */

        h1 {
            color: #3d4852 !important;
            font-size: 18px !important;
            font-weight: bold !important;
            margin-top: 0;
            text-align: left !important;
        }

        h2 {
            font-size: 16px !important;
            font-weight: bold !important;
            margin-top: 0 !important;
            text-align: left !important;
        }

        h3 {
            font-size: 14px !important;
            font-weight: bold !important;
            margin-top: 0 !important;
            text-align: left !important;
        }

        p {
            font-size: 16px !important;
            line-height: 1.5em !important;
            margin-top: 0 !important;
            text-align: left !important;
        }

        p.sub {
            font-size: 12px !important;
        }

        img {
            max-width: 100% !important;
        }

        /* Layout */

        .wrapper {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 100% !important;
            background-color: #edf2f7 !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .content {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* Header */

        .header {
            padding: 25px 0 !important;
            text-align: center !important;
        }

        .header a {
            color: #3d4852 !important;
            font-size: 19px !important;
            font-weight: bold !important;
            text-decoration: none !important;
        }

        /* Logo */

        .logo {
            height: 75px !important;
            max-height: 75px !important;
            width: 75px !important;
        }

        /* Body */

        .body {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 100% !important;
            background-color: #edf2f7 !important;
            border-bottom: 1px solid #edf2f7 !important;
            border-top: 1px solid #edf2f7 !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .inner-body {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 570px !important;
            background-color: #ffffff !important;
            border-color: #e8e5ef !important;
            border-radius: 2px !important;
            border-width: 1px !important;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015) !important;
            margin: 0 auto !important;
            padding: 0 !important;
            width: 570px !important;
        }

        /* Subcopy */

        .subcopy {
            border-top: 1px solid #e8e5ef !important;
            margin-top: 25px !important;
            padding-top: 25px !important;
        }

        .subcopy p {
            font-size: 14px !important;
        }

        /* Footer */

        .footer {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 570px !important;
            margin: 0 auto !important;
            padding: 20px !important;
            text-align: center !important;
            width: 570px !important;
        }

        .footer p {
            color: #b0adc5 !important;
            font-size: 12px !important;
            text-align: center !important;
        }

        .footer a {
            color: #b0adc5 !important;
            text-decoration: underline !important;
        }

        /* Tables */

        .table table {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 100% !important;
            margin: 30px auto !important;
            width: 100% !important;
        }

        .table th {
            border-bottom: 1px solid #edeff2 !important;
            margin: 0 !important;
            padding-bottom: 8px !important;
        }

        .table td {
            color: #74787e !important;
            font-size: 15px !important;
            line-height: 18px !important;
            margin: 0 !important;
            padding: 10px 0 !important;
        }

        .content-cell {
            max-width: 100vw !important;
            padding: 32px !important;
        }

        /* Buttons */

        .action {
            -premailer-cellpadding: 0 !important;
            -premailer-cellspacing: 0 !important;
            -premailer-width: 100% !important;
            margin: 30px auto !important;
            padding: 0 !important;
            text-align: center !important;
            width: 100% !important;
        }

        .button {
            -webkit-text-size-adjust: none !important;
            border-radius: 4px !important;
            color: black !important;
            display: inline-block !important;
            overflow: hidden !important;
            text-decoration: none !important;
        }

        .button-blue,
        .button-primary {
            background-color: #2d3748 !important;
            border-bottom: 8px solid #2d3748 !important;
            border-left: 18px solid #2d3748 !important;
            border-right: 18px solid #2d3748 !important;
            border-top: 8px solid #2d3748 !important;
        }

        .button-green,
        .button-success {
            background-color: #48bb78 !important;
            border-bottom: 8px solid #48bb78 !important;
            border-left: 18px solid #48bb78 !important;
            border-right: 18px solid #48bb78 !important;
            border-top: 8px solid #48bb78 !important;
        }

        .button-red,
        .button-error {
            background-color: #e53e3e !important;
            border-bottom: 8px solid #e53e3e !important;
            border-left: 18px solid #e53e3e !important;
            border-right: 18px solid #e53e3e !important;
            border-top: 8px solid #e53e3e !important;
        }

        /* Panels */

        .panel {
            border-left: #2d3748 solid 4px !important;
            margin: 21px 0 !important;
        }

        .panel-content {
            background-color: #edf2f7 !important;
            color: #718096 !important;
            padding: 16px !important;
        }

        .panel-content p {
            color: #718096 !important;
        }

        .panel-item {
            padding: 0 !important;
        }

        .panel-item p:last-of-type {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        /* Utilities */

        .break-all {
            word-break: break-all !important;
        }

        .text-success{
            color: darkgreen !important;
        }

        .text-warning{
            color: rgb(228, 181, 28) !important;
        }

        .social-icon {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 10px;
            font-size: 1.5rem !important;
            margin-right: 1.5rem !important;
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
            color: black !important;
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

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="header">
                        <a href="{{ route('/') }}" style="display: inline-block;">
                                <img src="{{ $message->embed('assets/img/logo/logo-56x50.png') }}" class="logo" alt="Meu álbum">
                                Meu Álbum
                        </a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell">
                                    <h4>Olá {{ $data[0]['name'] }}!</h4>
                                    <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                        <tr>
                                            <td>
                                                <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                    <tr>
                                                        <td align="center">
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tr>
                                                                    <td align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td align="center" class="content-cell">
                                                                                    @if($data[0]['active'] == 0)
                                                                                        <h4 >Recebemos sua solicitação, em breve você receberá a confirmação de cadastro.</h4>
                                                                                        <h4 class="text-warning">Aguardando aprovação.</h4>
                                                                                    @else
                                                                                        <h4 class="text-success">Solicitação aprovada!</h4>
                                                                                        <p><strong>E-mail: </strong>{{ $data[0]['email'] }}</p>
                                                                                        <p><strong>Telefone: </strong>{{ $data[0]['phone'] }}</p>
                                                                                        @if(isset($data[0]['password']))
                                                                                            <p><strong>Sua senha: </strong> {{ $data[0]['password'] }}</p>
                                                                                        @endif
                                                                                        <div align="center">
                                                                                            <a href="{{ route('/') }}" class="text-warning"  target="_blank" rel="noopener">Esqueci minha senha.</a>
                                                                                        </div>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <a href="{{ route('/') }}" type="button" class="btn button-green" target="_blank" rel="noopener">LOGIN</a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                            <td align="center" class="content-cell">
                                <a class="social-icon" href="https://linkedin.com/in/joao-f-ramos1104" target="_blank"><img src="{{ $message->embed('assets/img/logo/linkedin.png') }}"></a>

                                <a class="social-icon" href="https://github.com/joaoramos1104" target="_blank"><img src="{{ $message->embed('assets/img/logo/github.png') }}"></a>

                                <a class="social-icon" href="https://www.instagram.com/f.ramosjoao" target="_blank"><img src="{{ $message->embed('assets/img/logo/instagram.png') }}"></a>

                                <a class="social-icon" href="https://twitter.com/joaoramos1988" target="_blank"><img src="{{ $message->embed('assets/img/logo/twitter.png') }}"></a>
                            </td>
                                <tr class="content-cell" align="center">
                                    <td>
                                        © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
                                    </td>
                                </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

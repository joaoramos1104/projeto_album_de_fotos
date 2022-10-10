<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Album de Fotos</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap-icons-1.9.1/bootstrap-icons.css">

    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('assets/css/normalize/normalize.css') }}">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />

    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    body{
        background: linear-gradient(to bottom,
        rgba(93, 100, 100, 0.767) 0%, rgba(52, 32, 73, 0.685) 100%), url(assets/img/4.jpg) no-repeat !important;
        background-position: center !important;
        background-attachment:fixed !important;
        background-size: cover !important;
        }
    </style>

</head>
    <body>
    <main>
        @yield('content')
    </main>
        <script src="{{ asset('assets/js/jquery-3.6.1.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

{{--    @hasSection("javascript")--}}
{{--        @yield('javascript')--}}
{{--    @endif--}}
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });

            $(function (){
                $('form[name="formLogin"]').submit(function (event){
                    event.preventDefault()
                    $.ajax({
                        data: $(this).serialize(),
                        url: "{{ route('login') }}",
                        type: "post",
                        dataType: 'json',
                        success: function (response){
                            if(response.success.success === true){
                                window.location.href = "{{ route('home') }}"
                            } else {
                                // $('.messageBox').append('<strong>Erro </strong>'+ response.message.message)
                                $('.messageBox').append(
                                    '<div class=" mt-1 alert alert-warning alert-dismissible fade show" role="alert"><strong><i class="bi bi-exclamation-circle"> </i> '
                                    + response.message.message +
                                    '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                                )
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>

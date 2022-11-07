<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Album de Fotos</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo/logo3.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap-icons-1.9.1/bootstrap-icons.css') }}">

    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('assets/css/normalize/normalize.css') }}">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

     <!-- animate CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

     <!-- notification CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/notification/notification.css') }}">

</head>

<body>
<main>
    <x-navbar />
    @yield('content')
    <x-footer />

</main>
<script src="{{ asset('assets/js/jquery/jquery-3.6.1.js') }}"></script>
<script src="{{ asset('assets/js/popperjs/popperjs-2.9.2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<!--  notification JS -->
<script src="{{ asset('assets/js/notification/bootstrap-growl.min.js') }}"></script>

<!-- app.js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>

    @if(isset($theme->id))
    $( ".emojis" ).click(function() {
        var emoji = $( this ).text()
        for (let i = 0; i <= {{ $theme->id }}; i++ ){
            $('#textarea'+i).val($('#textarea'+i).val() + emoji)
        }
    })
    @endif

</script>
</body>
</html>

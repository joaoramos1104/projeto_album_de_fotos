<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Album de Fotos - Administrador</title>
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

    <!-- Data Tables css -->
    <link rel="stylesheet" href="{{ asset('assets/css/data-tables/data-tables.css') }}">

    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!-- notification CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/notification/notification.css') }}">

</head>
<body>
<main>
    @yield('content')
</main>

<script src="{{ asset('assets/js/jquery/jquery-3.6.1.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<!-- Data Tables js -->
<script src="{{ asset('assets/js/data-tables/jquery-data-tables.min.js') }}"></script>
<script src="{{ asset('assets/js/data-tables/data-tables-act.js') }}"></script>

<!--  notification JS -->
<script src="{{ asset('assets/js/notification/bootstrap-growl.min.js') }}"></script>
<script src="{{ asset('assets/js/notification/notification-active.js') }}"></script>

<script src="{{ asset('assets/js/notification/notify.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    $(function (){
        $('form[name="formVisitorUser"]').submit(function (event){
            event.preventDefault()
            $.ajax({
                data: $(this).serialize(),
                url: "{{ route('create_visitor_user') }}",
                type: "post",
                dataType: 'json',
                success: function (response){
                    function notify(from, align, icon, type, animIn, animOut){
                        $.growl({
                            title: ' Sucesso: ',
                            message: 'Registro realizado!',
                        },{
                            element: 'body',
                            type: type,
                            allow_dismiss: true,
                            placement: {
                                from: from,
                                align: align
                            },
                            offset: {
                                x: 20,
                                y: 85
                            },
                            spacing: 10,
                            z_index: 2031,
                            delay: 2500,
                            timer: 5000,
                            url_target: '_blank',
                            mouse_over: false,
                            animate: {
                                enter: animIn,
                                exit: animOut
                            },
                            icon_type: 'class',
                            template:
                                '<div class="alert alert-success alert-dismissable growl-animated animated fadeInDown" role="alert">'+
                                '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                                '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>'+
                                '</div>'
                        });

                    };

                    $( function(){
                        var nFrom = $(this).attr('data-from');
                        var nAlign = $(this).attr('data-align');
                        var nIcons = $(this).attr('data-icon');
                        var nType = $(this).attr('data-type');
                        var nAnimIn = $(this).attr('data-animation-in');
                        var nAnimOut = $(this).attr('data-animation-out');

                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
                    });
                    $('[data-name="formVisitorUser"]').val('');

                },
                error: function (response){
                    function notify(from, align, icon, type, animIn, animOut){
                        $.growl({
                            title: ' Error: ',
                            message: response.responseJSON.message,
                        },{
                            element: 'body',
                            type: type,
                            allow_dismiss: true,
                            placement: {
                                from: from,
                                align: align
                            },
                            offset: {
                                x: 20,
                                y: 85
                            },
                            spacing: 10,
                            z_index: 2031,
                            delay: 2500,
                            timer: 5000,
                            url_target: '_blank',
                            mouse_over: false,
                            animate: {
                                enter: animIn,
                                exit: animOut
                            },
                            icon_type: 'class',
                            template:
                                '<div class="alert alert-danger alert-dismissable growl-animated fadeInDown" role="alert">'+
                                '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                                '<button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="alert" aria-label="Close"></button>'+
                                '</div>'
                        });

                    };

                    $( function(){
                        var nFrom = $(this).attr('data-from');
                        var nAlign = $(this).attr('data-align');
                        var nIcons = $(this).attr('data-icon');
                        var nType = $(this).attr('data-type');
                        var nAnimIn = $(this).attr('data-animation-in');
                        var nAnimOut = $(this).attr('data-animation-out');

                        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
                    });

                }

            });
        });
    });
</script>
</body>
</html>

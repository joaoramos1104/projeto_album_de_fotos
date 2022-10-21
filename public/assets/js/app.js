

// Formulário criação de novo convite e usuário. -- visitor_user
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
            url: "/create_visitor_user",
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

$("#cleanFormCresteUserVisitor").click(function(){
    $('[data-name="formVisitorUser"]').val('');
});

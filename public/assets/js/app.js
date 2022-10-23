
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
});

// Form Create Visitor User
$(function (){
    $('#formCreateVisitorUser').submit(function (event){
        event.preventDefault()
        url = document.getElementById('formCreateVisitorUser').action;
        $.ajax({
            data: $(this).serialize(),
            url: url,
            type: "post",
            dataType: 'json',
            success: function (response){
                function notify(from, align, icon, type, animIn, animOut){
                    $.growl({
                        title: ' <i class="bi bi-check2-square"></i> ',
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
                            '<div class="alert alert-success" role="alert">'+
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
                $(function(){
                    $('[data-name="formCreateVisitorUser"]').val('');
                });
            },
            error: function (response){
                function notify(from, align, icon, type, animIn, animOut){
                    $.growl({
                        title: ' <i class="bi bi-exclamation-circle"> </i> ',
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
                            '<div class="alert alert-danger" role="alert">'+
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

$("#cleanFormCreateUserVisitor").click(function(){
    $('[data-name="formCreateVisitorUser"]').val('');
});


// Form Edit Visitor User
$(function (){
    $('#formEditVisitorUser').submit(function (event){
        event.preventDefault()
        url = document.getElementById("formEditVisitorUser").action;
        $.ajax({
            data: $(this).serialize(),
            url: url,
            type: 'post',
            dataType: 'json',
            success: function (response) {
                console.log(response)
                function notify(from, align, icon, type, animIn, animOut) {
                    $.growl({
                        title: ' <i class="bi bi-check2-square"></i> ',
                        message: 'Registro Atualizado com Sucesso!',
                    }, {
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
                            '<div class="alert alert-success" role="alert">' +
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>' +
                            '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                    });

                };

                $(function () {
                    var nFrom = $(this).attr('data-from');
                    var nAlign = $(this).attr('data-align');
                    var nIcons = $(this).attr('data-icon');
                    var nType = $(this).attr('data-type');
                    var nAnimIn = $(this).attr('data-animation-in');
                    var nAnimOut = $(this).attr('data-animation-out');

                    notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
                });

                $(function(){
                    $('[data-name="VisitorUserPassword"]').val('');
                });

            },
            error: function (response){
                function notify(from, align, icon, type, animIn, animOut){
                    $.growl({
                        title: ' <i class="bi bi-exclamation-circle"> </i> ',
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
                            '<div class="alert alert-danger" role="alert">'+
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

// Check
$('#active').click(function () {
    if ($("#active").prop("checked") == true) {
        $( ".strong-active" ).remove();
        $( ".activelabel" ).append( "<strong class='strong-active'>Ativo</strong>" );
    } else {
        $( ".strong-active" ).remove();
        $( ".activelabel" ).append( "<strong class='strong-active'>Inativo</strong>" );

    }
});
$('#visitor').click(function () {
    if ($("#visitor").prop("checked") == true) {
        $( ".strong-visitor" ).remove();
        $( ".visitorlabel" ).append( "<strong class='strong-visitor'>Sim</strong>" );
    } else {
        $( ".strong-visitor" ).remove();
        $( ".visitorlabel" ).append( "<strong class='strong-visitor'>Não</strong>" );

    }
});
$('#admin').click(function () {
    if ($("#admin").prop("checked") == true) {
        $( ".strong-admin" ).remove();
        $( ".adminlabel" ).append( "<strong class='strong-admin'>Sim</strong>" );
    } else {
        $( ".strong-admin" ).remove();
        $( ".adminlabel" ).append( "<strong class='strong-admin'>Não</strong>" );

    }
});

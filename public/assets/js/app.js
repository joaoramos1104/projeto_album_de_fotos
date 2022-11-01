
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
});


// notification
function notification (title, message, template){
    function notify(from, align, icon, type, animIn, animOut){
        $.growl({
            title: title,
            message: message,
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: "top",
                align: "right"
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
            template: template
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

//------------------------------------------------------------------

// Form Create Visitor User
$(function (){
    $('#formCreateVisitorUser').submit(function (event){
        event.preventDefault()
        var url = $(this).attr("action");
        $.ajax({
            data: $(this).serialize(),
            url: url,
            type: "post",
            dataType: 'json',

            success: function (response){
                title = ' <i class="bi bi-check2-square"></i> '
                message = 'Registro realizado com sucesso!'
                template =
                            '<div class="alert alert-success" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)

                $(function(){
                    $('[data-name="formCreateVisitorUser"]').val('');
                });
            },
            error: function (response){
                title = ' <i class="bi bi-exclamation-circle"> </i> '
                message = response.responseJSON.message
                template =
                            '<div class="alert alert-danger" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)
            }

        });
    });

    $("#cleanFormCreateUserVisitor").click(function(){
        $('[data-name="formCreateVisitorUser"]').val('');
    });
});

// Form Edit Visitor User
$(function () {
    $('#formEditVisitorUser').submit(function (event) {
        event.preventDefault()
        var url = $(this).attr("action");
        $.ajax({
            data: $(this).serialize(),
            url: url,
            type: 'post',
            dataType: 'json',
            success: function (response) {

                title = ' <i class="bi bi-check2-square"></i> '
                message = 'Registro atualizado com sucesso!'
                template =
                            '<div class="alert alert-success" role="alert">' +
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>' +
                            '</div>'
                notification(title, message, template)
                $('[data-name="VisitorUserPassword"]').val('');

                if (response.message){
                    $('#message-email').append(
                        '<div id="message-alert" class="alert alert-success alert-dismissible fade show" role="alert">' +
                        ' <strong>Sucesso!</strong> E-mail enviado com sucesso.' +
                        '</div>'
                    )

                    setInterval(function () {
                        $("#message-alert").fadeTo(500, 0).slideUp(500, function(){
                            $("#message-alert").remove();
                        });
                    },5000);
                }
            },
            error: function (response) {
                title = ' <i class="bi bi-exclamation-circle"> </i> '
                message = response.responseJSON.message
                template =
                            '<div id="notification" class="alert alert-danger" role="alert">' +
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>' +
                            '</div>'

                notification(title, message, template)
            }

        });
    });

// Check
    $('#active').click(function () {
        if ($("#active").prop("checked") == true) {
            $(".strong-active").remove();
            $(".activelabel").append("<strong class='strong-active'>Ativo</strong>");
        } else {
            $(".strong-active").remove();
            $(".activelabel").append("<strong class='strong-active'>Inativo</strong>");

        }
    });
    $('#visitor').click(function () {
        if ($("#visitor").prop("checked") == true) {
            $(".strong-visitor").remove();
            $(".visitorlabel").append("<strong class='strong-visitor'>Sim</strong>");
        } else {
            $(".strong-visitor").remove();
            $(".visitorlabel").append("<strong class='strong-visitor'>Não</strong>");

        }
    });
    $('#admin').click(function () {
        if ($("#admin").prop("checked") == true) {
            $(".strong-admin").remove();
            $(".adminlabel").append("<strong class='strong-admin'>Sim</strong>");
        } else {
            $(".strong-admin").remove();
            $(".adminlabel").append("<strong class='strong-admin'>Não</strong>");

        }
    });
});

// New Theme
$(function () {
    $('#new-theme').submit(function (event)  {
        event.preventDefault()
        var url = $(this).attr("action");
        var formData = new FormData($(this)[0])
        var form = formData

        $.ajax({
            data: form,
            url: url,
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,

            beforeSend: function () {
                  $('#loading').modal('show');
            },

            success: function (response) {
                console.log(response)
                title = ' <i class="bi bi-check2-square"></i> '
                message = 'Foto adicionada com sucesso!'
                template =
                            '<div class="alert alert-success" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)

                // recarregar a div
                 $("#content-album").load(location.href + " #content-album");
                $('[data-name="form-new-theme"]').val('');
            },

            error: function (response) {
                console.log(response)
                title = ' <i class="bi bi-exclamation-circle"> </i> '
                message = response.responseJSON.message
                template =
                            '<div class="alert alert-danger" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)
            },

            complete: function(){
                $('#loading').modal('hide');
            }

        })
    })

});

// Edit theme
$(function (){
    $('#formEditTheme').submit(function (event) {
        event.preventDefault()
        url = $(this).attr("action")
        $.ajax({
            data: $(this).serialize(),
            url: url,
            type: 'post',
            dataType: 'json',
            success: function (response) {
                title = ' <i class="bi bi-check2-square"></i> '
                message = 'Tema atualizado com sucesso!'
                template =
                            '<div class="alert alert-success" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)
            },
            error: function (response) {
                title = ' <i class="bi bi-exclamation-circle"> </i> '
                message = response.responseJSON.message
                template =
                            '<div class="alert alert-danger" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)
            }
        })

    })

    //Adicionar nova foto
    $('#add_new_photo').submit(function (event) {
        event.preventDefault()
        var url = $(this).attr("action")
        var form = $('#add_new_photo').closest('form')
        var form_data = new FormData(form[0])

        $.ajax({
            data: form_data,
            url: url,
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response)
                title = ' <i class="bi bi-check2-square"></i> '
                message = 'Foto adicionada com sucesso!'
                template =
                            '<div class="alert alert-success" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)

                // recarregar a div
                $("#photo_edit").load(location.href + " #photo_edit");
                $('[data-name="photo_url"]').val('');
            },
            error: function (response) {
                title = ' <i class="bi bi-exclamation-circle"> </i> '
                message = response.responseJSON.message
                template =
                            '<div class="alert alert-danger" role="alert">'+
                            '<strong data-growl="title"></strong> <span data-growl="message"></span>'+
                            '</div>'

                notification(title, message, template)
            }
        })
    })

});



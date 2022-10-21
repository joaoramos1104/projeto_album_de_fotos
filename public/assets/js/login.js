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
            url: "/login",
            type: "post",
            dataType: 'json',
            success: function (response){
                window.location.href = response.intended
            },
            error: function (response){
                response.responseJSON.message ='Os dados informados não conferem! Verifique se os dados estão corretos e se seu convite foi aceito.'
                var message = response.responseJSON.message
                $('.messageBox').append(
                    '<div class=" mt-1 alert alert-danger shadow alert-dismissible fade show" role="alert"><strong><i class="bi bi-exclamation-circle"> </i> '
                    + message +
                    '</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                )
            }

        });
    });
});

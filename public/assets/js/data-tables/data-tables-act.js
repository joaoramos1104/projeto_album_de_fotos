(function ($) {
    "use strict";
    $(document).ready(function () {
        $.ajax({
            url: "/visitor-user",
            dataType: 'json',
            success: function (response) {
                var dataSet = [];
                $.each(response, function (key, value) {
                    if(value.admin == 1){
                        value.admin = 'Sim'
                    } else {
                        value.admin = 'Não'
                    }
                    if(value.visitor == 1){
                        value.visitor = 'Sim'
                    } else {
                        value.visitor = 'Não'
                    }
                    if(value.active == 1){
                        value.active = 'Ativo'
                    } else {
                        value.active = 'Inativo'
                    }

                    dataSet.push([
                        value.id,
                        value.name,
                        value.email,
                        value.phone,
                        value.admin,
                        value.visitor,
                        value.active,
                    ]);

                })
                $('#table_user').DataTable( {
                    "language": {
                        "lengthMenu": "Exibir _MENU_ Por Página",
                        "zeroRecords": "Nothing found - sorry",
                        "info": " Página _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "sSearchPlaceholder": "Buscar...",
                    },

                    data: dataSet,
                    columns: [
                        {title: '#'},
                        {title: 'Nome'},
                        {title: 'E-mail'},
                        {title: 'Telefone'},
                        {title: 'Admin'},
                        {title: 'Visitante'},
                        {title: 'status'},
                    ]
                } );
            },
        });
    } );

})(jQuery);

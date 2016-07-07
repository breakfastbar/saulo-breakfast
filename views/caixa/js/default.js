$(function () {

//    $.get('credito/listarCredito', function (o) {
//        for (var i = 0; i < o.length; i++)
//        {
//            $('#listCreditos').html('<div>' + o[i].descricao + '<a class="del" rel="' + o[i].codCredito + '" href="#">X</a></div>');
//        }
//    });



    $.datepicker.formatDate("yy-mm-dd", new Date(2007, 1 - 1, 26));
    $('#dataNascimento').datepicker({
        dateFormat: 'dd-mm-yy',
        dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"],
        dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S"],
        monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]

    });

    getEndereco($("#cep").val());


    $("#adicionarPedido").submit(function (event) {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.post(url, data, function (o) {
            if (o.tipo != 'ERRO') {
                location.reload();
            } else {
                BootstrapDialog.alert({
                    title: 'Atenção',
                    message: o.mensagem,
                    type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                    closable: true, // <-- Default value is false
                    draggable: true, // <-- Default value is false
                    buttonLabel: 'Ok', // <-- Default value is 'OK',

                });
            }

        }, 'json');
        event.preventDefault();
    });
});

function deletarUsuario(cpf) {
    BootstrapDialog.confirm({
        title: 'ATENÇÃO',
        message: 'Deseja realmente remover o usuário ? ',
        type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
        closable: true, // <-- Default value is false
        draggable: false, // <-- Default value is false
        btnCancelLabel: 'Não', // <-- Default value is 'Cancel',
        btnCancelClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
        btnOKLabel: 'Sim', // <-- Default value is 'OK',
        btnOKClass: 'btn-default', // <-- If you didn't specify it, dialog type will be used,
        callback: function (result) {
            // result will be true if button was click, while it will be false if users close the dialog directly.
            if (result) {
                var url = 'deletar';
                $.post(url, {cpf: cpf}, function (o) {
                    if (o.tipo != 'ERRO') {
                        location.reload();
                    } else {
                        BootstrapDialog.alert({
                            title: 'Atenção',
                            message: o.mensagem,
                            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                            closable: true, // <-- Default value is false
                            draggable: true, // <-- Default value is false
                            buttonLabel: 'Ok', // <-- Default value is 'OK',

                        });

                    }

                }, 'json');
            }
        }
    });


}

function getEndereco(cep) {

    $.ajax({
        type: 'GET',
        url: 'https://viacep.com.br/ws/' + cep + '/json/ ',
        dataType: "json",
        beforeSend: function () {

        },
        success: function (res) {
            $("#logradouro").val(res.logradouro);
            $("#cidade").val(res.localidade);
            $("#estado").val(res.uf);
            $("#bairro").val(res.bairro);
        }

    });
}
function listaUsuarios(pagina) {
    var gif = {
        loader: $("<div/>", {class: 'loader'}),
        container: $('#contLoader')
    }
    $.ajax({
        type: 'GET',
        url: 'usuario/listUsuarios/' + pagina,
        dataType: "text",
        beforeSend: function () {
            gif.container.append(gif.loader);
        },
        success: function (res) {
            gif.container.find(gif.loader).remove();
            $("#conteudoUsuario").empty();
            $("#conteudoUsuario").append(res);

        }

    });

}

function cancelarAcao(acao) {
    if (acao == 'criar')
        msg = 'Deseja realmente cancelar a inserção de um novo usuário?';
    else
        msg = 'Deseja realmente cancelar a edição do usuário?';

    BootstrapDialog.confirm({
        title: 'ATENÇÃO',
        message: msg,
        type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
        closable: true, // <-- Default value is false
        draggable: false, // <-- Default value is false
        btnCancelLabel: 'Não', // <-- Default value is 'Cancel',
        btnCancelClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
        btnOKLabel: 'Sim', // <-- Default value is 'OK',
        btnOKClass: 'btn-default', // <-- If you didn't specify it, dialog type will be used,
        callback: function (result) {
            // result will be true if button was click, while it will be false if users close the dialog directly.
            if (result) {
                window.location = '../'
            }
        }
    });

}

function selecionarProduto(codigo) {

    $.ajax({
    type: 'GET',
            url: '../../produto/selecionar/' + codigo,
            dataType: "json",
            success: function (o) {
                var person = {fname: "John", lname: "Doe", age: 25};
                    $("#descricao").val(o.descricao);
                    $("#valorProduto").val(o.valor);
                    $("#valor").val(o.valor);

                }

            });
}


function atualizarValor(){
     var valor = parseFloat($("#valorProduto").val());
     
     var valorNew = parseFloat($('#quantidade').val()) * valor;
     $("#valor").val(valorNew);
     
}
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


    $("#adicionarUsuario").submit(function (event) {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        alert(data);
        $.post(url, data, function (o) {
            if (o.tipo == "ERRO") {
                $('#mensagem').empty();
                $('#mensagem').append('<div class="alert alert-danger"  role="alert"><strong>' + o.mensagem + '</strong></div>');
            } else {
                $('#mensagem').empty();
                alert(o.mensagem);
                location.href = "http://localhost:8080/ContaFacilMVC/usuario";
            }
        }, 'json');
        event.preventDefault();
    });
});

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
function listaUsuarios(pagina){
    var gif = {
            loader: $("<div/>", {class: 'loader'}),
            container: $('#contLoader')
        }
      $.ajax({
        type: 'GET',
        url: 'usuario/listUsuarios/'+pagina,
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
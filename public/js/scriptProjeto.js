/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    $('[data-toggle-tool="tooltip"]').tooltip();
    $("#inputDataNascimento").datepicker({
        showOtherMonths: true,
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
    });
})

// Chamada da table tela setor ::

$(document).ready(function () {
    var table = ['setor',
        'despensa',
        'pedido'];
    for (tabela in table) {
        $('#dataTables-' + table[tabela]).DataTable({
            responsive: true
        });
    }

});
$(document).ready(function () {
    /* Padrão */
    $("#dinheiro").maskMoney({
        symbol: "US$", /* Símbolo da moeda */
        decimal: ".", /* Separador de decimais */
        thousands: "", /* Separador de milhares */
        precision: 2, /* Precisão dos decimais */
        allowZero: false, /* Libera o 0 à esquerda */
        showSymbol: false /* Mostrar símbolo da moeda */
    });
    /* Configuração para Real */
    $(".classe_dos_campos").maskMoney({
        symbol: "R$", /* Símbolo da moeda */
        decimal: ", ", /* Separador de decimais */
        thousands: ".", /* Separador de milhares */
    });
});
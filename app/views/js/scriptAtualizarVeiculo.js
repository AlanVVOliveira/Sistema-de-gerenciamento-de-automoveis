$('#formulario').submit(function(e) {
    e.preventDefault();

    if($('#btn').val == 'Enviando...') {
        return(false);
    }

    $('#btn').val('Enviando...');

    $.ajax({
        url: "../controllers/atualizarVeiculo.php",
        type: 'post',
        dataType: 'json',
        data: {
            'metodo' : $('#metodo').val(),
            'id' : $('#id_veiculo').val(),
            'fabricante' : $('#fabricante_veiculo').val(),
            'modelo' : $('#modelo_veiculo').val(),
            'ano' : $('#ano_veiculo').val(),
            'versao' : $('#versao_veiculo').val(),
            'combustivel' : $('#combustivel_veiculo').val(),
            'motorizacao' : $('#motorizacao_veiculo').val(),
            'placa' : $('#placa_veiculo').val(),
            'valorCompra' : $('#valor_de_compra_veiculo').val(),
            'valorVenda' : $('#valor_de_venda_veiculo').val()
        }
    }).done(function(data){

        $('#metodo').val('Enviar dados'),
        $('#id_veiculo').val(''),
        $('#fabricante_veiculo').val(''),
        $('#modelo_veiculo').val(''),
        $('#ano_veiculo').val(''),
        $('#versao_veiculo').val(''),
        $('#combustivel_veiculo').val(''),
        $('#motorizacao_veiculo').val(''),
        $('#placa_veiculo').val(''),
        $('#valor_de_compra_veiculo').val(''),
        $('#valor_de_venda_veiculo').val('')
        
    }).always(function(resposta) {

        if (resposta.mensagem == "Veículo alterado sucesso!") {

            // Exemplo de variável contendo cor
            var corDinamica = "green";

            // Cria conteúdo HTML dinâmico com a cor
            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("http://localhost/public/Projetos%20PHP&JAVASCRIPT/ServidorLojaAutomobilistica/app/views/paginaListaVeiculos.php");
            }, 2000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Aconteceu um erro ao tentar atualizar os dados do veículo!") {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("http://localhost/public/Projetos%20PHP&JAVASCRIPT/ServidorLojaAutomobilistica/app/views/paginaListaVeiculos.php");
            }, 2000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Erro, o ID não consta nos registros!") {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("http://localhost/public/Projetos%20PHP&JAVASCRIPT/ServidorLojaAutomobilistica/app/views/paginaListaVeiculos.php");
            }, 2000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Já existe um veículo cadastrado com essa placa") {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("http://localhost/public/Projetos%20PHP&JAVASCRIPT/ServidorLojaAutomobilistica/app/views/paginaListaVeiculos.php");
            }, 2000); // o tempo é dado em milisegundos

        } else {
            var corDinamica = "red"; 

            $.each(resposta.mensagem, function(index, mensagem) {
                $('#resposta').append('<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';margin-top: 1px;">' + mensagem + '</div>');
              });

            setTimeout(function(){
                window.location.replace("http://localhost/public/Projetos%20PHP&JAVASCRIPT/ServidorLojaAutomobilistica/app/views/paginaListaVeiculos.php");
            }, 3000); // o tempo é dado em milisegundos

        }
    });
})

// Exibi uma tabela com os veículos ativos abaixo dos input's de atualização
var html = '';
$.get( "../controllers/exibirVeiculos.php",
        { 
            veiculoController:"" 
        }, 
        function (data) {

            var array = $.parseJSON(data);

            array.forEach(function (element) {
                html += '<tr class='+element.id+'>';
                html += '<td>'+element.id+'</td>';
                html += '<td>'+element.fabricante+'</td>';
                html += '<td>'+element.modelo+'</td>';
                html += '<td>'+element.ano+'</td>';
                html += '<td>'+element.versao+'</td>';
                html += '<td>'+element.combustivel+'</td>';
                html += '<td>'+element.motorizacao+'</td>';
                html += '<td>'+element.placa+'</td>';
                html += '<td>'+element.valorCompra+'</td>';
                html += '<td>'+element.valorVenda+'</td>';
                html += '<td>'+element.margemLucro+'</td>';
                html += '<td>'+element.data_cadastro+'</td>';

                html +="</tr>";
              });$('#table').append(html);
            }
)


// Popover
$(function () {
    $('[data-toggle="popover"]').popover({
        html: true,
        sanitize: false
    });
    $('input').on('click', function (e) {
        // Fechar todos os popovers, exceto o clicado
        $('input').not(this).popover('hide');
    });
  });

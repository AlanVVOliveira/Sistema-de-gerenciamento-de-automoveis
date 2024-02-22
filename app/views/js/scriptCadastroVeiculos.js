$('#formulario').submit(function(e) {
    e.preventDefault();

    if($('#btn').val == 'Enviando...') {
        return(false);
    }

    $('#btn').val('Enviando...');

    $.ajax({
        url: '../controllers/cadastroVeiculo.php',
        type: 'post',
        dataType: 'json',
        data: {
            'metodo' : $('#metodo').val(),
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

        if (resposta.mensagem == "Veículo cadastrado com sucesso!") {

            // Exemplo de variável contendo cor
            var corDinamica = "green";

            // Cria conteúdo HTML dinâmico com a cor
            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                    window.location.replace("../views/paginaListaVeiculos.php");
                }, 2000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Aconteceu um erro durante a tentativa de cadastrar o veículo, tente novamente!") {
            
            var corDinamica = "red"; 

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                    window.location.replace("../views/paginaListaVeiculos.php");
                }, 2000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Já existe um veículo cadastrado com essa placa") {

            var corDinamica = "red"; 

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                    window.location.replace("../views/paginaListaVeiculos.php");
                }, 2000); // o tempo é dado em milisegundos

        } else {

            var corDinamica = "red"; 

            $.each(resposta.mensagem, function(index, mensagem) {
                $('#resposta').append('<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';margin-top: 1px;">' + mensagem + '</div>');
              });

            setTimeout(function(){
                window.location.replace("../views/paginaListaVeiculos.php");
            }, 4000); // o tempo é dado em milisegundos

        }
    });
})


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

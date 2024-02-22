$('#formulario-ajax').submit(function(e) {
    e.preventDefault();

    if ($('#enviar').val() == 'Enviando...') {
        return (false);
    }

    $('#enviar').val('Enviando...');

    $.ajax({
        url: '../controllers/cadastroUsuario.php',
        type: 'post',
        datatype: 'json',
        data: {

            'metodo': $('#metodo').val(),
            'nomeCompleto': $('#nomeCompleto').val(),
            'email': $('#email').val(),
            'nomeAcesso': $('#nomeAcesso').val(),
            'senha': $('#senha').val()
        }
    }).done(function(data) {

            $('#enviar').val('enviar dados'),
            $('#metodo').val(''),
            $('#nomeCompleto').val(),
            $('#email').val(),
            $('#nomeAcesso').val(),
            $('#senha').val()

    }).fail(function(jqXHR, textStatus ) {

        console.log("Request failed: " + textStatus);
        $('#resposta').append("Erro");

    }).always(function(data) {

        var resposta = $.parseJSON(data);

        if (resposta.mensagem == "Usuário cadastrado com sucesso!") {

            // Exemplo de variável contendo cor
            var corDinamica = "green";

            // Cria conteúdo HTML dinâmico com a cor
            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("../../index.php");
            }, 3000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Aconteceu um erro durante o cadastro, por favor tente novamente.") {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("../../index.php");
            }, 3000); // o tempo é dado em milisegundos

        } else if (resposta.mensagem == "Já existe um cadastro com essa conta!") {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                window.location.replace("../../index.php");
            }, 3000); // o tempo é dado em milisegundos

        } else {
            var corDinamica = "red"; 

            $.each(resposta.mensagem, function(index, mensagem) {
                $('#resposta').append('<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';margin-top: 1px;">' + mensagem + '</div>');
              });

            setTimeout(function(){
                window.location.replace("../../index.php");
            }, 3000); // o tempo é dado em milisegundos

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

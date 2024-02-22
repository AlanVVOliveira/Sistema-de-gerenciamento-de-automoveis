$('#formulario-ajax').submit(function(e) {
    e.preventDefault();

    if ($('#enviar').val() == 'Enviando...') {
        return (false);
    }

    $('#enviar').val('Enviando...');

    $.ajax({
        url: 'app/controllers/acessoUsuario.php',
        type: 'post',
        datatype: 'json',
        data: {
            'metodo': $('#metodo').val(),
            'nomeAcesso': $('#nomeAcesso').val(),
            'senha': $('#senha').val()
        }
    }).done(function(data) {
            $('#enviar').val('enviar dados'),
            $('#metodo').val(''),
            $('#nomeAcesso').val(),
            $('#senha').val()

    }).fail(function(jqXHR, textStatus ) {
        console.log('Request failed: ' + jqXHR);
        console.log('\n');
        console.log('Request failed: ' + textStatus);
        $('#resposta').append('Erro');

    }).always(function(data) {

        var resposta = $.parseJSON(data);

        if (resposta.mensagem == "Acessando página...") {

            window.location.replace('app/views/telaPrincipal.php');

        } else if (resposta.mensagem == "Nome de acesso ou senha inválidos") {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                $('#enviar').val('Enviar'),
                $('#metodo').val(''),
                $('#nomeAcesso').val(''),
                $('#senha').val(''),
                $('#resposta').empty();
            }, 2000); // o tempo é dado em milisegundos

        } else {

            var corDinamica = "red";

            var conteudoHTML = '<div id="resposta" name="resposta" style="font-size:14px; color: ' + corDinamica + ';">' + resposta.mensagem + '</div>';

            $('#resposta').append(conteudoHTML);

            setTimeout(function(){
                $('#enviar').val('Enviar'),
                $('#metodo').val(''),
                $('#nomeAcesso').val(''),
                $('#senha').val(''),
                $('#resposta').empty();
            }, 2000); // o tempo é dado em milisegundos

        } 
    });
})


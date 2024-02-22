<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="text-center" style="background-color: #C0C0C0;">
    
    <form id="formulario-ajax" style="padding-top: 5%;">
        <div class="form-signin" style="border: 1px solid #000000; width: 30%; margin: 0 auto 10px; background-color: white; border-radius: 30px;">
            <img class="mb-3" src="../../public/img/logo.jpg" style="padding-top: 1%;" alt="" width="82" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Cadastre-se</h1>
            <label class="sr-only">Nome Completo</label>
            <input type="text" data-toggle="popover" title="Permite letras, espaços e apóstrofos" id="nomeCompleto" name="nomeCompleto" class="form-control" style="width: 50%; margin: 0 auto 20px;" placeholder="Digite seu nome completo" autofocus="" required>
            
            <label class="sr-only">E-mail</label>
            <input type="text" id="email" name="email" class="form-control" style="width: 50%; margin: 0 auto 20px;" placeholder="Digite seu melhor e-mail" autofocus="" required>

            <label class="sr-only">Nome de Acesso</label>
            <input type="text" data-toggle="popover" title="máximo de 8 caracteres. Pelo menos uma letra maiúscula, uma letra minúscula e um número"  id="nomeAcesso" name="nomeAcesso" class="form-control" style="width: 50%; margin: 0 auto 20px;" placeholder="Digite seu nome de acesso" autofocus="" required>
            
            <label class="sr-only">Senha</label>
            <input type="password" data-toggle="popover" title="Mín. 8 caracteres. Pelo menos uma letra maiúscula, uma letra minúscula e um número" id="senha" name="senha" class="form-control" style="width: 50%; margin: 0 auto 20px;" placeholder="Crie sua senha (mín. 8 dig)" autofocus="" required>

            <input id="enviar" type="submit" class="btn btn-lg btn-primary btn-block"  placeholder="Enviar!">
            <input id="metodo" type="hidden" class="btn btn-lg btn-primary btn-block"  value="formulario-ajax"><br>
            <a href="../../index.php" rel="stylesheet">
                Já tenho cadastro! Clique aqui para acessar!
            </a><br>
            <div id="resposta" name="resposta" class="badge badge-success"></div>
            <p class="mt-5 mb-3 text-muted">© 2023</p>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../views/js/scriptCadastroUsuario.js"></script>
</html>
<?php

session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-center" style="background-color: #C0C0C0;">
    
    <form id="formulario-ajax" style="padding-top: 10%;">
        <div class="form-signin" style="border: 1px solid #000000; width: 30%; margin: 0 auto 10px; background-color: white; border-radius: 30px;">
            <img class="mb-3" src="public/img/logo.jpg" alt="" width="82" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
            <label class="sr-only">Usuário</label>
            <input type="text" id="nomeAcesso" name="nomeAcesso" class="form-control" style="width: 50%; margin: 0 auto 20px;" placeholder="Seu Nome de Acesso" required autofocus="">
            <label class="sr-only">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" style="width: 50%; margin: 0 auto 20px;" placeholder="Senha" required>
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
                </label>
            </div>
            
            <input id="enviar" type="submit" class="btn btn-lg btn-primary btn-block"  placeholder="Enviar!">
            <input id="metodo" type="hidden" class="btn btn-lg btn-primary btn-block"  value="formulario-ajax"><br>

            <a href="app/views/paginaCadastroUsuario.php" href="./app/views/paginaCadastroUsuario.php" rel="stylesheet">
                Não tem cadastro? Clique aqui!
            </a>
            <p id="resposta" name="resposta"></p>
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
<script src="./app/views/js/scriptAcessoUsuario.js"></script>
</html>



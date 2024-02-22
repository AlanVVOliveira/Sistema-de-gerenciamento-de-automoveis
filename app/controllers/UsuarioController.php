<?php

require_once "../models/UsuarioRepositorio.php";
require_once "../models/BancoDeDados.php";

class UsuarioController
{
    public function processoDeCadastroDeUsuario($nomeCompleto, $email, $nomeAcesso, $senha)
    {
        $repositorio = new UsuarioRepositorio();
        $repositorio->salve($nomeCompleto, $email, $nomeAcesso, $senha);
    }

    public function processoDeAcessoDeUsuario($nomeAcesso, $senha)
    {
        $repositorio = new UsuarioRepositorio();
        $repositorio->acessoUsuario($nomeAcesso, $senha);
    }
}
?>

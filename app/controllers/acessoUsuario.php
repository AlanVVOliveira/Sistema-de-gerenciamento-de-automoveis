<?php

require_once "../models/Usuario.php";
require_once "../models/UsuarioRepositorio.php";
require_once "../models/BancoDeDados.php";
require_once "UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarioController->processoDeAcessoDeUsuario($_POST['nomeAcesso'], $_POST['senha']);

session_start();
if (isset($_POST['nomeAcesso'], $_POST['senha'])) {
    $_SESSION['nomeAcesso'] = $_POST['nomeAcesso'];
    $_SESSION['senha'] = $_POST['senha'];
};

?>

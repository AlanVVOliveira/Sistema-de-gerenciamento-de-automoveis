<?php

require_once "../models/UsuarioRepositorio.php";
require_once "../models/BancoDeDados.php";
require_once "./UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarioController->processoDeCadastroDeUsuario($_POST['nomeCompleto'], $_POST['email'], $_POST['nomeAcesso'], $_POST['senha']);
?>

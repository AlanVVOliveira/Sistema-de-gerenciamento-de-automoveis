<?php

require_once "../models/VeiculoRepositorio.php";
require_once "../models/BancoDeDados.php";
require_once "./VeiculoController.php"; 

$veiculoController = new VeiculoController();
$veiculoController->processoDeCadastroDeVeiculo($_POST['fabricante'], $_POST['modelo'], $_POST['ano'], $_POST['versao'], $_POST['combustivel'],
$_POST['motorizacao'], $_POST['placa'], $_POST['valorCompra'], $_POST['valorVenda']);
?>

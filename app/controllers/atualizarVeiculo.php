<?php

require_once "../models/VeiculoRepositorio.php";
require_once "../models/BancoDeDados.php";
require_once "./VeiculoController.php";

$id = $_POST["id"];
$veiculoController = new VeiculoController();
$veiculoController->atualizarVeiculo($id);
?>

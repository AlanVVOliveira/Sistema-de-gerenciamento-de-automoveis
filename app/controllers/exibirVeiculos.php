<?php

require_once "../models/VeiculoRepositorio.php";
require_once "../models/BancoDeDados.php";
require_once "./VeiculoController.php";

$veiculoController = new VeiculoController();
$veiculoController->processoDeExibicaoDeVeiculos();
?>

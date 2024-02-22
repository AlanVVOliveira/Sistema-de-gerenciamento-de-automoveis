<?php

require_once "../models/VeiculoRepositorio.php";
require_once "../models/BancoDeDados.php";

class VeiculoController
{
    public function processoDeCadastroDeVeiculo($fabricante, $modelo, $ano, $versao, $combustivel,
    $motorizacao, $placa, $valorCompra, $valorVenda)
    {
        $repositorio = new VeiculoRepositorio();
        $repositorio->salve($fabricante, $modelo, $ano, $versao, $combustivel,
        $motorizacao, $placa, $valorCompra, $valorVenda);
    }

    public function processoDeExibicaoDeVeiculos()
    {
        $repositorio = new VeiculoRepositorio();
        $repositorio->exibirVeiculos();
    }

    public function removerVeiculo($id)
    {
        $repositorio = new VeiculoRepositorio();
        $repositorio->removerVeiculo($id);
    }

    public function atualizarVeiculo($id)
    {
        $repositorio = new VeiculoRepositorio();
        $repositorio->atualizarVeiculo($id);
    }
}
?>

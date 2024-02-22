<?php

class Veiculo {
    private $id;
    private $fabricante;
    private $modelo;
    private $ano;
    private $versao;
    private $combustivel;
    private $motorizacao;
    private $placa;
    private $valorCompra;
    private $valorVenda;
    private $margemLucro;
    private $situacao;

    public function getFabricante() 
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante) 
    {
        $this->fabricante = $fabricante;
    }

    public function getModelo() 
    {
        return $this->modelo;
    }

    public function setModelo($modelo) 
    {
        $this->modelo = $modelo;
    }

    public function getAno() 
    {
        return $this->ano;
    }

    public function setAno($ano) 
    {
        $this->ano = $ano;
    }

    public function getVersao() 
    {
        return $this->versao;
    }

    public function setVersao($versao) 
    {
        $this->versao = $versao;
    }

    public function getCombustivel() 
    {
        return $this->combustivel;
    }

    public function setCombustivel($combustivel) 
    {
        $this->combustivel = $combustivel;
    }

    public function getMotorizacao() 
    {
        return $this->motorizacao;
    }

    public function setMotorizacao($motorizacao) 
    {
        $this->motorizacao = $motorizacao;
    }

    public function getPlaca() 
    {
        return $this->placa;
    }

    public function setPlaca($placa) 
    {
        $this->placa = $placa;
    }

    public function getValorCompra() 
    {
        return $this->valorCompra;
    }

    public function setValorCompra($valorCompra) 
    {
        $this->valorCompra = $valorCompra;
    }

    public function getValorVenda() 
    {
        return $this->valorVenda;
    }

    public function setValorVenda($valorVenda) 
    {
        $this->valorVenda = $valorVenda;
    }

    public function getMargemLucro() 
    {
        return $this->margemLucro;
    }

    public function setMargemLucro($valorVenda, $valorCompra) 
    {
        $this->margemLucro = $this->valorVenda - $this->valorCompra;
    }

    public function getSituacao() 
    {
        return $this->situacao;
    }

    public function setSituacao($situacao) 
    {
        $this->situacao = $situacao;
    }
}
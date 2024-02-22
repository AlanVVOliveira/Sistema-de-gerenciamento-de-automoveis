<?php

class Usuario {
    private $nomeCompleto;
    private $email;
    private $nomeAcesso;
    private $senha;
    private $situacao;

    public function getNomeCompleto() 
    {
        return $this->nomeCompleto;
    }

    public function setNomeCompleto($nomeCompleto) 
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }

    public function getNomeAcesso() 
    {
        return $this->nomeAcesso;
    }

    public function setNomeAcesso($nomeAcesso) 
    {
        $this->nomeAcesso = $nomeAcesso;
    }

    public function getSenha() 
    {
        return $this->senha;
    }

    public function setSenha($senha) 
    {
        $this->senha = $senha;
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
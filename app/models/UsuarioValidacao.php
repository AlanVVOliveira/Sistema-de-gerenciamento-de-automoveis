<?php

class UsuarioValidacao
{
    // Contador para requisitos de todo processo de validação.
    public $erro = [];

    // Funções para validar os campos do cadastro.
    function validarNomeCompleto($nome) 
    {
        // Nome Completo (permite letras, espaços e apóstrofos):
        if (preg_match("/^[a-zA-Z\s']+$/u", $nome)) {

            return true;
        
        } else {
        
            array_push($this->erro, "Nome completo inválido!");
            return false;
        }
    }

    function validarEmail($email) 
    {
        // Email (formato de email básico):
        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) 
        {

            return true;

        } else {
            
            array_push($this->erro, "Email inválido!");
            return false;
        }  
    }

    function validarNomeAcesso($nomeAcesso) 
    {
        // Nome acesso (máximo de 8 caracteres, pelo menos uma letra maiúscula, uma letra minúscula e um número)
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{1,8}$/',$nomeAcesso)) {
            
            return true;

        } else {
            
            array_push($this->erro, "Nome de acesso inválido!");
            return false;
        }
    }

    function validarSenha($senha) 
    {
        // Senha (pelo menos 8 caracteres, com pelo menos uma letra maiúscula, uma letra minúscula e um número):
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $senha)) {
            
            return true;

        } else {
            
            array_push($this->erro, "Senha inválida!");
            return false;
        }
    }
}


?>
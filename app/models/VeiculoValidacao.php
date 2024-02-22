<?php

class VeiculoValidacao
{

    // Contador para requisitos de todo processo de validação.
    public $erro = [];

    // Funções para validar os campos do cadastro do Veiculo.
    function validarFabricante($fabricante) 
    {
        // Nome Completo (permite letras, número, espaços e apóstrofos)
        if (preg_match("/^[a-zA-Z0-9 ]+$/", $fabricante)) {

            return true;
        
        } else {

            array_push($this->erro, "Erro, nome de fabricante inválido!");
            return false;
        }
    }

    function validarModelo($modelo) 
    {
        // Modelo (permite letras, número, espaços e apóstrofos) 
        if (preg_match("/^[a-zA-Z0-9 ]+$/", $modelo)) {

            return true;
        
        } else {
        
            array_push($this->erro, "Erro, nome de modelo inválido!");
            return false;
        }
    }

    function validarAno($ano) 
    {
        // Ano no formato com 4 digitos
        if (preg_match("/^\d{4}$/",$ano)) {
            
            return true;

        } else {
            
            array_push($this->erro, "Ano inválido!");
            return false;
        }
    }

    function validarVersao($versao) 
    {
        // Versão (permite letras, número, espaços e apóstrofos) 
        if (preg_match("/^[a-zA-Z0-9 ]+$/", $versao)) {
            
            return true;

        } else {
            
            array_push($this->erro, "Versao inválida!");
            return false;
        }
    }

    function validarCombustivel($combustivel) 
    {
        // Combustível (nome do tipo, minúsculo ou maiúsculo, nunca com abreviações)
        if (preg_match("/^(gasolina|alcool|diesel|flex|eletrico|hibrido)$/i", $combustivel)) {

            return true;

        } else {
            
            array_push($this->erro, "Combustível inválido!");
            return false;
        }
    }

    function validarMotorizacao($motorizacao) 
    {
        // Motorização (número e .)

        if (preg_match("/^\d+(\.\d+)?$/", $motorizacao)) {
            
            return true;

        } else {
            
            array_push($this->erro, "Motorização inválida");
            return false;
        }
    }

    function validarPlaca($placa) 
    {
        // 1ª Opção: Placa no modelo anterior
        // 2ª Opção: Placa no modelo atual, mercosul.
        // OBS para o Dev.: se retirar o - da primeira opção, a placa vai ser avaliada sem o -.
        if (preg_match("/^[A-Z]{3}\d{4}$/", strtoupper($placa)) || preg_match("/^[A-Z]{3}\d{1}[A-Z]\d{2}$/", strtoupper($placa))) {
            
            return true;

        } else {
            
            array_push($this->erro, "Placa inválida");
            return false;
        }
    }
}
?>
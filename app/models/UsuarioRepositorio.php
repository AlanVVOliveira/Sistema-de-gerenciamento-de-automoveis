<?php

require_once "../controllers/UsuarioController.php";
require_once "../models/UsuarioValidacao.php";
require_once "../models/Usuario.php";
require_once "../models/BancoDeDados.php";

class UsuarioRepositorio
{

    public $usuario;

    // Salvar os dados passados nos inputs
    public function salve($params) 
    {
        $usuario = new Usuario();
        $usuario->setNomeCompleto($_POST['nomeCompleto']);
        $usuario->setEmail($_POST['email']);
        $usuario->setNomeAcesso($_POST['nomeAcesso']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setSituacao('ativo');
        $this->validacao($usuario);
    }

    // Inicio do processo de validação dos dados 
    public function validacao($usuario)
    {
        $usuarioValidacao = new UsuarioValidacao();
        $usuarioValidacao->validarNomeCompleto($usuario->getNomeCompleto());
        $usuarioValidacao->validarEmail($usuario->getEmail());
        $usuarioValidacao->validarNomeAcesso($usuario->getNomeAcesso());
        $usuarioValidacao->validarSenha($usuario->getSenha());
        
        if (empty($usuarioValidacao->erro))
        {

            // Criptografando senha após os requisitos dela seres cumpridos
            $usuario->setSenha(password_hash($usuario->getSenha(), PASSWORD_DEFAULT));

            $this->cadastroNoBancoDeDados($usuario);

        } else {

            $resposta = array(
                "mensagem" => $usuarioValidacao->erro
            );
            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;
        }
    }

    public function cadastroNoBancoDeDados($usuario)
    {
        try {

            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();

            $stmt = $conexaoBanco->query("SELECT * FROM usuario");

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                // Verificando se Usuario e Senha estão no Banco
                if ( $linha["nomeAcesso"] == $usuario->getNomeAcesso() && $linha["email"] == $usuario->getEmail()) {
                    // Retorna um json informando que já existe um cadastro com nome de acesso e email passados
                    $resposta = array(
                        "mensagem" => "Já existe um cadastro com essa conta!"
                    );
                    $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                    echo $respostaJSON;
                    die();
                } 
            }

            // Inicio da inserção do usuário no banco de dados
            $sql =  "INSERT INTO usuario
            (nomeCompleto, email, nomeAcesso, senha, situacao)
                VALUES
            (:nomeCompleto, :email, :nomeAcesso, :senha, :situacao)";

            $stmt = $conexaoBanco->prepare($sql);

            $stmt->bindValue(':nomeCompleto', $usuario->getNomeCompleto());
            $stmt->bindValue(':email', $usuario->getEmail());
            $stmt->bindValue(':nomeAcesso', $usuario->getNomeAcesso());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':situacao', $usuario->getSituacao());
            $stmt->execute();

            $resposta = array(
                "mensagem" => "Usuário cadastrado com sucesso!"
            );
            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;

        } catch (PDOException $e) {

            $resposta = array(
                "mensagem" => "Aconteceu um erro durante o cadastro, por favor tente novamente."
            );
            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;

        }

        $conexaoBanco = null;
    }

    public function acessoUsuario($nomeAcesso, $senha)
    {
        try {
            $erroDeAcesso = false;
            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();
        
            $stmt = $conexaoBanco->query("SELECT * FROM usuario");
        
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                // Verificando se Usuario e Senha estão no Banco
                if ( $linha["nomeAcesso"] == $nomeAcesso && $linha["senha"] == password_verify($senha, $linha["senha"])) {

                    // Retorna um json informando que já existe um cadastro com nome de acesso e email passados
                    $resposta = array(
                        "mensagem" => "Acessando página..."
                    );
                    $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                    echo $respostaJSON;
                    $erroDeAcesso = true;
                }
            }

            if ($erroDeAcesso == false) {

                $resposta = array(
                    "mensagem" => "Nome de acesso ou senha inválidos"
                );
                $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                echo $respostaJSON;

            }
        } catch (PDOException $e) {
        
                $resposta = array(
                    "mensagem" => "Aconteceu um erro durante a tentativa de acesso, por favor tente novamente."
                );
                $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                echo $respostaJSON;
        
        }

        $conexaoBanco = null;
    }
}


?>
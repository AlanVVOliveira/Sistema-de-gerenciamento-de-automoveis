<?php

require_once "../models/VeiculoValidacao.php";
require_once "../models/Veiculo.php";
require_once "../models/BancoDeDados.php";

class VeiculoRepositorio {
    
    private $veiculo;

    // Salvar os dados passados nos inputs na variavel veiculo
    public function salve($fabricante, $modelo, $ano, $versao, $combustivel,
    $motorizacao, $placa, $valorCompra, $valorVenda) 
    {
        $veiculo = new Veiculo();
        $veiculo->setFabricante($_POST['fabricante']);
        $veiculo->setModelo($_POST['modelo']);
        $veiculo->setAno($_POST['ano']);
        $veiculo->setVersao($_POST['versao']);
        $veiculo->setCombustivel($_POST['combustivel']);
        $veiculo->setMotorizacao($_POST['motorizacao']);
        $veiculo->setPlaca($_POST['placa']);
        $veiculo->setValorCompra($_POST['valorCompra']);
        $veiculo->setValorVenda($_POST['valorVenda']);
        $veiculo->setMargemLucro($_POST['valorVenda'], $_POST['valorCompra']);
        $veiculo->setSituacao('ativo');
        
        $this->validacao($veiculo);
    }

    // Processo de validação dos dados salvos em veiculo
    public function validacao($veiculo)
    {
        $veiculoValidacao = new VeiculoValidacao();
        $veiculoValidacao->validarFabricante($veiculo->getFabricante());
        $veiculoValidacao->validarModelo($veiculo->getModelo());
        $veiculoValidacao->validarAno($veiculo->getAno());
        $veiculoValidacao->validarVersao($veiculo->getVersao());
        $veiculoValidacao->validarCombustivel($veiculo->getCombustivel());
        $veiculoValidacao->validarMotorizacao($veiculo->getMotorizacao());
        $veiculoValidacao->validarPlaca($veiculo->getPlaca());

        if (empty($veiculoValidacao->erro))
        {

            $this->cadastroNoBancoDeDados($veiculo);

        } else {

            $resposta = array(
                "mensagem" => $veiculoValidacao->erro
            );
            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;

        }
    }

    // Inserção do veiculo no banco de dados
    public function cadastroNoBancoDeDados($veiculo)
    {
        try {

            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();

            $stmt = $conexaoBanco->query("SELECT * FROM veiculo");

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                // Verificando se a placa já esta cadastrada no Banco
                if ( $linha["placa"] == $veiculo->getPlaca()) {
                    // Retorna um json informando que já existe um cadastro da placa que está sendo passada
                    $resposta = array(
                        "mensagem" => "Já existe um veículo cadastrado com essa placa"
                    );
        
                    $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                    echo $respostaJSON;
                    die();
                } 
            }

            // Inicio da inserção do usuário no banco de dados
            $sql =  "INSERT INTO veiculo
            (fabricante, modelo, ano, versao, combustivel, motorizacao, placa, valorCompra, valorVenda, margemLucro, situacao)
                VALUES
            (:fabricante, :modelo, :ano, :versao, :combustivel, :motorizacao, :placa, :valorCompra, :valorVenda, :margemLucro, :situacao)";

            $stmt = $conexaoBanco->prepare($sql);

            $stmt->bindValue(':fabricante', $veiculo->getFabricante());
            $stmt->bindValue(':modelo', $veiculo->getModelo());
            $stmt->bindValue(':ano', $veiculo->getAno());
            $stmt->bindValue(':versao', $veiculo->getVersao());
            $stmt->bindValue(':combustivel', $veiculo->getCombustivel());
            $stmt->bindValue(':motorizacao', $veiculo->getMotorizacao());
            $stmt->bindValue(':placa', $veiculo->getPlaca());
            $stmt->bindValue(':valorCompra', $veiculo->getValorCompra());
            $stmt->bindValue(':valorVenda', $veiculo->getValorVenda());
            $stmt->bindValue(':margemLucro', $veiculo->getMargemLucro());
            $stmt->bindValue(':situacao', $veiculo->getSituacao());
            $stmt->execute();

            $resposta = array(
                "mensagem" => "Veículo cadastrado com sucesso!"
            );
            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;

        } catch (PDOException $e) {

            $resposta = array(
                "mensagem" => "Aconteceu um erro durante a tentativa de cadastrar o veículo, tente novamente!"
            );

            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;

        }

        $conexaoBanco = null;
    }

    // Exibir veiculos com situação 'ativo'
    public function exibirVeiculos()
    {
        try {
            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();
    
            $stmt = $conexaoBanco->query("SELECT * FROM veiculo WHERE situacao = 'ativo'");
            $stmt->execute();
            $resposta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $respostaJSON = json_encode($resposta);
            echo $respostaJSON;

        } catch (PDOExceptio $e) {

            $resposta = array(
                "mensagem" => "Erro ao tentar exibir veículos!"
            );

            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;
        }

        $conexaoBanco = null;
    }

    // Inativa o veiculo, não exibindo mais na lista.
    public function removerVeiculo($id)
    {
        try {
            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();

            $novoValor = 'inativo';
            $idAlvo = $id;

            $sql = "UPDATE veiculo SET situacao = :novoValor WHERE id = :idAlvo";
            $stmt = $conexaoBanco->prepare($sql);

            $stmt->bindParam(':novoValor', $novoValor);
            $stmt->bindParam(':idAlvo', $idAlvo);

            $stmt->execute();

        } catch (PDOExceptio $e) {

            $resposta = array(
                "mensagem" => "Erro ao tentar remover veículo"
            );

            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;
        }

        $this->exibirVeiculos();

        $conexaoBanco = null;
    }

    // Atualiza os campos desejados pelo usuario do veiculo
    public function atualizarVeiculo($id)
    {
        try {

            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();

            if (!isset($_SESSION["nomeAcesso"])) session_start();
            $campos = [];

            // Caso os inputs recebam algum dado, serão adicionados ao array campos dos comando sql 
            //para as colunas que receberão uma atualização de dados, além da criação da váriavel que recebe os POST's. 
            if($_POST['id'] != null) {
                $id = $_POST['id'];

                $stmt = $conexaoBanco->query("SELECT * FROM veiculo WHERE id=".$id);
                $stmt->execute();
        
                if ($stmt->rowCount() < 1) {
                    $resposta = array(
                        "mensagem" => "Erro, o ID não consta nos registros!"
                    );
    
                    $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                    echo $respostaJSON;
                    die();
                }

            }

            if ($_POST['fabricante'] != null) {
                $campos[] = "fabricante=:fabricante";
                $fabricante = $_POST['fabricante'];
            }

            if($_POST['modelo'] != null) {
                $campos[] = "modelo=:modelo";
                $modelo = $_POST['modelo'];
            }

            if($_POST['ano'] != null) {
                $campos[] = "ano=:ano";
                $ano = $_POST['ano'];
            }

            if($_POST['versao'] != null) {
                $campos[] = "versao=:versao";
                $versao = $_POST['versao'];
            }

            if($_POST['combustivel'] != null) {
                $campos[] = "combustivel=:combustivel";
                $combustivel = $_POST['combustivel'];
            }

            if($_POST['motorizacao'] != null) {
                $campos[] = "motorizacao=:motorizacao";
                $motorizacao = $_POST['motorizacao'];
            }

            if($_POST['placa'] != null) {
                $campos[] = "placa=:placa";
                $placa = $_POST['placa'];

                $stmt = $conexaoBanco->query("SELECT * FROM veiculo");
                $stmt->execute();
        
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                    // Verificando se Usuario e Senha estão no Banco
                    if ( $linha["placa"] == $placa) {
                        // Retorna um json informando que já existe um cadastro na placa que está sendo passada
                        $resposta = array(
                            "mensagem" => "Já existe um veículo cadastrado com essa placa"
                        );
        
                        $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                        echo $respostaJSON;
                        die();
                    } 
                }
            }

            if($_POST['valorCompra'] != null) {
                $campos[] = "valorCompra=:valorCompra";
                $valorCompra = $_POST['valorCompra'];
            }

            if($_POST['valorVenda'] != null) {
                $campos[] = "valorVenda=:valorVenda";
                $valorVenda = $_POST['valorVenda'];
            }

            if($_POST['valorVenda'] != null && $_POST['valorCompra'] != null) {
                $campos[] = "margemLucro=:margemLucro";
                $margemLucro = $_POST['valorVenda'] - $_POST['valorCompra'];
            }
            
            $situacao = 'ativo';

            // Variaveis contendo os comandos SQL
            $sql = "UPDATE veiculo SET " . implode(',', $campos) . ", situacao=:situacao WHERE id=:id ";
            $stmt = $conexaoBanco->prepare($sql);

            // Nova validacao para os dados novos inseridos.
            $veiculoValidacao = new VeiculoValidacao();

            // chamando os bind's value's conforme a existencia de um valor diferente de null para cada POST
            if($_POST['fabricante'] != null) {
                
                $veiculoValidacao->validarFabricante($fabricante);
                $stmt->bindValue(':fabricante', $fabricante);
            } 

            if($_POST['modelo'] != null) {
                
                $veiculoValidacao->validarModelo($modelo);
                $stmt->bindValue(':modelo', $modelo);
            }

            if($_POST['ano'] != null) {

                $veiculoValidacao->validarAno($ano);
                $stmt->bindValue(':ano', $ano);
            }
            
            if($_POST['versao'] != null) {

                $veiculoValidacao->validarVersao($versao);
                $stmt->bindValue(':versao', $versao);
            }

            if($_POST['combustivel'] != null) {

                $veiculoValidacao->validarCombustivel($combustivel);
                $stmt->bindValue(':combustivel', $combustivel);
            }

            if($_POST['motorizacao'] != null) {

                $veiculoValidacao->validarMotorizacao($motorizacao);
                $stmt->bindValue(':motorizacao', $motorizacao);
            }

            if($_POST['placa'] != null) {
                $veiculoValidacao->validarPlaca($_POST['placa']);
                $stmt->bindValue(':placa', $placa);
            }

            if($_POST['valorCompra'] != null) $stmt->bindValue(':valorCompra', $valorCompra);
            
            if($_POST['valorVenda'] != null) $stmt->bindValue(':valorVenda', $valorVenda);
            
            if($_POST['valorVenda'] != null && $_POST['valorCompra'] != null) $stmt->bindValue(':margemLucro', $margemLucro);
            
            if($situacao != null) $stmt->bindValue(':situacao', $situacao);
            
            if($_POST['id'] != null) $stmt->bindValue(':id', $id);

            if (empty($veiculoValidacao->erro)) {
    
                $stmt->execute();

                $resposta = array(
                    "mensagem" => "Veículo alterado sucesso!"
                );

                // Callback para atualizar margem de lucro
                $this->atualizarMargemLucroVeiculo($id);

                $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                echo $respostaJSON;
    
            } else {
    
                $resposta = array(
                    "mensagem" => $veiculoValidacao->erro
                );
                $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
                echo $respostaJSON;
    
            }

        } catch (PDOException $e) {
            $resposta = array(
                "mensagem" => "Aconteceu um erro ao tentar atualizar os dados do veículo!"
            );

            $respostaJSON = json_encode($resposta,  JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;
        }

        $conexaoBanco = null;
    }

    // Atualiza a margem de lucro baseado em novos valores de compra e venda, ou apenas um ou outro. 
    // É chamada automaticamente após a atualização do veiculo
    public function atualizarMargemLucroVeiculo($id)
    {

        try {

            $bancoDeDados = new BancoDeDados();
            // Inicio da comunicação com o Banco de Dados MySql
            $conexaoBanco = $bancoDeDados->conectar();

            $sql = "UPDATE veiculo SET margemLucro=valorVenda-valorCompra WHERE id=$id";
            $stmt = $conexaoBanco->prepare($sql);

            $stmt->execute();

        } catch(PDOException $e) {

            $resposta = array(
                "mensagem" => $e
            );

            $respostaJSON = json_encode($resposta, JSON_UNESCAPED_UNICODE);
            echo $respostaJSON;
        }
        $conexaoBanco = null;

    }
}
<?php 

session_start();

if (!isset($_SESSION['nomeAcesso']) && !isset($_SESSION['senha'])) {
    header('Location: http://localhost/public/Projetos%20PHP&JAVASCRIPT/ServidorLojaAutomobilistica/index.php?erro=true');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    body {
        background-color: #D3D3D3;
    }
    .form-control {
        background-color: #C0C0C0;
    }
</style>
<body>

    <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">AutoV8</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="telaPrincipal.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cadastrar Veículo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paginaListaVeiculos.php">Lista de Veículos</a>
                            </li>
                            <li class="nav-item">
                                <button onclick="mostrar()" class="btn btn-primary" >Logout</button>
                            </li>
                        </ul>
                    </div>
            </nav>

        <h2 id="titulo">Cadastro de Veiculos</h2>
        <form id="formulario">

            <div class="form-group">
                    <label for="fabricante_veiculo">Fabricante:</label>
                    <input type="text" data-toggle="popover" title="Permite letras, números e espaços" step=".01" 
                    class="form-control" id="fabricante_veiculo" name="fabricante_veiculo" 
                    placeholder="Digite nome do fabricante" required>
            </div>

            <div class="form-group">
                    <label for="modelo_veiculo">Modelo:</label>
                    <input type="text" data-toggle="popover" title="Permite letras, números e espaços" step=".01" 
                    class="form-control" id="modelo_veiculo" name="modelo_veiculo" 
                    placeholder="Digite modelo do veiculo" required>
            </div>

            <div class="form-group">
                    <label for="ano_veiculo">Ano:</label>
                    <input type="number" data-toggle="popover" title="Permite 4 números" step=".01" 
                    class="form-control" id="ano_veiculo" name="ano_veiculo" 
                    placeholder="Digite o ano" required>
            </div>

            <div class="form-group">
                    <label for="versao_veiculo">Versão:</label>
                    <input type="text" data-toggle="popover" title="Permite letras, números e espaços" step=".01" 
                    class="form-control" id="versao_veiculo" name="versao_veiculo" 
                    placeholder="Digite a versão" required>
            </div>

            <div class="form-group">
                    <label for="combustivel_veiculo">Combustivel:</label>
                    <input type="text" data-toggle="popover" title="Escolha alguma dessas opções: gasolina / alcool 
                    / diesel / flex / eletrico / hibrido" step=".01" 
                    class="form-control" id="combustivel_veiculo" name="combustivel_veiculo" 
                    placeholder="Combustível" required>
            </div>

            <div class="form-group">
                    <label for="motorizacao_veiculo">Motorização:</label>
                    <input type="number" data-toggle="popover" title="Permite números e ." step=".01" 
                    class="form-control" id="motorizacao_veiculo" name="motorizacao_veiculo" 
                    placeholder="Digite a motorização" required>
            </div>

            <div class="form-group">
                    <label for="placa_veiculo">Placa:</label>
                    <input type="text" data-toggle="popover" title="Permite o formato antigo e atual. Não permite o - " step=".01" 
                    class="form-control" id="placa_veiculo" name="placa_veiculo" 
                    placeholder="Digite a placa" required>
            </div>

            <div class="form-group">
                    <label for="valor_de_compra_veiculo">Valor de compra:</label>
                    <input type="number" step=".01" class="form-control" id="valor_de_compra_veiculo" name="valor_de_compra_veiculo" 
                    placeholder="Digite o valor" required>
            </div>

            <div class="form-group">
                    <label for="valor_de_venda_veiculo">Valor de venda:</label>
                    <input type="number" step=".01" class="form-control" id="valor_de_venda_veiculo" name="valor_de_venda_veiculo" 
                    placeholder="Digite o valor" required>
            </div>

           
            <input type="submit" id="btn" name="btn"  class="btn btn-primary" placeholder="Enviar!">
            <input type="hidden" id="metodo" value="formulario-ajax">
        </form>
        <p id="main"></p>
        <div id="resposta" name="resposta" class="badge badge-success"></div>
    </div>

    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="meuModal" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Deseja realmente sair da sua conta?</p>
                </div>

                <div class="modal-footer">
                    <button id="btnSairPagina" type="button" class="btn btn-primary">Sair</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../views/js/scriptCadastroVeiculos.js"></script>
<script src="../views/js/scriptLogout.js"></script>
</html>
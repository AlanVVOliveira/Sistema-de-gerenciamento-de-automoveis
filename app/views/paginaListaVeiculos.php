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
                            <a class="nav-link" href="paginaCadastroVeiculos.php">Cadastrar Veículo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lista de Veículos</a>
                        </li>
                        <li class="nav-item">
                            <button onclick="mostrar()" class="btn btn-primary" >Logout</button>
                        </li>
                    </ul>
                </div>
        </nav>

        <table id="table" class="table">
            <thead>

                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Versão</th>
                    <th scope="col">Combustível</th>
                    <th scope="col">Motorização</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Valor de Compra</th>
                    <th scope="col">Valor de Venda</th>
                    <th scope="col">Margem de Lucro</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="col" id='+element.id+' type="button" onclick="editarVeiculo()" class="btn btn-warning">Editar Veiculo</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../views/js/scriptVisualizacaoVeiculos.js"></script>
<script src="../views/js/scriptLogout.js"></script>
</html>
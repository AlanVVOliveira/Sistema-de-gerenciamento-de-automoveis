<?php 

class BancoDeDados {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public function conectar() {
        $conn = new PDO("mysql:host=$this->servername;dbname=loja_automotiva", 
                                    $this->username, 
                                    $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

}
?>
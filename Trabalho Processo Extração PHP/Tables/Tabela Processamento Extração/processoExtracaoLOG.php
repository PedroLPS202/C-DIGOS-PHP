<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "processo_extracao";

    // Conexão banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Função para criar as tabelas
    function CriarTabelas($conn){
        $sqlCriarTabelas = "CREATE TABLE IF NOT EXISTS log_processamento_extracao (
            log_id INT AUTO_INCREMENT PRIMARY KEY,
            id INT NOT NULL,
            data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            alteracao VARCHAR(255),
            usuario VARCHAR(255)
        )";

        // Executar a query
        if($conn->query($sqlCriarTabelas) === TRUE) {
            echo "Tabela Log Criada com Sucesso\n";
        } else {
            echo "Erro ao criar tabela" . $conn->error;
        }

    }

    CriarTabelas($conn); //Chamar a função e criar a tabela

?>
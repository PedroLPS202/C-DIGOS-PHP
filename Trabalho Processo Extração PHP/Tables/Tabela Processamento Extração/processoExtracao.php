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
        $sqlCriarTabelas = "CREATE TABLE IF NOT EXISTS processamento_extracao (
            id INT AUTO_INCREMENT PRIMARY KEY,
            processo_fabricacao VARCHAR(255),
            equipamentos_utilizados VARCHAR(255),
            registros_producao VARCHAR(255)
        )";

        // Executar a query
        if($conn->query($sqlCriarTabelas) === TRUE) {
            echo "Tabela Criada com Sucesso\n";
        } else {
            echo "Erro ao criar tabela" . $conn->error;
        }

    }

    CriarTabelas($conn); //Chamar a função e criar a tabela


?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="processo_extracao";

// Conexão banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//Função para inserir dados dos parceiros
function inserirDados($conn, $materia_prima, $quantidade_processada, $equipamentos_utilizados){
    $sqlInserir = "INSERT INTO moagem_trituracao (materia_prima, quantidade_processada, equipamentos_utilizados) VALUES ('$materia_prima', '$quantidade_processada', '$equipamentos_utilizados');";
    if( $conn->query($sqlInserir) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados" . $conn -> error;
    }
}

inserirDados($conn, "materia_prima", 4, "quantidade_processada");


?>
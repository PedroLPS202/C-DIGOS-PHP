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

//Função para inserir dados dos parceiros
function inserirDados($conn, $temperatura_controle, $tempo_processo, $monitoramento_qualidade){
    $sqlInserir = "INSERT INTO controle_processo (temperatura_controle, tempo_processo, monitoramento_qualidade) VALUES ('$temperatura_controle', '$tempo_processo', '$monitoramento_qualidade');";
    if( $conn->query($sqlInserir) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados" . $conn -> error;
    }
}

inserirDados($conn, "temperatura", "tempo", "Monitoramento");


?>
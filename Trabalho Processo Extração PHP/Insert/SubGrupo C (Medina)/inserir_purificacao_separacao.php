<?php

// Maxwell 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "processo_extracao";

// Conexão Banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//Função para inserir dados dos parceiros
function inserirDados($conn, $processo_purificacao, $materiais_utilizados, $pureza_etanol){
    $sqlInser = "INSERT INTO purificacao_separacao (processo_purificacao, materiais_utilizados, pureza_etanol) VALUES ('$processo_purificacao', '$materiais_utilizados',  '$pureza_etanol');";
    if( $conn->query($sqlInser) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados" . $conn -> error;
    }
}

inserirDados($conn, "Processo Purificacao", "Osmose Reversa", "98% de teor alcoolico");

?>

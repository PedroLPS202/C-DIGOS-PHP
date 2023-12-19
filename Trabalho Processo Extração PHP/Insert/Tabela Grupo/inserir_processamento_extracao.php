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
function inserirDados($conn, $processo_fabricacao, $equipamentos_utilizados, $registros_producao){
    $sqlInserir = "INSERT INTO processamento_extracao (processo_fabricacao, equipamentos_utilizados, registros_producao) VALUES ('$processo_fabricacao', '$equipamentos_utilizados', '$registros_producao');";
    if( $conn->query($sqlInserir) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados" . $conn -> error;
    }
}

inserirDados($conn, "Processo 4", "Colete", "Registro 4");


?>
<?php

//Medina 👻💀

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
function inserirDados($conn, $teste_fisico_quimico, $padrao_de_qualidade, $feedback_laboratorial){
    $sqlInser = "INSERT INTO controle_qualidade_etanol (teste_fisico_quimico, padrao_de_qualidade, feedback_laboratorial ) VALUES ('$teste_fisico_quimico', '$padrao_de_qualidade', '$feedback_laboratorial');";
    if( $conn->query($sqlInser) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados" . $conn -> error;
    }
}

inserirDados($conn,"Processo quimico" , "Excelente", "Otimo trabalho");

?>
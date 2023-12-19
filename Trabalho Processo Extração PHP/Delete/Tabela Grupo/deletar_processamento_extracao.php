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

//Função para deletar dados
function deletarDados($conn, $id){
    $sqlDeletar = "DELETE FROM processamento_extracao WHERE id = '$id'";
    if($conn->query($sqlDeletar) === TRUE) {
        echo "Dado deletado com sucesso!";
    } else {
        echo "Erro ao deletar dado" . $conn -> error;
    }
}

// Chamada da funcao para deletar
deletarDados($conn, 1);

?>
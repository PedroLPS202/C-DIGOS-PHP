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

//Função para deletar dados dos parceiros
function DeletarDados($conn, $id){
    $sqlDeletar= "DELETE FROM controle_processo WHERE id = '$id'";
    if( $conn->query($sqlDeletar) === TRUE) {
        echo "Dados deletados com sucesso!";
    } else {
        echo "Erro ao deletar dados" . $conn -> error;
    }
}

// Chamada da funcao para deletar
DeletarDados($conn, 1); 

?>
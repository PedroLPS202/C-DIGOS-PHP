<?php
// Gustavo De Oliveira Vital e Otávio Augusto.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "processo_extracao";

// Conexão banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para a inserir a tabela controle_fermentacao
function inserirDados($conn, $tipo_levedura, $ph_fermento, $monitoramento_reacoes){
    $sqlInserir = "INSERT INTO controle_fermentacao (tipo_levedura, ph_fermento, monitoramento_reacoes) VALUES ('$tipo_levedura','$ph_fermento','$monitoramento_reacoes');";
    if( $conn->query($sqlInserir) === TRUE) {
        echo "Dados inseridos com sucesso!"; // Caso der certo a seguinte mensagem aparece
    } else {
        echo "Erro ao inserir dados" . $conn -> error; // Caso der erro a seguinte mensagem aparece
    }
}

inserirDados($conn, "Processo Concluido", "controle_fermentacao", "Registro Teste1");

?>
    


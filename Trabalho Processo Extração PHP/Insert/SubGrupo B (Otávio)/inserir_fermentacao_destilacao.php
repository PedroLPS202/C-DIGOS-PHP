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

//Função para inserir dados da fermentacao_destilacao
function inserirDados($conn, $temperatura_fermentacao, $tempo_destilacao, $teor_alcoolico){
    $sqlInserir = "INSERT INTO fermentacao_destilacao (temperatura_fermentacao, tempo_destilacao, teor_alcoolico) VALUES ('$temperatura_fermentacao', '$tempo_destilacao', '$teor_alcoolico');";
    if( $conn->query($sqlInserir) === TRUE) {
        echo "Dados inseridos com sucesso!"; // Caso der certo a seguinte mensagem aparece
    } else {
        echo "Erro ao inserir dados" . $conn -> error; // Caso der erro a seguinte mensagem aparece
    }
}

inserirDados($conn, "Processo Concluido", "Fermentacao_Destilacao", "Teor Teste");

?>
    


   

    


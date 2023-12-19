<?php
// Código para UPDATE - Feito por Otávio Augusto e Gustavo De Oliveira Vital
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "processo_extracao";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para atualizar dados
function atualizarDados($id,  $tipo_levedura, $ph_fermento, $monitoramento_reacoes, $conn) {
    $sql = "UPDATE controle_fermentacao SET tipo_levedura=?, ph_fermento=?, monitoramento_reacoes=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros e executa a declaração
    $stmt->bind_param("sssi", $tipo_levedura, $ph_fermento, $monitoramento_reacoes, $id);
    $stmt->execute(); // Onde está escrito "sssi" , $conn e $id, pode deixar assim mesmo, o restante deve ser mudado

    // Verifica se a execução foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        echo "Registro de tabela atualizada com sucesso!";
    } else {
        echo "Nenhum registro foi atualizado.";
    }

    // Fecha a declaração
    $stmt->close();
}

// Chamada da função para atualizar
atualizarDados(1, "Processo Mecânico", "Equipamento Teste", "Registro 2", $conn);

// Fecha a conexão
$conn->close();

?>

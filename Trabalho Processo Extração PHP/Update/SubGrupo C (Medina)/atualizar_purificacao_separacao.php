<?php

// Maxwell

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
function atualizarDados($id, $processo_purificacao, $materiais_utilizados, $pureza_etanol, $conn) {
    $sql = "UPDATE purificacao_separacao SET processo_purificacao=?, materiais_utilizados=?, pureza_etanol=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros e executa a declaração
    $stmt->bind_param("sssi", $processo_purificacao, $materiais_utilizados, $pureza_etanol, $id);
    $stmt->execute(); 

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
atualizarDados(1, "Processo de Purificacao", "Material Teste", "rigoroso", $conn);

// Fecha a conexão
$conn->close();

?>

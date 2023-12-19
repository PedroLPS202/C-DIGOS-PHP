<?php

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
function atualizarDados($id, $processo_fabricacao, $equipamentos_utilizados, $registros_producao, $conn) {
    $sql = "UPDATE processamento_extracao SET processo_fabricacao=?, equipamentos_utilizados=?, registros_producao=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros e executa a declaração
    $stmt->bind_param("sssi", $processo_fabricacao, $equipamentos_utilizados, $registros_producao, $id);
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
atualizarDados(2, "Processo 5", "Equipamento unico", "Registro 78", $conn);

// Fecha a conexão
$conn->close();

?>

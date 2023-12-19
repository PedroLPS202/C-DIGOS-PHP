<?php

// Medina 👻💀

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
function atualizarDados($id, $conn, $teste_fisico_quimico, $padrao_de_qualidade, $feedback_laboratorial ) {
    $sql = "UPDATE controle_qualidade_etanol SET teste_fisico_quimico=?, padrao_de_qualidade=?, feedback_laboratorial=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros e executa a declaração
    $stmt->bind_param("sssi", $teste_fisico_quimico, $padrao_de_qualidade, $feedback_laboratorial, $id);
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
atualizarDados(1, $conn, "Processo Quimico", "Ruim", "empregados preguiçosos");

// Fecha a conexão
$conn->close();

?>

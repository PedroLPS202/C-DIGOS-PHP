<?php
// Código para UPDATE - EXEMPLO
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
function atualizarDados($id, $materia_prima, $quantidade_processada, $equipamentos_utilizados, $conn) {
    $sql = "UPDATE moagem_trituracao SET materia_prima=?, quantidade_processada=?, equipamentos_utilizados=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Vincula parâmetros e executa a declaração
    $stmt->bind_param("sssi", $materia_prima, $quantidade_processada, $equipamentos_utilizados, $id);
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
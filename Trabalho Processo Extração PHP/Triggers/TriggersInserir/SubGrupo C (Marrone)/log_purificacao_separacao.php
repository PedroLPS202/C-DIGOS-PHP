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

//Função para Criar os Triggers
function CriarTriggers($conn) {
    // Triggers para a tabela purificacao_separacao
    $sqlCriandoTriggers = "CREATE TRIGGER IF NOT EXISTS purificacao_separacao_after_insert
        AFTER INSERT ON purificacao_separacao
        FOR EACH ROW
        BEGIN
            INSERT INTO log_purificacao_separacao (id, alteracao) VALUES (NEW.id, 'inserção');
        END;
    ";

    if ($conn->query($sqlCriandoTriggers)) {
        echo "Trigger Criado com sucesso!";
    } else {
        echo "Erro ao criar trigger: " . $conn->error;
    }
}

// Chama a função para criar os triggers
CriarTriggers($conn);

// Fecha a conexão após criar os triggers (se necessário)
$conn->close();
?>

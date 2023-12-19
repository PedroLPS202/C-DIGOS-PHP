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
    // Triggers para a tabela log_moagem_trituracao
    $sqlCriandoTriggers = "CREATE TRIGGER IF NOT EXISTS moagem_trituracao_after_insert
        AFTER INSERT ON moagem_trituracao
        FOR EACH ROW
        BEGIN
            INSERT INTO log_moagem_trituracao (id, alteracao) VALUES (NEW.id, 'inserção');
        END;
    ";

    if ($conn->query($sqlCriandoTriggers)) {
        echo "Trigger Criado com sucesso!";
    } else {
        echo "Erro ao criar trigger: " . $conn->error;
    }
}

// Chame a função para criar os triggers
CriarTriggers($conn);

// Feche a conexão após criar os triggers (se necessário)
$conn->close();
?>
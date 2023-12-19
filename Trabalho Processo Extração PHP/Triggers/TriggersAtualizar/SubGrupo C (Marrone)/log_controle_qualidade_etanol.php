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
    // Triggers para a tabela controle_qualidade_etanol
    $sqlCriandoTriggers = "CREATE TRIGGER IF NOT EXISTS controle_qualidade_etanol_after_update
        AFTER UPDATE ON controle_qualidade_etanol
        FOR EACH ROW
        BEGIN
            INSERT INTO log_controle_qualidade_etanol (id, alteracao) VALUES (NEW.id, 'atualização');
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
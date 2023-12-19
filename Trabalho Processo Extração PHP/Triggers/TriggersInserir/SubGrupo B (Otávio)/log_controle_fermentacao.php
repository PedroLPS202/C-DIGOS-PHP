<?php       // Feito por Otávio Augusto e Gustavo De Oliveira Vital.
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
    
    // Triggers para a tabela log_controle_fermentacao
    $sqlCriandoTriggers = "CREATE TRIGGER IF NOT EXISTS controle_fermentacao_after_insert
        AFTER INSERT ON controle_fermentacao
        FOR EACH ROW
        BEGIN
            INSERT INTO log_controle_fermentacao (id, alteracao) VALUES (NEW.id, 'inserção');
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

// Feche a conexão após criar os triggers caso (se necessário)
$conn->close();
?>

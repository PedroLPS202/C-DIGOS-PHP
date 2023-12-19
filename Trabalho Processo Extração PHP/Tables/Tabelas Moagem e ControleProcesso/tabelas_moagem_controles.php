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


// Funçao para criar as tabelas
function CriarTabelas($conn) {

    // Criar tabela de Parcerias
    $sqlCriarTabelas = "CREATE TABLE IF NOT EXISTS moagem_trituracao (
        id INT AUTO_INCREMENT PRIMARY KEY,
        materia_prima VARCHAR(255),
        quantidade_processada INT,
        equipamentos_utilizados VARCHAR(255)
    );
     
    CREATE TABLE IF NOT EXISTS controle_processo (
        id INT AUTO_INCREMENT PRIMARY KEY,
        temperatura_controle VARCHAR(255),
        tempo_processo VARCHAR(255),
        monitoramento_qualidade VARCHAR(255)
    );";

    // Executar a query
    if ($conn->multi_query($sqlCriarTabelas) === TRUE) {
        echo "Tabelas Criadas com Sucesso\n";
    } else {
        echo "Erro ao criar tabelas" . $conn->error;
    }
}

// Chamar a funçao
CriarTabelas($conn);

?>

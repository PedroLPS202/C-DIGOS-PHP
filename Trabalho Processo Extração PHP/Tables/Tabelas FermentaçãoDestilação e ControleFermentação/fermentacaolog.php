<?php
// Gustavo De Oliveira Vital e Otávio Augusto.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "processo_extracao";

// Conexão banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//Função para criar tabela
function CriarTabelas($conn){
   // Criação da tabelas
    $sqlCriarTabelas = "CREATE TABLE IF NOT EXISTS log_fermentacao_destilacao(
        log_id INT AUTO_INCREMENT PRIMARY KEY,
        id INT NOT NULL,
        data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        alteracao VARCHAR(255) NOT NULL,
        usuario VARCHAR(255) NOT NULL
    );
  
    CREATE TABLE IF NOT EXISTS log_controle_fermentacao (
        log_id INT AUTO_INCREMENT PRIMARY KEY,
        id INT NOT NULL,
        data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        alteracao VARCHAR(255) NOT NULL,
        usuario VARCHAR(255) NOT NULL
    );";

// Executar a query
    if($conn->multi_query($sqlCriarTabelas) === TRUE) {
        echo "Tabela Criada com sucesso\n";  // aparece a mensagem quando a tabela for criada com sucesso
    } else {
        echo "Erro ao criar tabela" .$conn->error;  // aparece a mensagem se caso dar erro ao criar a tabela
    }

} 

CriarTabelas($conn); //Chamar a função e criar a tabela

?>

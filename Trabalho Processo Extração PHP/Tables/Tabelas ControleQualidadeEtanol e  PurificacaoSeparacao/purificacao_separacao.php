<?php

//Maxwell

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "processo_extracao";

// Conexão banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para criar as tabelas
function CriarTabelas($conn) {

    // Criação das tabelas purificacao_separacao e controle_qualidade_etanol
    $sqlCriarTabelas = "CREATE TABLE IF NOT EXISTS purificacao_separacao (
        id INT AUTO_INCREMENT PRIMARY KEY,
        processo_purificacao VARCHAR(255) NOT NULL,
        materiais_utilizados VARCHAR(255) NOT NULL,
        pureza_etanol VARCHAR(255) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS controle_qualidade_etanol (
        id INT AUTO_INCREMENT PRIMARY KEY,
        teste_fisico_quimico VARCHAR(255) NOT NULL, 
        padrao_de_qualidade VARCHAR(255) NOT NULL,
        feedback_laboratorial VARCHAR(255) NOT NULL
    );";

   // Executar a Multi Query
    if($conn->multi_query($sqlCriarTabelas) === TRUE) {
        echo "Tabela Criada com sucesso\n";  // aparece a mensagem quando a tabela for criada com sucesso
    } else {
        echo "Erro ao criar tabela" .$conn->error; // aparece a mensagem se dar erro ao criar a  tabela
    }

} 

CriarTabelas($conn); //Chamar a função e criar a tabela

?>


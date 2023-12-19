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

// Função para criar tabelas
function CriarTabelas($conn){
    
    // Criação da tabela da Fermentação e Destilação e Controle de fermentação
    $sqlCriarTabelas = "CREATE TABLE IF NOT EXISTS fermentacao_destilacao (
        id INT AUTO_INCREMENT PRIMARY KEY,
        temperatura_fermentacao VARCHAR (255),
        tempo_destilacao VARCHAR (255),
        teor_alcoolico VARCHAR(255)
    );

    CREATE TABLE IF NOT EXISTS controle_fermentacao (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tipo_levedura VARCHAR (255),
        ph_fermento VARCHAR (255),
        monitoramento_reacoes VARCHAR(255)
    );";

    // Executar a query
    if($conn->multi_query($sqlCriarTabelas) === TRUE) {
        echo "Tabelas Criadas com Sucesso\n";  // aparece a mensagem quando a tabela for criada com sucesso
    } else {
        echo "Erro ao criar tabelas" . $conn->error; // aparece a mensagem se caso dar erro ao criar a  tabela
    }


}

CriarTabelas($conn); //Chamar a função e criar a tabela

?>
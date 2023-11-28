<?php
// Função para conectar ao banco de dados MySQL
function conectarAoBanco() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ExercíciosBD";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}
// Conectar ao banco de dados
$conn = conectarAoBanco();

// Criar tabela (se não existir)
criarTabelaPessoas($conn);

// Inserir dados na tabela (se necessário)
inserirDados($conn);

// Uso da função getPessoaById
$idProcurado = 11; // Substitua pelo ID desejado
$pessoaEncontrada = getPessoaById($conn, $idProcurado);

// Exibir o resultado
echo "Registro encontrado para o ID $idProcurado:\n";
print_r($pessoaEncontrada);

// Função para criar a tabela "pessoas"
function criarTabelaPessoas($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS pessoas (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        idade INT(3) NOT NULL,
        sexo VARCHAR(1)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabela 'pessoas' criada com sucesso ou já existe.\n";
    } else {
        echo "Erro ao criar tabela: " . $conn->error;
    }
}

// Função para inserir dados na tabela "pessoas"
function inserirDados($conn) {
    $sql = "INSERT INTO pessoas (nome, idade, sexo) VALUES
        ('Pedro', 18, 'M'),
        ('Jessica', 23, 'F'),
        ('Phillipe', 42, 'M')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.\n";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Função para retornar todos os registros da tabela "pessoas"
function getAllPessoas($conn) {
    $sql = "SELECT * FROM pessoas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return "Nenhum resultado encontrado";
    }
}

// Função para buscar e retornar um registro específico da tabela "pessoas" por ID
function getPessoaById($conn, $id) {
    $sql = "SELECT * FROM pessoas WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Nenhum resultado encontrado para o ID $id";
    }
}

// Função para atualizar dados de um registro na tabela "pessoas" por ID
function updatePessoaById($conn, $id, $nome, $idade, $sexo) {
    $sql = "UPDATE pessoas SET nome='$nome', idade=$idade, sexo='$sexo' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso para o ID $id.\n";
    } else {
        echo "Erro ao atualizar dados: " . $conn->error;
    }
}



// Fechar a conexão com o banco de dados
$conn->close();
?>

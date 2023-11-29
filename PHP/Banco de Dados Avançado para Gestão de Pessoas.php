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

// Função para buscar e retornar um registro específico da tabela "pessoas" por ID
function getPessoaById($conn, $id) {
    $sql = "SELECT * FROM pessoas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return "Nenhum resultado encontrado para o ID $id";
    }
}

// Função para atualizar dados de um registro na tabela "pessoas" por ID
function updatePessoaById($conn, $id, $nome, $idade, $sexo) {
    $sql = "UPDATE pessoas SET nome=?, idade=?, sexo=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $nome, $idade, $sexo, $id);

    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso para o ID $id.\n";
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }
}

// Função para excluir uma pessoa, seus pedidos, endereço e números de telefone associados
function excluirPessoaCompleta($conn, $idPessoa) {
    try {
        // Inicia uma transação
        $conn->begin_transaction();

        // Exclui pedidos associados à pessoa
        $sqlPedidos = "DELETE FROM pedidos WHERE pessoa_id = ?";
        $stmtPedidos = $conn->prepare($sqlPedidos);
        $stmtPedidos->bind_param("i", $idPessoa);
        $stmtPedidos->execute();

        // Exclui endereço associado à pessoa
        $sqlEndereco = "DELETE FROM endereco WHERE pessoa_id = ?";
        $stmtEndereco = $conn->prepare($sqlEndereco);
        $stmtEndereco->bind_param("i", $idPessoa);
        $stmtEndereco->execute();

        // Exclui números de telefone associados à pessoa
        $sqlTelefone = "DELETE FROM telefone WHERE pessoa_id = ?";
        $stmtTelefone = $conn->prepare($sqlTelefone);
        $stmtTelefone->bind_param("i", $idPessoa);
        $stmtTelefone->execute();

        // Exclui a pessoa
        $sqlPessoa = "DELETE FROM pessoas WHERE id = ?";
        $stmtPessoa = $conn->prepare($sqlPessoa);
        $stmtPessoa->bind_param("i", $idPessoa);
        $stmtPessoa->execute();

        // Confirma a transação
        $conn->commit();

        echo "Pessoa e dados associados excluídos com sucesso.\n";
    } catch (Exception $e) {
        // Se ocorrer algum erro, faz rollback na transação
        $conn->rollback();
        echo "Erro ao excluir pessoa e dados associados: " . $e->getMessage() . "\n";
    }
}

// Uso da função updatePessoaById
$idPessoaAtualizar = 1; // Substitua pelo ID da pessoa que deseja atualizar
updatePessoaById($conn, $idPessoaAtualizar, 'NovoNome', 25, 'F');

// Uso da função excluirPessoaCompleta
$idPessoaExcluir = 11; // Substitua pelo ID da pessoa que deseja excluir
excluirPessoaCompleta($conn, $idPessoaExcluir);

// Fechar a conexão com o banco de dados
$conn->close();

?>
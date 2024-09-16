<?php
session_start();

include("../private/db/conexao.php"); // Verifique o caminho correto para o arquivo de conexão

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário e escapar para evitar SQL injection
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = $conn->real_escape_string(trim($_POST['password']));
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hash da senha

    // Verificar se o usuário já existe
    $sql = "SELECT id FROM viadaspatinhas.usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuário já existe
        header("Location: ../register.php?error=usuário já cadastrado");
        exit();
    } else {
        // Inserir o novo usuário
        $sql = "INSERT INTO viadaspatinhas.usuarios (username, password) VALUES ('$username', '$hashed_password')";
        
        if ($conn->query($sql) === TRUE) {
            // Cadastro bem-sucedido
            header("Location: ../register.php?success=cadastro realizado com sucesso");
        } else {
            // Erro ao cadastrar
            header("Location: ../register.php?error=erro ao cadastrar");
        }
    }

    // Fechar a conexão
    $conn->close();
}
?>

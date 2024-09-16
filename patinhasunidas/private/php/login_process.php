<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão
include("../db/conexao.php"); // Ajuste o caminho conforme necessário

// Verificar se a conexão foi estabelecida
if (!$conn) {
    die("Erro ao conectar ao banco de dados.");
}

// Verificar se os dados do formulário foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Verificar se os dados foram recebidos corretamente
    if (empty($username) || empty($password)) {
        header("Location: index.php?error=Dados inválidos.");
        exit();
    }

    // Preparar e executar a consulta
    $stmt = $conn->prepare("SELECT id, password FROM viadaspatinhas.usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);

    $response = [];

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Verificar a senha
        if (password_verify($password, $hashed_password)) {
            // Senha correta, criar uma sessão para o usuário
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $username;

            // Redirecionar para a página segura
            header("Location: ./pagina_restrita.php");
            exit();
        } else {
            $response['message'] = "Senha incorreta!";
        }
    } else {
        $response['message'] = "Usuário não encontrado!";
    }

    $stmt->close();
    $conn->close();

    // Enviar a resposta como uma query string para o formulário
    header("Location: index.php?error=" . urlencode($response['message']));
    exit();
} else {
    // Se não for uma requisição POST, redireciona para o formulário
    header("Location: index.php");
    exit();
}
?>

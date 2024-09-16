<?php
session_start();
include('../db/conexao.php'); // Verifique o caminho correto para o arquivo de conexão

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: ../login.php');
    exit();
}

// Obter informações do usuário do banco de dados
$userId = $_SESSION['userid'];

$sql = "SELECT username FROM viadaspatinhas.usuarios WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("ERRO NA PREPARAÇÃO DA CONSULTA: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $username);
mysqli_stmt_fetch($stmt);

mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSA ▏ Via das patinhas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/script.js"></script>
    <link rel="shortcut icon" href="./projeto/apple-touch-icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/estilo.css">
</head>
<body onload="LoadPagePrivate('../../homepriv.php')">
  <nav class="navbar navbar-expand-sm bg-light navbar-light" id="nav">
      <div class="container-fluid">
          <a class="navbar-brand" href="#" onclick="LoadPagePrivate('../../homepriv.php')">
              <img id="img_logo" src="../../assets/img/logo_2.png" alt="Logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="material-symbols-outlined">
                menu
                </span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
              <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="#" onclick="LoadPagePrivate('../../readpriv_adocao.php')">
                          <span class="material-symbols-outlined">pets</span> Central de Adoção
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#" onclick="LoadPagePrivate('../../readpriv_encontre.php')">
                          <span class="material-symbols-outlined">share_location</span> Encontre Seu PET
                      </a>
                  </li>
              </ul>
            <div class="navbar-nav ms-auto">
                <!-- Botão de Sair -->
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">
                        <span class="material-symbols-outlined">logout</span> Sair
                    </a>
                </li>
            </div>
          </div>
      </div>
  </nav>
  <div id="content" class="content">
      <!-- Conteúdo dinâmico será carregado aqui -->
  </div>
</body>
</html>
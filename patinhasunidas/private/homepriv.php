<?php
session_start();
include('./db/conexao.php'); // Verifique o caminho correto para o arquivo de conexão

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
<br>
    <br>
    <br>
    <br>
      <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../projeto/bannerbom.jpg" alt="AAAAAA" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../../projeto/bannerdoguinho.jpg" alt="BBBBBB" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../../projeto/gatobanner.jpg" alt="CCCCC" class="d-block w-100">
                </div>
            </div>
        
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<br>
<br>
<br>
<h1 id="h1ongs">ONG's Parceiras</h1>
<br>
<br>
        <div class="ong-card-container">

            <div class="ong-card">
                <img src="../../projeto/sosaumigos.webp" alt="ONG 1" class="ong-card-img">
                <div class="ong-card-content">
                    <h3>SOS Aumigos</h3>
                </div>
            </div>
            <div class="ong-card">
                <img src="../../projeto/patinhasunidas.jpg" alt="ONG 2" class="ong-card-img">
                <div class="ong-card-content">
                    <h3>Patinhas Unidas</h3>
                </div>
            </div>
            <div class="ong-card">
                <br>
                <br>
                <img src="../../projeto/mapa.jpg" alt="ONG 3" class="ong-card-img">
                <br>
                <br>
                <br>
                <div class="ong-card-content">
                    <h3>Mapa</h3>
                </div>
            </div>
        </div>
<br>
<br>
<br>
<h1 id="h1ongs">Sobre nós</h1>
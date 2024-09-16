<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br>
<br>
<br>
<br>
<main>
        <section class="container_jogos">
            <h1>Iniciar Sessão</h1>
            <form id="loginForm" class="auth-form" action="private/php/login_process.php" method="post">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" autocomplete="off" required>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" autocomplete="off" required>

                <button type="submit" class="auth-btn">Entrar</button>
                
                <p id="error-message" class="error-message">
                    <?php if (isset($_GET['error'])) echo htmlspecialchars($_GET['error']); ?>
                </p>
            </form>
        </section>
</main>
<br>
<br>
<br>
<br> 
</body>
</html>

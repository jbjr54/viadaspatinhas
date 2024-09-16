<br>
<br>
<br>
<br> 
<main>
        <section class="container_jogos">
            <h1>Cadastro de Novo Usuário</h1>
            
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>';
            }
            if (isset($_GET['success'])) {
                echo '<p class="success-message">' . htmlspecialchars($_GET['success']) . '</p>';
            }
            ?>
            <div class="aviso-restrito">Setor restrito à administração</div>
            
            <form action="php/register_process.php" method="post" class="auth-form">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" autocomplete="off" disabled required>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" autocomplete="off" disabled required>

                <button type="submit" class="auth-btn">Cadastrar</button>
            </form>
        </section>
</main>
<br>
<br>
<br>
<br>
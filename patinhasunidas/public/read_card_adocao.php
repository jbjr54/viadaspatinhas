<?php 
    // Chamada de conexão com o Banco de Dados através do arquivo externo
    include("../private/db/conexao.php");

    // ID para a consulta, que normalmente seria obtido de uma variável GET ou POST
    $id = $_GET['id'] ?? 0; // Exemplo: obtém o ID da URL. Ajuste conforme necessário.

    // Comando SQL para obter os detalhes do perfil com base no ID fornecido
    $consulta = "SELECT FOTO_ADOCAO, NOME, ESPECIE, RACA, SEXO, DTA_NASC, CARACT, SAUDE, TUTOR_EMAIL, TUTOR_CELL FROM viadaspatinhas.tb_adocao WHERE ID = ?";

    // Preparar a consulta para evitar SQL Injection
    if ($stmt = $conn->prepare($consulta)) {
        // Bind do parâmetro
        $stmt->bind_param("i", $id);

        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado
        $result = $stmt->get_result();

        // Verifica se a consulta foi bem-sucedida e se há resultados
        if ($result && $result->num_rows > 0) {
            // Obtém os dados da consulta
            $row = $result->fetch_assoc();

            // Escape os dados para evitar XSS
            $foto_adocao = htmlspecialchars($row["FOTO_ADOCAO"]);
            $nome_adocao = htmlspecialchars($row["NOME"]);
            $especie_adocao = htmlspecialchars($row["ESPECIE"]);
            $raca_adocao = htmlspecialchars($row["RACA"]);
            $sexo_adocao = htmlspecialchars($row["SEXO"]);
            $dta_nasc_adocao = htmlspecialchars($row["DTA_NASC"]);
            $caract_adocao = htmlspecialchars($row["CARACT"]);
            $saude_adocao = htmlspecialchars($row["SAUDE"]);
            $tutor_email_adocao = htmlspecialchars($row["TUTOR_EMAIL"]);
            $tutor_cell_adocao = htmlspecialchars($row["TUTOR_CELL"]);
            $birthdate = new DateTime($row["DTA_NASC"]);
            $today = new DateTime('today');
            $interval = $today->diff($birthdate);
                
            // Obtém anos e meses
            $ano_ado = $interval->y;
            $mes_ado = $interval->m;  

            // Fechar o statement
            $stmt->close();
        } else {
            echo "Nenhum registro encontrado.";
        }

    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
?>
<br>
<br>
<br>
<div class="profile-container">
        <div class="profile-header">
            <!-- Exibindo a foto do perfil -->
            <img src="<?php echo htmlspecialchars("../../patinhasunidas/assets/img/adocao/" . $row["FOTO_ADOCAO"], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row["NOME"], ENT_QUOTES, 'UTF-8'); ?>">
            <h1><b><?php echo htmlspecialchars($nome_adocao); ?>, <?php echo $ano_ado; ?> anos e <?php echo $mes_ado; ?> meses</b></h1>

        </div>
        <div class="profile-details">
            <p><label>Espécie:</label> <?php echo htmlspecialchars($especie_adocao); ?></p>
            <p><label>Raça:</label> <?php echo htmlspecialchars($raca_adocao); ?></p>
            <p><label>Sexo:</label> <?php echo htmlspecialchars($sexo_adocao); ?></p>
            <p><label>Características:</label> <?php echo nl2br(htmlspecialchars($caract_adocao)); ?></p>
            <p><label>Saúde:</label> <?php echo htmlspecialchars($saude_adocao); ?></p>
            <p><label>Email do Tutor:</label> <a href="mailto:<?php echo htmlspecialchars($tutor_email_adocao); ?>"><?php echo htmlspecialchars($tutor_email_adocao); ?></a></p>
            <p><label>Celular do Tutor:</label> <?php echo htmlspecialchars($tutor_cell_adocao); ?></p>
        </div>
</div>
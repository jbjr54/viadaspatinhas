<?php
header('Content-Type: application/json');

// Incluindo arquivo de conexão com o banco de dados
include("./db/conexao.php");

// Obtendo o ID do corpo da requisição POST
$id = $_POST['id'] ?? '';
if (empty($id) || !is_numeric($id)) {
    echo json_encode(['success' => false, 'error' => 'ID inválido']);
    exit;
}

// Usando prepared statements para evitar SQL Injection
$stmt = $conn->prepare("SELECT FOTO_ADOCAO FROM viadaspatinhas.tb_adocao WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Removendo imagem da pasta fotos/
    while ($row = $result->fetch_assoc()) {
        $foto = "../assets/img/adocao/" . $row["FOTO_ADOCAO"];
        if (file_exists($foto)) {
            if (!unlink($foto)) {
                echo json_encode(['success' => false, 'error' => 'Falha ao remover a imagem']);
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Imagem não encontrada']);
            exit;
        }
    }
}

// Deletando o produto
$stmt = $conn->prepare("DELETE FROM viadaspatinhas.tb_adocao WHERE id = ?");
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Falha ao deletar o produto']);
}

// Fechando a conexão com o banco de dados
$stmt->close();
$conn->close();
?>

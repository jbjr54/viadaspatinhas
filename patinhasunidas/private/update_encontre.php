<?php
header('Content-Type: application/json');

// Chamada de conexão com o Banco de Dados
include("./db/conexao.php");

// Recupera os dados do POST
$nome_encont = isset($_POST['nome_encont']) ? intval($_POST['nome_encont']) : '';
$especie_encont = isset($_POST['especie_encont']) ? intval($_POST['especie_encont']) : '';
$raca_encont = isset($_POST['raca_encont']) ? intval($_POST['raca_encont']) : '';
$sexo_encont = isset($_POST['sexo_encont']) ? intval($_POST['sexo_encont']) : '';
$dta_nasc_encont = isset($_POST['dta_nasc_encont']) ? intval($_POST['dta_nasc_encont']) : ''; // Data de nascimento
$caract_encont = isset($_POST['caract_encont']) ? intval($_POST['caract_encont']) : '';
$saude_encont = isset($_POST['saude_encont']) ? intval($_POST['sexo_encont']) : '';
$desap = isset($_POST['desap_encont']) ? intval($_POST['desap_encont']) : '';
$tutor_email_encont = isset($_POST['tutor_email_encont']) ? intval($_POST['tutor_email_encont']) : '';
$tutor_cell_encont = isset($_POST['tutor_cell_encont']) ? intval($_POST['tutor_cell_encont']) : '';;
// Lida com o upload do arquivo
$foto_encont = isset($_POST['foto_old']) ? $_POST['foto_old'] : ''; // Default to old photo

if (isset($_FILES['foto_encont']) && $_FILES['foto_encont']['error'] == UPLOAD_ERR_OK) {
    $foto_name = basename($_FILES['foto_encont']['name']);
    $foto_tmp = $_FILES['foto_encont']['tmp_name'];
    $upload_dir = "../assets/img/encontre/";
    $foto_path = $upload_dir . $foto_name;

    // Verifica se o diretório de upload existe e é gravável
    if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
        echo json_encode(['success' => false, 'error' => 'Diretório de upload não encontrado ou não é gravável!']);
        exit;
    }

    // Move o arquivo para o diretório
    if (!move_uploaded_file($foto_tmp, $foto_path)) {
        echo json_encode(['success' => false, 'error' => 'Falha ao mover o arquivo para o diretório de upload.']);
        exit;
    }

    // Atualiza a foto se uma nova foi enviada
    $foto_encont = $foto_name;
}

// Atualiza o banco de dados
$sql = "UPDATE viadaspatinhas.tb_encontre SET FOTO_ENCONT=?, NOME=?, ESPECIE=?, RACA=?, SEXO=?, DTA_NASC=?, CARACT=?, SAUDE=?, TUTOR_EMAIL=?, TUTOR_CELL=? WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $foto_encont_nome, $nome_encont, $especie_encont, $raca_encont, $sexo_encont, $dta_nasc_encont, $caract_encont, $saude_encont, $tutor_email_encont, $tutor_cell_encont);

$response = [];
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = 'Erro ao atualizar o banco de dados: ' . $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
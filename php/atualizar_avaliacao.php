<?php
include 'conexao.php';

$id_avaliacao = isset($_POST['id_avaliacao']) ? (int) $_POST['id_avaliacao'] : 0;
$nota = isset($_POST['nota']) ? (int) $_POST['nota'] : 0;
$comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';

if ($id_avaliacao <= 0 || $nota < 1 || $nota > 5 || $comentario === '') {
    header('Location: ../editar_avaliacao.php?id_avaliacao=' . $id_avaliacao);
    exit;
}

$comentario = $conexao->real_escape_string($comentario);
$sql = "UPDATE avaliacoes SET nota = $nota, comentario = '$comentario', atualizado_em = CURRENT_TIMESTAMP WHERE id_avaliacao = $id_avaliacao AND status = 'ativa'";
$conexao->query($sql);

header('Location: ../gerenciar_avaliacoes.php');
exit;

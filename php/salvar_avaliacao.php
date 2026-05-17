<?php
include 'conexao.php';

$id_produto = isset($_POST['id_produto']) ? (int) $_POST['id_produto'] : 0;
$nota = isset($_POST['nota']) ? (int) $_POST['nota'] : 0;
$comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';

if ($id_produto <= 0 || $nota < 1 || $nota > 5 || $comentario === '') {
    header('Location: ../avaliar.php?id_produto=' . $id_produto);
    exit;
}

$comentario = $conexao->real_escape_string($comentario);
$sql = "INSERT INTO avaliacoes (id_produto, nota, comentario) VALUES ($id_produto, $nota, '$comentario')";
$conexao->query($sql);

header('Location: ../gerenciar_avaliacoes.php');
exit;

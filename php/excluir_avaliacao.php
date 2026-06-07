<?php
include 'conexao.php';

$id_avaliacao = isset($_POST['id_avaliacao']) ? (int) $_POST['id_avaliacao'] : 0;

if ($id_avaliacao > 0) {
    $sql = "UPDATE avaliacoes SET status = 'excluida', atualizado_em = CURRENT_TIMESTAMP WHERE id_avaliacao = $id_avaliacao";
    $conexao->query($sql);
}

header('Location: ../gerenciar_avaliacoes.php');
exit;

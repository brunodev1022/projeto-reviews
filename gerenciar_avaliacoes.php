<?php
include 'php/conexao.php';

$sql = "SELECT a.id_avaliacao, a.nota, a.comentario, a.criado_em, p.nome AS produto_nome
        FROM avaliacoes AS a
        JOIN produtos AS p ON a.id_produto = p.id_produto
        WHERE a.status = 'ativa'
        ORDER BY a.criado_em DESC";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Avaliações - Sistema de Avaliação de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="topo">
        <div class="container">
            <h1>Sistema de Avaliação de Produtos</h1>
            <p>Gerencie as avaliações registradas.</p>
        </div>
    </header>

    <main class="container">
        <section class="secao-titulo">
            <h2>Avaliações ativas</h2>
            <p>Edite ou exclua avaliações já salvas.</p>
        </section>

        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <table class="tabela-avaliacoes">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Nota</th>
                        <th>Comentário</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($avaliacao = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($avaliacao['produto_nome']); ?></td>
                            <td>
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="estrela <?php echo $i <= $avaliacao['nota'] ? 'ativa' : ''; ?>">★</span>
                                <?php endfor; ?>
                            </td>
                            <td><?php echo nl2br(htmlspecialchars($avaliacao['comentario'])); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($avaliacao['criado_em'])); ?></td>
                            <td>
                                <a class="botao-avaliar botao-pequeno" href="editar_avaliacao.php?id_avaliacao=<?php echo (int) $avaliacao['id_avaliacao']; ?>">Editar</a>
                                <form class="form-excluir-avaliacao" action="php/excluir_avaliacao.php" method="post">
                                    <input type="hidden" name="id_avaliacao" value="<?php echo (int) $avaliacao['id_avaliacao']; ?>">
                                    <button type="submit" class="botao-avaliar botao-excluir botao-pequeno" onclick="return confirm('Deseja realmente excluir esta avaliação?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="mensagem-vazia">Não há avaliações ativas no momento.</p>
        <?php endif; ?>

        <div class="acoes-inferiores">
            <a class="botao-avaliar" href="produtos.php">Voltar para produtos</a>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
<?php $conexao->close(); ?>

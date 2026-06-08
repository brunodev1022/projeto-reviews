<?php
require_once _DIR_ . '/php/conexao.php';

$sql = 'SELECT id_produto, nome, descricao, imagem_referencia FROM produtos WHERE ativo = 1 ORDER BY criado_em DESC';
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Escolha um produto e registre sua avaliação no Sistema de Avaliação de Produtos.">
    <title>Produtos — Sistema de Avaliação de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="topo">
        <div class="container topo-conteudo">
            <div class="marca">
                <div class="icone-marca">★</div>
                <div>
                    <h1>Sistema de Avaliação de Produtos</h1>
                    <p>Escolha um produto para acessar a página de avaliação.</p>
                </div>
            </div>
            <a class="botao-topo" href="gerenciar_avaliacoes.php">
                ☰ Ver avaliações realizadas
            </a>
        </div>
    </header>

    <main class="container">

        <section class="secao-titulo">
            <div class="destaque-secao">
                <div class="icone-secao">★</div>
                <div class="texto-secao">
                    <h2>Produtos disponíveis para avaliação</h2>
                    <p>Escolha um produto para acessar a página de avaliação.</p>
                </div>
                <a class="botao-avaliacoes" href="gerenciar_avaliacoes.php">
                    ☰ Ver avaliações realizadas
                </a>
            </div>
        </section>

        <section class="grade-produtos">
            <?php if ($resultado && $resultado->num_rows > 0): ?>
                <?php while ($produto = $resultado->fetch_assoc()): ?>
                    <article class="card-produto">
                        <img
                            src="<?php echo htmlspecialchars($produto['imagem_referencia']); ?>"
                            alt="Imagem de referência do produto <?php echo htmlspecialchars($produto['nome']); ?>"
                            class="produto-imagem"
                        >
                        <div class="card-conteudo">
                            <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                            <p><?php echo htmlspecialchars($produto['descricao']); ?></p>
                            <a class="botao-avaliar" href="avaliar.php?id_produto=<?php echo (int) $produto['id_produto']; ?>">
                                Avaliar produto →
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="mensagem-vazia">Nenhum produto ativo encontrado no momento.</p>
            <?php endif; ?>
        </section>

    </main>

    <script src="js/script.js"></script>
</body>
</html>
<?php
$conexao->close();
?>

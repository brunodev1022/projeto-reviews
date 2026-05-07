<?php
require_once __DIR__ . '/php/conexao.php';

$sql = 'SELECT id_produto, nome, descricao, imagem_referencia FROM produtos WHERE ativo = 1 ORDER BY criado_em DESC';
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviewShop | Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="topo">
        <div class="container">
            <h1>ReviewShop</h1>
            <p>Sistema de Avaliação de Produtos</p>
        </div>
    </header>

    <main class="container">
        <section class="secao-titulo">
            <h2>Produtos disponíveis para avaliação</h2>
            <p>Escolha um produto para acessar a página de avaliação.</p>
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
                                Avaliar produto
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

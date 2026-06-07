<?php
include 'php/conexao.php';

$idProduto = isset($_GET['id_produto']) ? (int) $_GET['id_produto'] : 0;
$produto = null;

if ($idProduto > 0) {
    $sql = "SELECT id_produto, nome, descricao, imagem_referencia FROM produtos WHERE id_produto = $idProduto AND ativo = 1 LIMIT 1";
    $resultado = $conexao->query($sql);
    $produto = $resultado ? $resultado->fetch_assoc() : null;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Produto - Sistema de Avaliação de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="topo">
        <div class="container">
            <h1>Sistema de Avaliação de Produtos</h1>
            <p>Avalie o produto selecionado.</p>
        </div>
    </header>

    <main class="container pagina-avaliacao">
        <?php if ($produto): ?>
            <section class="caixa-avaliacao">
                <div class="info-produto">
                    <img src="<?php echo htmlspecialchars($produto['imagem_referencia']); ?>" alt="Imagem do produto <?php echo htmlspecialchars($produto['nome']); ?>" class="produto-imagem">
                    <div>
                        <h2><?php echo htmlspecialchars($produto['nome']); ?></h2>
                        <p><?php echo htmlspecialchars($produto['descricao']); ?></p>
                    </div>
                </div>

                <form class="avaliacao-form" action="php/salvar_avaliacao.php" method="post">
                    <input type="hidden" name="id_produto" value="<?php echo (int) $produto['id_produto']; ?>">
                    <input type="hidden" name="nota" id="nota" value="0">

                    <label>Nota</label>
                    <div class="avaliacao-estrelas">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <button type="button" class="estrela-botao" data-value="<?php echo $i; ?>">★</button>
                        <?php endfor; ?>
                    </div>

                    <label for="comentario">Comentário</label>
                    <textarea id="comentario" name="comentario" rows="5" placeholder="Escreva seu comentário"></textarea>
                    <div class="erro-avaliacao" aria-live="polite"></div>

                    <button type="submit" class="botao-avaliar">Enviar avaliação</button>
                    <a href="produtos.php" class="botao-avaliar botao-secundario">Voltar para produtos</a>
                </form>
            </section>
        <?php else: ?>
            <div class="caixa-aviso">
                <h2>Produto não encontrado.</h2>
                <p>Verifique o produto selecionado e tente novamente.</p>
                <a href="produtos.php" class="botao-avaliar">Voltar para produtos</a>
            </div>
        <?php endif; ?>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
<?php $conexao->close(); ?>

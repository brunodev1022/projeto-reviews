<?php
$idProduto = isset($_GET['id_produto']) ? (int) $_GET['id_produto'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviewShop | Avaliação</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="topo">
        <div class="container">
            <h1>ReviewShop</h1>
            <p>Sistema de Avaliação de Produtos</p>
        </div>
    </header>

    <main class="container pagina-avaliacao">
        <div class="caixa-aviso">
            <h2>Página de avaliação será desenvolvida na Sprint 2.</h2>
            <p>ID do produto selecionado: <strong><?php echo $idProduto; ?></strong></p>
            <a href="produtos.php" class="botao-avaliar">Voltar para produtos</a>
        </div>
    </main>
</body>
</html>

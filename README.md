# Sistema de Avaliação de Produtos

Projeto acadêmico da disciplina **Laboratório de Inovação III**, com foco na construção de um sistema para avaliação de produtos.

## Objetivo
Disponibilizar uma plataforma simples em que usuários possam escolher produtos e registrar avaliações, seguindo a evolução por sprints.

## Tecnologias utilizadas
- PHP
- HTML
- CSS
- JavaScript (simples)
- MySQL
- Apache/XAMPP

## Arquitetura em duas camadas
1. **Camada Cliente:** navegador com renderização de HTML, CSS e JavaScript.
2. **Camada Servidor:** Apache com PHP, responsável pelo processamento das páginas e consultas ao MySQL.

## Funcionalidades previstas
- Exibição de produtos cadastrados.
- Registro de avaliações por produto.
- Atualização e exclusão de avaliações.
- Gerenciamento das avaliações.

## Sprints do projeto
- Sprint 1: Página de Produtos
- Sprint 2: Página de Avaliação
- Sprint 3: Atualizar e Excluir Avaliação
- Sprint 4: Gerenciamento de Avaliações
- Sprint 5: Ajustes finais e documentação

## Entrega da Sprint 1
- Estrutura inicial do projeto criada.
- Página de produtos (`produtos.php`) integrada ao banco de dados.
- Listagem de produtos em cards com imagem, descrição e botão **Avaliar produto**.
- Redirecionamento de `index.php` para a página de produtos.
- Página `avaliar.php` preparada apenas como placeholder da Sprint 2.
- Script SQL com criação do banco, tabela `produtos` e dados fictícios.

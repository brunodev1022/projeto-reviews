CREATE DATABASE IF NOT EXISTS sistema_avaliacao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sistema_avaliacao;

CREATE TABLE IF NOT EXISTS produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    imagem_referencia VARCHAR(255),
    ativo TINYINT DEFAULT 1,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS avaliacoes (
    id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    nome_avaliador VARCHAR(100) NOT NULL,
    nota TINYINT NOT NULL,
    comentario TEXT NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_avaliacoes_produtos
        FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

INSERT INTO produtos (nome, descricao, imagem_referencia, ativo) VALUES
('Fone Bluetooth Pulse', 'Fone sem fio com som estéreo e bateria de longa duração.', 'img/produtos/fone-bluetooth.svg', 1),
('Smartwatch MoveFit', 'Relógio inteligente com monitoramento de atividades e sono.', 'img/produtos/smartwatch.svg', 1),
('Caixa de Som BeatBox', 'Caixa portátil com conexão Bluetooth e resistência à água.', 'img/produtos/caixa-som.svg', 1),
('Teclado Mecânico NitroKey', 'Teclado mecânico com iluminação LED e teclas silenciosas.', 'img/produtos/teclado-mecanico.svg', 1),
('Mouse Gamer Falcon', 'Mouse ergonômico com ajuste de DPI e iluminação RGB.', 'img/produtos/mouse-gamer.svg', 1),
('Webcam HD Vision', 'Webcam com resolução HD para videoaulas e reuniões online.', 'img/produtos/webcam-hd.svg', 1);

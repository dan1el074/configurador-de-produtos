DROP DATABASE product_config;
CREATE DATABASE product_config;
USE product_config;

CREATE TABLE tb_products ( 
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    options TEXT NOT NULL,
    rules TEXT
);

INSERT INTO tb_products (id, name, abbreviation, options, rules) VALUES (0, 'Niveladora de Docas Avançada', 'NDA', '1,2,3,4,5,11', '{"fosso": [["padrão","F500 P500"], ["especial",""]], "teste": [["padrão","teste1"], ["especial",""]]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (1, 'Niveladora de Docas Embutida', 'NDE', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (2, 'Niveladora de Doca Movel', 'NDM', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (3, 'Mesa Elevatória Extra Baixa', 'MEB', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (4, 'Mini Rampa', 'MR', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (5, 'Plataforma Veicular', 'VR', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (6, 'Porta Seccional', 'PTA', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (7, 'Prolongador de Garfo', 'PG', '0,1,5');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (8, 'Mesa Elevatoria', 'ME', '1,2,3,4,5');
INSERT INTO tb_products (id, name, abbreviation, options, rules) VALUES (9, 'Mesa Extra Baixa', 'MEB', '1,2,3,4,5', '{"formato": [["","U"], ["","E"]]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (10, 'Testandoooo', 'TESTE', '0,1,5');

CREATE TABLE tb_finish (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL
);

INSERT INTO tb_finish (id, name, abbreviation) VALUES (0, 'Galvanizado a Fogo', 'GALVANIZADO');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (1, 'Amarelo segurança munsell 5Y 8/12', 'AMARELO');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (2, 'Azul segurança munsell 2,5 PB 4/10', 'AZUL');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (3, 'Preto', 'PRETO');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (4, 'Cinza RAL 7031', 'CINZA');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (5, 'Laranja Segurança munsell 2.5YR 6/14', 'LARANJA');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (6, 'Testandoooo', 'TESTE');

CREATE TABLE tb_weight (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL
);

INSERT INTO tb_weight (id, name, abbreviation) VALUES (0, 'Até 1 TON', '10');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (1, 'Até 1,5 TON', '15');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (2, 'Até 2 TON', '20');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (3, 'Até 2,5 TON', '25');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (4, 'Até 3 TON', '30');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (5, 'Até 4 TON', '40');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (6, 'Até 6,5 TON', '65');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (7, 'Até 9 TON', '9');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (8, 'Até 12 TON', '12');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (9, 'Até 14 TON', '14');
INSERT INTO tb_weight (id, name, abbreviation) VALUES (10, 'Testando', 'TESTE');

CREATE TABLE tb_length (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL
);

INSERT INTO tb_length (id, name, abbreviation) VALUES (0, '1200mm','12');
INSERT INTO tb_length (id, name, abbreviation) VALUES (1, '1400mm','14');
INSERT INTO tb_length (id, name, abbreviation) VALUES (2, '1500mm','15');
INSERT INTO tb_length (id, name, abbreviation) VALUES (3, '1700mm','17');
INSERT INTO tb_length (id, name, abbreviation) VALUES (4, '2000mm','20');
INSERT INTO tb_length (id, name, abbreviation) VALUES (5, '2400mm','24');
INSERT INTO tb_length (id, name, abbreviation) VALUES (6, '2500mm','25');
INSERT INTO tb_length (id, name, abbreviation) VALUES (7, '3000mm','30');
INSERT INTO tb_length (id, name, abbreviation) VALUES (8, '3500mm','35');
INSERT INTO tb_length (id, name, abbreviation) VALUES (9, '4000mm','40');
INSERT INTO tb_length (id, name, abbreviation) VALUES (10, 'Testando', 'TESTE');

CREATE TABLE tb_width (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL
);

INSERT INTO tb_width (id, name, abbreviation) VALUES (0, '1000mm','10');
INSERT INTO tb_width (id, name, abbreviation) VALUES (1, '1200mm','12');
INSERT INTO tb_width (id, name, abbreviation) VALUES (2, '1400mm','14');
INSERT INTO tb_width (id, name, abbreviation) VALUES (3, '1500mm','15');
INSERT INTO tb_width (id, name, abbreviation) VALUES (4, '1700mm','17');
INSERT INTO tb_width (id, name, abbreviation) VALUES (5, '1800mm','18');
INSERT INTO tb_width (id, name, abbreviation) VALUES (6, '2000mm','20');
INSERT INTO tb_width (id, name, abbreviation) VALUES (7, '2500mm','25');
INSERT INTO tb_width (id, name, abbreviation) VALUES (8, 'Testando', 'TESTE');

CREATE TABLE tb_drive (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    rules TEXT
);

INSERT INTO tb_drive (id, name, abbreviation, rules) VALUES (0, 'Elétrico hidráulico','EH', '{"voltagem": [["","220V"], ["","380V"], ["","440V"]], "tipo": [["","Trifasico"], ["","Monofasico"], ["","Bifasico"]]}');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (1, 'Hidráulico manual','HM');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (2, 'Mola a gás','MG');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (3, 'Mola Helicoidal','MH');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (4, 'Testando', 'TESTE');

CREATE TABLE tb_optional (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    rules TEXT,
    show_in_result BOOLEAN NOT NULL
);

INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (0, 'Guarda corpo Fixo','GC FIX', TRUE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result, rules) VALUES (1, 'Luminária para doca','*', FALSE,'{"watts": [["","30W"], ["","100W"]], "dimenção": [["padrão","600x600mm"], ["especial",""]]}');
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (2, 'Guarda corpo Romovivel','GC REM', TRUE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (3, 'Abas laterais','AL', TRUE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (4, 'NR10','N1', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (5, 'NR12','N2', TRUE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (6, 'Pedestal','PED', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (7, 'PROTEÇÃO UH','PROT UH', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (8, 'BARRA ANTI ESMAGAMENTO','BAI', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (9, 'Guarda corpo Rebativel','CG REB', TRUE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (10, 'Batente','*', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result, rules) VALUES (11, 'Escada para Doca','*', FALSE, '{"dimenção": [["padrão","1200mm"], ["especial",""]]}');
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (12, 'Calço para Rodas','*', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (13, 'Guia de Rodas','*', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (14, 'Sinaleiro de Doca','SD', FALSE);
INSERT INTO tb_optional (id, name, abbreviation, show_in_result) VALUES (15, 'Testando', 'TESTE', TRUE);

CREATE TABLE tb_user (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO tb_user (name, password) VALUES ('admin', '$2y$10$V.6GtJsuO6AnHW9OTsD7dOl90Zvd.vUBDxrjGUvdpfQDAaoiQRbiS')

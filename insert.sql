DROP DATABASE product_config;
CREATE DATABASE product_config;
USE product_config;

CREATE TABLE tb_products ( 
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    options TEXT NOT NULL
);

INSERT INTO tb_products (id, name, abbreviation, options) VALUES (0, 'Niveladora de Docas Avançada', 'NDA', '{"options": [1,2,3,4,5], "rules": {"fosso": [["padrão","F500 P500"], ["","especial"]], "teste1": [["padrão","testando!"], ["","especial"]]}}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (1, 'Niveladora de Docas Embutida', 'NDE', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (2, 'Niveladora de Doca Movel', 'NDM', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (3, 'Mesa Elevatória Extra Baixa', 'MEB', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (4, 'Mini Rampa', 'MR', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (5, 'Plataforma Veicular', 'VR', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (6, 'Porta Seccional', 'PTA', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (7, 'Prolongador de Garfo', 'PG', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (8, 'Mesa Elevatoria', 'ME', '{"options": [1,2,3,4,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (9, 'Mesa Extra Baixa', 'MEB', '{"options": [1,2,3,4,5], "rules": {"formato": [["","U"], ["","E"]]}}');

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
INSERT INTO tb_finish (id, name, abbreviation) VALUES (6, '', 'Especial');

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

CREATE TABLE tb_drive (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    options TEXT
);

INSERT INTO tb_drive (id, name, abbreviation, options) VALUES (0, 'Elétrico hidráulico','EH', '{"rules": {"voltagem": [["","220V"], ["","380V"], ["","440V"]], "tipo": [["","Trifasico"], ["","Monofasico"], ["","Bifasico"]]}}');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (1, 'Hidráulico manual','HM');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (2, 'Mola a gás','MG');
INSERT INTO tb_drive (id, name, abbreviation) VALUES (3, 'Mola Helicoidal','MH');

CREATE TABLE tb_optional (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    options TEXT
);

INSERT INTO tb_optional (id, name, abbreviation) VALUES (0, 'Guarda corpo Fixo','GC FIX');
INSERT INTO tb_optional (id, name, abbreviation, options) VALUES (1, 'Luminária para doca','*','{"rules": {"watts": [["","30W"], ["","100W"]], "dimenção": [["padrão","600x600mm"], ["","especial"]]}}');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (2, 'Guarda corpo Romovivel','GC REM');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (3, 'Abas laterais','AL');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (4, 'NR10','N1');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (5, 'NR12','N2');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (6, 'Pedestal','PED');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (7, 'PROTEÇÃO UH','PROT UH');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (8, 'BARRA ANTI ESMAGAMENTO','BAI');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (9, 'Guarda corpo Rebativel','CG REB');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (10, 'Batente','*');
INSERT INTO tb_optional (id, name, abbreviation, options) VALUES (11, 'Escada para Doca','*','{"rules": {"dimenção": [["padrão","1200mm"], ["","especial"]]}}');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (12, 'Calço para Rodas','*');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (13, 'Guia de Rodas','*');
INSERT INTO tb_optional (id, name, abbreviation) VALUES (14, 'Sinaleiro de Doca','SD');

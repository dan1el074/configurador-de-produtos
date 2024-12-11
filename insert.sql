-- DROP DATABASE product_config;
CREATE DATABASE product_config;
USE product_config;

CREATE TABLE tb_products ( 
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    options TEXT NOT NULL
);

INSERT INTO tb_products (id, name, abbreviation, options) VALUES (1, 'Niveladora de Docas Avançada', 'NDA', '{"options": [1,2,3,4,5], "rules": {"fosso": [["padrão","F500 P500"], ["especial",""]]}}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (2, 'Niveladora de Docas Embutida', 'NDE', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (3, 'Niveladora de Doca Movel', 'NDM', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (4, 'Mesa Elevatória Extra Baixa', 'MEB', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (5, 'Mini Rampa', 'MR', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (6, 'Plataforma Veicular', 'VR', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (7, 'Porta Seccional', 'PTA', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (8, 'Prolongador de Garfo', 'PG', '{"options": [0,1,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (9, 'Mesa Elevatoria', 'ME', '{"options": [1,2,3,4,5]}');
INSERT INTO tb_products (id, name, abbreviation, options) VALUES (10, 'Mesa Extra Baixa', 'MEB', '{"options": [1,2,3,4,5], "rules": {"opções": [["formato em U","U"], ["formato em E","E"]]}}');

CREATE TABLE tb_finish (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL
);

INSERT INTO tb_finish (id, name, abbreviation) VALUES (1, 'Galvanizado a Fogo', 'GALVANIZADO');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (2, 'Amarelo segurança munsell 5Y 8/12', 'AMARELO');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (3, 'Azul segurança munsell 2,5 PB 4/10', 'AZUL');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (4, 'Preto', 'PRETO');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (5, 'Cinza RAL 7031', 'CINZA');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (6, 'Laranja Segurança munsell 2.5YR 6/14', 'LARANJA');
INSERT INTO tb_finish (id, name, abbreviation) VALUES (7, 'Especial', '');

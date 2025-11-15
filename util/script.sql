CREATE DATABASE accelerods
character set utf8mb4
COLLATE utf8mb4_unicode_ci;

USE accelerods;

CREATE TABLE usuarios (
    id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, -- identificador único
    nome VARCHAR(255) NOT NULL, -- nome completo do usuário
    cpf VARCHAR(14), -- CPF no formato 000.000.000-00
    data_nascimento DATE, -- data no formato yyyy-mm-dd
    genero CHAR(1), --M, F, O
    celular VARCHAR(20), -- celular com DDD
    rua VARCHAR(255), -- nome da rua
    numero VARCHAR(10), -- número da residência
    complemento VARCHAR(50), -- complemento (ex: apto)
  --  bairro VARCHAR(255), -- bairro
    cidade VARCHAR(255), -- cidade
  --  cep VARCHAR(10), -- CEP
    estado CHAR(2), -- estado (ex: SP, RJ)
    email VARCHAR(255) NOT NULL, -- e-mail válido
    tipo_usuario ENUM('Administrador', 'Funcionário', 'Cliente') NOT NULL, -- tipo de usuário
    senha VARCHAR(255) NOT NULL, -- senha criptografada
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- data de criação
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- data de alteração
    deleted_at TIMESTAMP NULL DEFAULT NULL -- marcação de exclusão lógica
);


CREATE TABLE categorias (
	id_categoria BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(255) NOT null,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- data de criação
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- data de alteração
    deleted_at TIMESTAMP NULL DEFAULT NULL -- marcação de exclusão lógica
);

INSERT INTO categorias (descricao) VALUES
('Carro'),
('Motocicleta'),
('Caminhão'),
('Picape'),
('Ônibus');

CREATE TABLE produtos (
    id_produto BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(255) NOT NULL,
    modelo VARCHAR(255) NOT NULL,
    ano INT NOT NULL,
    descricao TEXT,
    quantidade INT NOT NULL DEFAULT 1,
    valor_unitario DECIMAL(10,2) NOT NULL,
    id_categoria BIGINT UNSIGNED NOT null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- data de criação
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- data de alteração
    deleted_at TIMESTAMP NULL DEFAULT null, -- marcação de exclusão lógica
    
    CONSTRAINT fk_produtos_categorias
        FOREIGN KEY (id_categoria)
        REFERENCES categorias(id_categoria)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

INSERT INTO produtos (
    marca,
    modelo,
    ano,
    descricao,
    quantidade,
    valor_unitario,
    id_categoria
) VALUES
( 'Hot Wheels', 'Deora II', 2010, 'Modelo clássico série Surf Rods.', 5, 18.99, 1),
( 'Hot Wheels', 'Bone Shaker', 2018, 'Edição especial com crânio frontal.', 3, 22.50, 1),
('Maisto', 'Lamborghini Aventador', 2015, 'Miniatura 1:64 com ótimo acabamento.', 2, 29.90, 1),
('Jada Toys', 'Nissan Skyline R34', 2020, 'Versão Fast & Furious, detalhes premium.', 1, 39.99, 1),
('Matchbox', 'Ford F-150 Raptor', 2019, 'Pick-up off-road de alta qualidade.', 4, 17.50, 1);

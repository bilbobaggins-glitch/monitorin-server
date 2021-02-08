create database monitorin;

use monitorin;

create table rgperfis (
    id int auto_increment,
    rg varchar(11) unique,
    professor boolean,

    primary key (id)
);

create table usuarios (
	id int auto_increment,
    nome varchar(30) not null,
	sobrenome varchar(60) not null,
    usuario varchar(30) unique,
    senha varchar(30) not null,
    rg_id int not null,

    primary key (id),
    foreign key (rg_id) references rgperfis (id) on update cascade on delete restrict
);

create table turmas (
    id int auto_increment,
    disciplina varchar(30) not null unique,
    professor_id int not null,

    primary key (id),
    foreign key (professor_id) references usuarios (id) on update cascade on delete restrict
);

create table estudanteturmas (
    estudante_id int not null,
    turma_id int not null,

    foreign key (estudante_id) references usuarios (id) on update cascade on delete restrict,
    foreign key (turma_id) references turmas (id) on update cascade on delete restrict
);

insert into rgperfis (rg, professor) values
('11122233344', true),
('22233344455', true),
('33344455566', false),
('44455566677', false),
('55566677788', false),
('66677788899', false),
('77788899900', false),
('88899900011', false),
('99900011122', false);

insert into usuarios (nome, sobrenome, usuario, senha, rg_id) values
('valentina', 'silva1', 'valentinasilva1', '1234', 1),
('valentina', 'silva2', 'valentinasilva2', '1234', 2),
('miguel', 'silva1', 'miguelsilva1', '1234', 3),
('miguel', 'silva2', 'miguelsilva2', '1234', 4),
('miguel', 'silva3', 'miguelsilva3', '1234', 5),
('miguel', 'silva4', 'miguelsilva4', '1234', 6),
('miguel', 'silva5', 'miguelsilva5', '1234', 7),
('miguel', 'silva6', 'miguelsilva6', '1234', 8),
('miguel', 'silva7', 'miguelsilva7', '1234', 9);

insert into turmas (disciplina, professor_id) values
('Programação 1', 1),
('Programação 2', 1),
('Programação 3', 1),
('Programação 4', 1),
('Matemática 1', 2),
('Matemática 2', 2);

insert into estudanteturmas (estudante_id, turma_id) values
(3, 1), (3, 2), (3, 3),
(4, 2), (4, 3), (4, 4),
(5, 1), (5, 3),
(6, 2), (6, 4),
(7, 1), (7, 2), (7, 4), (7, 6), (7, 5), (7, 3),
(8, 1),
(9, 4), (9, 6), (9, 5), (9, 1);
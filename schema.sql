
--in mysql
create table musicas (
	id int auto_increment not null,
	nomeMusica VARCHAR(255) not null,
	id_artista int,
	primary key(id),
	foreign key(id_artista) references artistas(id)
);

CREATE TABLE usuario (
	id INT auto_increment NOT NULL ,
	nomeUsuario VARCHAR(255) NOT NULL,
	emailUsuario VARCHAR(255) NOT NULL,
	senhaUsuario VARCHAR(255),
	validado BOOLEAN NOT NULL DEFAULT(false),
	token_email VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE artistas (
	id INT auto_increment not null,
	nome VARCHAR(255),
	primary key(id)
);

CREATE TABLE playlist (
	id INT auto_increment NOT NULL,
	nome_playlist VARCHAR(255) NOT NULL,
	id_musicas VARCHAR(60),
	PRIMARY KEY (id)
);


--in postgresql

CREATE TABLE IF NOT EXISTS usuario (
	id BIGSERIAL PRIMARY KEY,
	nomeUsuario VARCHAR(50) NOT NULL,
	emailUsuario VARCHAR(100) NOT NULL,
	senhaUsuario VARCHAR(50) NOT NULL,
	validado BOOLEAN DEFAULT(false),
	token_email  VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS artista (
	id bigserial primary key not null,
	nome varchar(50) not null 
);

create table if not exists musicas (
	id bigserial primary key not null,
	nomeMusica varchar(50) not null,
	id_artista integer not null,
	foreign key(id_artista) references artistas(id)
);


create table if not exists playlist(
	id bigserial not null primary key,
	nome_playlist varchar(100) not null,
	id_musicas integer not null
);

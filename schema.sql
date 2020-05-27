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

CREATE TABLE playlist (
	id INT auto_increment NOT NULL,
	nome_playlist VARCHAR(255) NOT NULL,
	id_musicas VARCHAR(60),
	PRIMARY KEY (id)
);


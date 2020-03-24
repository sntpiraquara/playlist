CREATE TABLE `playlist`.`musicas` (
	`id` INT auto_increment NOT NULL,
	`nomeArtista` VARCHAR(255) NOT NULL,
	`nomeMusica` VARCHAR(255) NOT NULL,
	`tipo` VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE `playlist`.`usuario` (
	`id` INT auto_increment NOT NULL ,
	`nomeUsuario` VARCHAR(255) NOT NULL,
	`emailUsuario` VARCHAR(255) NOT NULL,
	`senhaUsuario` VARCHAR(255),
	`validado` BOOLEAN NOT NULL DEFAULT(false),
	`token_email` VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE playlist (
	id INT auto_increment NOT NULL,
	nome_playlist VARCHAR(255) NOT NULL,
	id_musicas VARCHAR(60),
	PRIMARY KEY (id)
);

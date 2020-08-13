CREATE TABLE setor (
	id serial primary key,
	sigla varchar(16) not null,
	nome varchar(255) not null,
	email varchar(255) not null
);

CREATE TABLE usuario (
	id serial primary key,
	nome varchar(50) not null,
	ra_siape varchar(7) not null,
	email varchar(255) not null,
	senha varchar(255) not null,
	id_tipo integer not null,
	CONSTRAINT usuario_tipo_fk FOREIGN KEY (id_tipo) REFERENCES usuario_tipo (id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE usuario_tipo (
	id serial primary key,
	nome varchar(16) not null,
	descricao varchar(255) not null
);

CREATE TABLE ocorrencia_tipo (
	id serial primary key,
	nome varchar(255) not null,
	descricao varchar(255) not null,
	id_setor integer not null,
	CONSTRAINT setor_fk FOREIGN KEY (id_setor) REFERENCES setor (id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE ocorrencia (
	id serial primary key,
	descricao text not null,
	dominio integer null,
	criador integer not null,
	alvo varchar(255) not null,
	data_hora timestamp not null,
	situacao varchar(255) not null,
	ot_id integer not null,
	CONSTRAINT ocorrencia_tipo_fk FOREIGN KEY (ot_id) REFERENCES ocorrencia_tipo (id) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT usuario_criador_fk FOREIGN KEY (criador) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE NO ACTION
);
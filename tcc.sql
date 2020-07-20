CREATE TABLE setor (
	id_setor serial primary key,
	descricao varchar(255) not null,
	email varchar(255) not null
);

CREATE TABLE usuario (
	id_usuario serial primary key,
	nome varchar(50) not null,
	data_nascimento timestamp not null,
	ra_siape varchar(7) not null,
	senha varchar(255) not null,
	email varchar(255) not null,
	tipo char(1) not null,
	setor_id integer null
);

CREATE TABLE ocorrencia_tipo (
	id_ocorrencia_tipo serial primary key,
	descricao varchar(255) not null,
	setor_id integer not null,
	CONSTRAINT ot_setor_fk FOREIGN KEY (setor_id)
      REFERENCES setor (id_setor) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE ocorrencia (
	id_ocorrencia serial primary key,
	descricao varchar(255) not null,
	dominio integer not null,
	criador integer not null,
	alvo integer null,
	data_hora timestamp not null,
	situacao varchar(255) not null,
	ot_id integer not null,
	CONSTRAINT ocorrencia_idtipo_fk FOREIGN KEY (ot_id)
      REFERENCES ocorrencia_tipo (id_ocorrencia_tipo) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT usuario_dominio_fk FOREIGN KEY (dominio)
      REFERENCES usuario (id_usuario) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT usuario_criador_fk FOREIGN KEY (criador)
      REFERENCES usuario (id_usuario) ON UPDATE CASCADE ON DELETE CASCADE
);
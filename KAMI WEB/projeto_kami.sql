CREATE EXTENSION IF NOT EXISTS pgcrypto;

--TABELA CLIENTE

CREATE TABLE Cliente (
	id_cli serial NOT NULL,
	nomeCli varchar(40) NOT NULL,
	emailCli varchar(40) NOT NULL,
	telefoneCli varchar(40) NOT NULL,
	senhaCli varchar(150) NOT NULL,
	CONSTRAINT pk_Cliente PRIMARY KEY(id_cli),
	CONSTRAINT emailCli UNIQUE (emailCli)
);

SELECT * FROM CLIENTE

--TABELA CABELEIREIRO

CREATE TABLE Cabeleireiro (
	id_cab serial NOT NULL,
	nomeCab varchar(40) NOT NULL,
	emailCab varchar(40) NOT NULL,
	senhaCab varchar(150) NOT NULL,
	CONSTRAINT pk_Cabeleireiro PRIMARY KEY(id_cab),
	CONSTRAINT emailCab UNIQUE (emailCab)
);

SELECT * FROM CABELEIREIRO

--TABELA SALAO

CREATE TABLE Salao (
	id_salao serial NOT NULL,
	id_cab int NOT NULL,
	nomeSalao varchar(40) NOT NULL,
	telefoneSalao varchar(40) NOT NULL,
	urlfoto varchar(1000),
	cidadeSalao varchar(40) NOT NULL,
	ruaSalao varchar(40) NOT NULL,
	bairroSalao varchar(40) NOT NULL,
	numSalao int NOT NULL,
	CONSTRAINT pk_Salao PRIMARY KEY(id_salao),
	CONSTRAINT fk_Cabeleireiro_Salao FOREIGN KEY (id_cab) REFERENCES Cabeleireiro (id_cab)
);

SELECT * FROM SALAO

--TABELA AGENDAMENTO
CREATE TABLE Agendamento (
	id_agendamento serial,
	id_salao int,
	id_cli int,
	horario timestamp,
	CONSTRAINT pk_Agendamento PRIMARY KEY(id_agendamento),
	CONSTRAINT fk_Cliente_Agendamento FOREIGN KEY (id_cli) REFERENCES Cliente (id_cli),
	CONSTRAINT fk_Salao_Agendamento FOREIGN KEY (id_salao) REFERENCES Salao (id_salao)
);

SELECT * FROM AGENDAMENTO
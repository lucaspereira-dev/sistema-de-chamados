CREATE DATABASE IF NOT EXISTS db_chamados;

USE db_chamados;

CREATE TABLE IF NOT EXISTS tbl_chamados(
    id_chamado INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    status_chamado VARCHAR(50) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    requerente VARCHAR(100) NOT NULL,
    data_solicitacao DATE NOT NULL,
    log_update DATETIME,
    log_insert DATETIME NOT NULL
);
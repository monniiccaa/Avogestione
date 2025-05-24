CREATE USER AvoGestione IDENTIFIED BY 'AvoGestione';

GRANT SELECT, DELETE, INSERT, UPDATE ON AvoGestione.* TO AvoGestione;


CREATE DATABASE AvoGestione;

USE AvoGestione;

CREATE TABLE users
(
    id       int(11) PRIMARY KEY AUTO_INCREMENT,
    username varchar(255)                      NOT NULL,
    password varchar(255)                      NOT NULL,
    ruolo    enum ('Organizzatore','Studente') NOT NULL
);

CREATE TABLE corsi
(
    id              int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titolo          varchar(255) NOT NULL UNIQUE,
    descrizione     varchar(255) NOT NULL,
    dataEORA        timestamp    NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    maxPartecipanti int(11)      NOT NULL,
    idOrganizzatore int(11)      NOT NULL REFERENCES users (id),
    aula            varchar(255) NOT NULL
);

CREATE TABLE iscrizioni
(
    userId  int(11) NOT NULL REFERENCES users (id),
    corsoId int(11) NOT NULL REFERENCES corsi (id)
);


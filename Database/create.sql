-- Desativar foreign_keys para evitar erros na DROP TABLE. Estas são atividades no povoar.sql
-- para garantir a integridade referencial
PRAGMA foreign_keys = off;
.mode columns
.headers on
.nullvalue NULL

DROP TABLE IF EXISTS User;
CREATE TABLE User (
  idUser        INTEGER                            PRIMARY KEY,
  username      VARCHAR(255)                       NOT NULL,
  password      VARCHAR(255)                       NOT NULL
);

DROP TABLE IF EXISTS Pet;
CREATE TABLE Pet (
    idPet       INTEGER                            PRIMARY KEY,
    petName     VARCHAR(255),
    specie      VARCHAR(255),
    gender      VARCHAR(255),
    size        VARCHAR(255),
    color       VARCHAR(255)
);

DROP TABLE IF EXISTS UserLookingPet;
CREATE TABLE UserLookingPet (
  idUser                   INTEGER                 PRIMARY KEY REFERENCES User(idUser) ON DELETE SET NULL ON UPDATE CASCADE,
  idPet                    INTEGER                 REFERENCES Pet(idPet)
);

DROP TABLE IF EXISTS UserFoundPet;
CREATE TABLE UserFoundPet (
  idUser                   INTEGER                 PRIMARY KEY REFERENCES User(idUser) ON DELETE SET NULL ON UPDATE CASCADE,
  idPet                    INTEGER                 REFERENCES Pet(idPet),
  info                     VARCHAR(255)
);

DROP TABLE IF EXISTS FavoritePet;
CREATE TABLE FavoritePet (
    idUser         INTEGER                         REFERENCES User(idUser) ON DELETE SET NULL ON UPDATE CASCADE,
    idPet          INTEGER                         REFERENCES Pet(idPet) ON DELETE SET NULL ON UPDATE CASCADE,
    PRIMARY KEY(idUser, idPet)
);


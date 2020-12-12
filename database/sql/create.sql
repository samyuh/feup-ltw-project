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
  gender        VARCHAR(255)                        NOT NULL,
  age           VARCHAR(255)                        NOT NULL,
  location      VARCHAR(255) NOT NULL,
  password      VARCHAR(255)                       NOT NULL
);

DROP TABLE IF EXISTS Pet;
CREATE TABLE Pet (
    idPet       INTEGER                            PRIMARY KEY,
    petName     VARCHAR(255),
    specie      VARCHAR(255),
    gender      VARCHAR(255),
    size        VARCHAR(255),
    color       VARCHAR(255),
    bio         VARCHAR(255)
);

DROP TABLE IF EXISTS PetQuestion;
CREATE TABLE PetQuestion (
  idQuestion               INTEGER                 PRIMARY KEY,
  idPet                    INTEGER                 REFERENCES Pet(idPet),
  info VARCHAR(255) 
);

DROP TABLE IF EXISTS PetPhoto;
CREATE TABLE PetPhoto (
  idPhoto                  INTEGER                 PRIMARY KEY,
  idPet                    INTEGER                 REFERENCES Pet(idPet)
);

DROP TABLE IF EXISTS AdoptionProposal;
CREATE TABLE AdoptionProposal (
  idUser                   INTEGER                 REFERENCES User(idUser),
  idPet                    INTEGER                 REFERENCES Pet(idPet),
  PRIMARY KEY(idUser,idPet)
);

DROP TABLE IF EXISTS UserAdoptedPet;
CREATE TABLE UserAdoptedPet (
  idUser                   INTEGER                 REFERENCES User(idUser),
  idPet                    INTEGER                 REFERENCES Pet(idPet),
  PRIMARY KEY(idUser,idPet)
);

DROP TABLE IF EXISTS UserFoundPet;
CREATE TABLE UserFoundPet (
  idUser                   INTEGER                 REFERENCES User(idUser),
  idPet                    INTEGER                 REFERENCES Pet(idPet),
  PRIMARY KEY(idUser,idPet)
);

DROP TABLE IF EXISTS FavoritePet;
CREATE TABLE FavoritePet (
    idUser         INTEGER                         REFERENCES User(idUser),
    idPet          INTEGER                         REFERENCES Pet(idPet),
    PRIMARY KEY(idUser, idPet)
);

DROP TABLE IF EXISTS PostsPet;
CREATE TABLE PostsPet (
    id         INTEGER                  PRIMARY KEY,
    idPet          INTEGER              REFERENCES Pet(idPet),
    POST VARCHAR(255)
);


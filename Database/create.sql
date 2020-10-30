-- Desativar foreign_keys para evitar erros na DROP TABLE. Estas são atividades no povoar.sql
-- para garantir a integridade referencial
PRAGMA foreign_keys = off;
.mode columns
.headers on
.nullvalue NULL
INSERT INTO User(idUser, username, gender, age, location, password) VALUES(1, 'zini', 'f', '10', 'porto', '$2y$12$KRXOWfuFrwukHslr1Mp/4.m4tYxRQc6nDpSdrUDz.j.BuYDV/YNp6'); --queen1
INSERT INTO User(idUser, username, gender, age, location, password) VALUES(2, 'progengi', 'm', '10', 'porto', '$2y$12$XKnC6gQiuuu8t.BybIx2QuyOY.MagaAa0sT.DGqbbtmM4yUrHxfq6'); --hello1
INSERT INTO User(idUser, username, gender, age, location, password) VALUES(3, 'Samuh', 'm', '10', 'porto', '$2y$12$zxktWBarMsZiPPbtIHFPYusc7pmFPiJCduCZDFNj4bfmnlXmlDzG2'); --gambit1

INSERT INTO Pet VALUES(1,'Carlitos','dog','male','medium','brown', 'BIO');
INSERT INTO Pet VALUES(2,'Puskas','dog','male','small','yellow', 'BIO');
INSERT INTO Pet VALUES(3,'Blackie','cat','female','small','black', 'BIO');
INSERT INTO Pet VALUES(4,'Snow','cat','female','medium','white', 'BIO');
INSERT INTO Pet VALUES(5,'kaiser','dog','male','large','brown', 'BIO');
INSERT INTO Pet VALUES(6,'Bob','dog','male','small','yellow', 'BIO');
INSERT INTO Pet VALUES(7,'Whiskers','cat','male','small','black and white', 'BIO');
INSERT INTO Pet VALUES(8,'Minie','dog','female','small','light brown', 'BIO');
INSERT INTO Pet VALUES(9,'Mickey','dog','male','small','dark bown', 'BIO');
INSERT INTO Pet VALUES(10,'Blitz','dog','male','small','black', 'BIO');

INSERT INTO UserAdoptedPet VALUES(1, 5);

INSERT INTO UserFoundPet VALUES(1,1);
INSERT INTO UserFoundPet VALUES(1,2);
INSERT INTO UserFoundPet VALUES(1,3);
INSERT INTO UserFoundPet VALUES(2,4);
INSERT INTO UserFoundPet VALUES(2,5);
INSERT INTO UserFoundPet VALUES(2,6);
INSERT INTO UserFoundPet VALUES(3,7);
INSERT INTO UserFoundPet VALUES(3,8);
INSERT INTO UserFoundPet VALUES(3,9);
INSERT INTO UserFoundPet VALUES(3,10);

INSERT INTO FavoritePet VALUES(1,1);
INSERT INTO FavoritePet VALUES(2,2);
INSERT INTO FavoritePet VALUES(2,3);
INSERT INTO FavoritePet VALUES(2,4);
INSERT INTO FavoritePet VALUES(3,3);
INSERT INTO FavoritePet VALUES(3,4);

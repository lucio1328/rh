insert into Users (Nom, Email, Password) values ('lucio', 'lucio@gmail.com', 'Lucio1328');

INSERT INTO besoin (typePoste, description, respPrincip, etudes, experience)
VALUES
('Developpeur Web', 'Developpement applications web en utilisant les technologies PHP, JavaScript, et MySQL.', 'Responsable IT', 'Bac+3 en informatique', 2);
INSERT INTO besoin (typePoste, description, respPrincip, etudes, experience)
VALUES
('Developpeur Web', 'Developpement applications web en utilisant les technologies PHP', 'ITU', 'Bac+3 en informatique', 1);

INSERT INTO statut (libelle) VALUES
('en attente'),
('classifier'),
('test'),
('entretien'),
('accepter');
INSERT INTO statut (libelle) VALUES
('refuser');

insert into documents(designation) values ('CV'),
('Lettre de motivation'),
('Diplomes');

CREATE TABLE profils (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    poste_actuel VARCHAR(100),
    date_debut DATE,
    etudes VARCHAR(100),
    experience INT
);

insert into profils(nom, poste_actuel, date_debut, etudes, experience) values ('Manoa Finaritra', 'DSI', '2020-10-02', 'Info Bacc+3', 5);
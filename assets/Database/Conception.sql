CREATE TABLE Users(
    id SERIAL PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL
);

CREATE TABLE besoin (
    id SERIAL PRIMARY KEY,
    typePoste VARCHAR(50) NOT NULL unique,
    description VARCHAR(250),
    respPrincip VARCHAR(250) NOT NULL,
    etudes VARCHAR(50) NOT NULL,
    experience INTEGER NOT NULL
);

CREATE TABLE profils (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    poste_actuel VARCHAR(100),
    date_debut DATE,
    etudes VARCHAR(100),
    experience INT
);

CREATE TABLE candidat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    date_naissance date,
    etudes VARCHAR(100),
    experience INT
);

CREATE TABLE statut (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(100)
);

CREATE TABLE candidature (
    id SERIAL PRIMARY KEY,
    id_candidat INTEGER NOT NULL,
    id_besoin INTEGER NOT NULL,
    date_candidature DATE DEFAULT CURRENT_DATE,
    id_statut INTEGER DEFAULT 1,
    FOREIGN KEY (id_candidat) REFERENCES candidat(id),
    FOREIGN KEY (id_besoin) REFERENCES besoin(id),
    FOREIGN KEY (id_statut) REFERENCES statut(id)
);

CREATE TABLE avis_test (
    id SERIAL PRIMARY KEY,
    id_candidature INTEGER NOT NULL,
    message TEXT NOT NULL,
    date_test DATE NOT NULL,
    heure_test TIME,
    FOREIGN KEY (id_candidature) REFERENCES candidature(id)
);

CREATE TABLE besoin_lib(
    id_besoin INTEGER,
    avantages VARCHAR(250),
    date_limite VARCHAR(250),
     FOREIGN KEY (id_besoin) REFERENCES besoin(id)
);

CREATE TABLE documents (
    id SERIAL PRIMARY KEY,
    designation VARCHAR(100)
);

CREATE TABLE pieceAFournir (
    idBesoin INTEGER,
    idDocuments INTEGER,
    PRIMARY KEY (idBesoin, idDocuments),
    FOREIGN KEY (idBesoin) REFERENCES besoin(id),
    FOREIGN KEY (idDocuments) REFERENCES documents(id)
);

CREATE TABLE moyenPourPostuler (
    idBesoin INTEGER,
    designation VARCHAR(16)
);

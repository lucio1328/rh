DROP DATABASE grh;

\c postgres

CREATE DATABASE grh;

\c grh;

 
CREATE TABLE utilisateurs(
    id SERIAL PRIMARY KEY,
    id_source INT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    role VARCHAR(50) CHECK (role IN ('admin', 'employe', 'candidat')),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

 
CREATE TABLE employes(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL, 
    adresse VARCHAR(255) NOT NULL,
    sexe VARCHAR(50) CHECK (sexe IN ('feminin', 'masculin')),
    contact VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    date_embauche TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

 
CREATE TABLE competences (
    id SERIAL PRIMARY KEY,               
    nom VARCHAR(255) NOT NULL,           
    description TEXT,                   
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);
 
CREATE TABLE candidats(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL, 
    adresse VARCHAR(255) NOT NULL,
    sexe VARCHAR(50) CHECK (sexe IN ('feminin', 'masculin')),
    contact VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);
 
CREATE TABLE postes(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

 
CREATE TABLE employe_competences(
    employe_id INT NOT NULL,               
    competence_id INT NOT NULL,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   
    PRIMARY KEY (employe_id, competence_id),   
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE,   
    FOREIGN KEY (competence_id) REFERENCES competences(id) ON DELETE CASCADE   
);
 
CREATE TABLE employe_postes(
    employe_id INT NOT NULL,               
    poste_id INT NOT NULL,
    niveau_competence VARCHAR(50) CHECK (niveau_competence IN ('debutant', 'intermediaire', 'avance', 'expert')) DEFAULT 'debutant',
    experience INT NOT NULL,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   
    PRIMARY KEY (employe_id, poste_id),   
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE,   
    FOREIGN KEY (poste_id) REFERENCES postes(id) ON DELETE CASCADE   
);

 
CREATE TABLE offres (
    id SERIAL PRIMARY KEY,
    poste_id INT NOT NULL, 
    titre VARCHAR(255) NOT NULL, 
    description TEXT NOT NULL,
    date_publication TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    date_limite DATE NOT NULL,
    salaire_min DECIMAL(10, 2),
    salaire_max DECIMAL(10, 2),
    type_contrat VARCHAR(50) CHECK (type_contrat IN ('CDI', 'CDD', 'Stage', 'Freelance')), 
    statut VARCHAR(50) CHECK (statut IN ('ouverte','ferme')) DEFAULT 'ouverte', 
    localisation VARCHAR(255),
    experience_requise INT DEFAULT 0,
    competences_requises TEXT, 
    teletravail BOOLEAN, 
    nb_postes INT DEFAULT 1, 
    FOREIGN KEY (poste_id) REFERENCES postes(id) ON DELETE CASCADE
);


 
CREATE TABLE candidatures(
    id SERIAL PRIMARY KEY,
    offre_id INT NOT NULL,
    candidat_id INT NOT NULL,
    cv TEXT,
    lettre_motivation TEXT,
    date_evaluation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_candidature TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR(50) CHECK (statut IN ('en attente', 'acceptee', 'refusee')) DEFAULT 'en attente',
    FOREIGN KEY (offre_id) REFERENCES offres(id) ON DELETE CASCADE,
    FOREIGN KEY (candidat_id) REFERENCES candidats(id) ON DELETE CASCADE
);

 
CREATE TABLE evaluations(
    id SERIAL PRIMARY KEY,
    candidature_id INT NOT NULL,  
    score DECIMAL(5,2),  
    commentaires TEXT,   
    date_evaluation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (candidature_id) REFERENCES candidatures(id) ON DELETE CASCADE
);
 
CREATE TABLE entretients(
    id SERIAL PRIMARY KEY,
    candidature_id INT NOT NULL,   
    date_entretien TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    resultat VARCHAR(50) CHECK (resultat IN ('positif', 'negatif', 'en attente')) DEFAULT 'en attente',   
    commentaires TEXT,   
    FOREIGN KEY (candidature_id) REFERENCES candidatures(id) ON DELETE CASCADE
);
 
CREATE TABLE notifications(
    id SERIAL PRIMARY KEY,
    utilisateur_id INT NOT NULL,  
    message TEXT,   
    date_notification TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE CASCADE
);
 
CREATE TABLE periode_essaies(
    id SERIAL PRIMARY KEY,
    candidat_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut VARCHAR(50) CHECK (statut IN ('en cours', 'terminee')) DEFAULT 'en cours',
    FOREIGN KEY (candidat_id) REFERENCES candidats(id) ON DELETE CASCADE
);

CREATE TABLE promotions(
    id SERIAL PRIMARY KEY,
    employe_id INT NOT NULL,
    ancienne_poste_id INT NOT NULL,
    nouveau_poste_id INT NOT NULL,
    date_promotion DATE NOT NULL,
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE,
    FOREIGN KEY (ancienne_poste_id) REFERENCES postes(id) ON DELETE CASCADE,
    FOREIGN KEY (nouveau_poste_id) REFERENCES postes(id) ON DELETE CASCADE
);
 
CREATE TABLE contrats(
    id SERIAL PRIMARY KEY,
    employe_id INT NOT NULL,
    poste_id INT NOT NULL,   
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    type VARCHAR(50) CHECK (type IN ('cdi', 'cdd')),
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE,
    FOREIGN KEY (poste_id) REFERENCES postes(id) ON DELETE CASCADE
);


DROP TABLE contrats;

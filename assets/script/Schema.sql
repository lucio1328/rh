DROP DATABASE rh ;

CREATE DATABASE rh;
\c rh;


CREATE TABLE postes (
    id SERIAL PRIMARY KEY,
    nom_poste VARCHAR(255) UNIQUE NOT NULL,
    description TEXT
);

CREATE TABLE competences (
    id SERIAL PRIMARY KEY,
    nom_competence VARCHAR(100) UNIQUE NOT NULL,
    description TEXT
);

CREATE TABLE niveaux_experience (
    id SERIAL PRIMARY KEY,
    niveau VARCHAR(50) UNIQUE NOT NULL,
    description TEXT
);

CREATE TABLE employes (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    poste_id INT REFERENCES postes(id),
    date_embauche DATE DEFAULT CURRENT_DATE,
    niveau_experience_id INT REFERENCES niveaux_experience(id)
);

CREATE TABLE employe_competences (
    id SERIAL PRIMARY KEY,
    employe_id INT REFERENCES employes(id) ON DELETE CASCADE,
    competence_id INT REFERENCES competences(id) ON DELETE CASCADE,
    niveau_experience_id INT REFERENCES niveaux_experience(id)
);

CREATE TABLE besoins (
    id SERIAL PRIMARY KEY,
    poste_id INT REFERENCES postes(id),
    description TEXT,
    date_creation DATE DEFAULT CURRENT_DATE,
    date_limite DATE,
    statut VARCHAR(50) DEFAULT 'Ouvert'
);

CREATE TABLE besoins_competences (
    id SERIAL PRIMARY KEY,
    besoin_id INT REFERENCES besoins(id) ON DELETE CASCADE,
    competence_id INT REFERENCES competences(id),
    niveau_experience_id INT REFERENCES niveaux_experience(id)
);

CREATE TABLE annonces (
    id SERIAL PRIMARY KEY,
    besoin_id INT REFERENCES besoins(id) ON DELETE CASCADE,
    plateforme VARCHAR(100),
    date_publication DATE DEFAULT CURRENT_DATE,
    date_fin DATE,
    statut VARCHAR(50) DEFAULT 'Active'
);

CREATE TABLE candidats (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mdp VARCHAR(100) NOT NULL,
    telephone VARCHAR(15),
    statut VARCHAR(50) DEFAULT 'En attente'
);

CREATE TABLE admin(
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mdp VARCHAR(255) NOT NULL
);

CREATE TABLE cv (
    id SERIAL PRIMARY KEY,
    candidat_id INT REFERENCES candidats(id) ON DELETE CASCADE,
    titre_professionnel VARCHAR(255),                                                           
    experiences TEXT,                             
    disponibilite VARCHAR(50),                                        
    salaire_souhaite DECIMAL(10, 2),                   
    date_creation DATE DEFAULT CURRENT_DATE,   
    etudes TEXT,          
    competences_specifiques TEXT,                        
    qualites TEXT,                                       
    loisirs TEXT                                          
);

CREATE TABLE lettres_motivation (
    id SERIAL PRIMARY KEY,
    candidat_id INT REFERENCES candidats(id) ON DELETE CASCADE,
    titre VARCHAR(255),
    contenu TEXT,
    date_creation DATE DEFAULT CURRENT_DATE
);

CREATE TABLE candidatures (
    id SERIAL PRIMARY KEY,
    candidat_id INT REFERENCES candidats(id) ON DELETE CASCADE,
    annonce_id INT REFERENCES annonces(id) ON DELETE CASCADE,
    cv_id INT REFERENCES cv(id) ON DELETE CASCADE,
    lettres_motivation_id INT REFERENCES lettres_motivation(id) ON DELETE CASCADE,
    date_candidature DATE DEFAULT CURRENT_DATE,
    statut VARCHAR(50) DEFAULT 'En attente'
);


CREATE TABLE tests (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    type VARCHAR(50),
    date_creation DATE DEFAULT CURRENT_DATE
);

CREATE TABLE resultats_tests (
    id SERIAL PRIMARY KEY,
    test_id INT REFERENCES tests(id) ON DELETE CASCADE,
    candidat_id INT REFERENCES candidats(id) ON DELETE CASCADE,
    score DECIMAL(5, 2),
    date_passage DATE DEFAULT CURRENT_DATE,
    statut VARCHAR(50) DEFAULT 'En attente'
);

CREATE TABLE entretiens (
    id SERIAL PRIMARY KEY,
    candidature_id INT REFERENCES candidatures(id) ON DELETE CASCADE,
    date_entretien DATE,
    mode VARCHAR(50),
    statut VARCHAR(50) DEFAULT 'En attente',
    commentaires TEXT
);

CREATE TABLE resultats_entretiens (
    id SERIAL PRIMARY KEY,
    entretien_id INT REFERENCES entretiens(id) ON DELETE CASCADE,
    score DECIMAL(5, 2) NOT NULL,
    evaluation TEXT,
    commentaires TEXT,
    date_evaluation DATE DEFAULT CURRENT_DATE,
    statut VARCHAR(50) DEFAULT 'Evalué'
);

CREATE TABLE periodes_essai (
    id SERIAL PRIMARY KEY,
    employe_id INT REFERENCES employes(id) ON DELETE CASCADE,
    date_debut DATE,
    date_fin DATE,
    statut VARCHAR(50) DEFAULT 'En cours',
    commentaires TEXT
);

CREATE TABLE contrats (
    id SERIAL PRIMARY KEY,
    employe_id INT REFERENCES employes(id) ON DELETE CASCADE,
    type_contrat VARCHAR(50),
    date_signature DATE DEFAULT CURRENT_DATE,
    date_debut DATE,
    date_fin DATE,
    statut VARCHAR(50) DEFAULT 'Actif'
);

CREATE TABLE promotions (
    id SERIAL PRIMARY KEY,
    employe_id INT REFERENCES employes(id) ON DELETE CASCADE,
    nouveau_poste_id INT REFERENCES postes(id),
    date_promotion DATE DEFAULT CURRENT_DATE,
    commentaires TEXT
);

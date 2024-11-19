INSERT INTO postes (nom, description) 
VALUES 
('Developpeur Backend', 'Responsable du developpement et de la maintenance des applications côte serveur, incluant la gestion des bases de donnees et des API.'),
('Developpeur Frontend', 'Responsable de la conception et de l implementation de l interface utilisateur d une application web ou mobile.'),
('Responsable RH', 'Gere le recrutement, la gestion du personnel, et les processus RH dans l entreprise.'),
('Chef de projet', 'Coordonne les projets d entreprise, assure la liaison entre les differents departements et supervise les equipes.'),
('Administrateur Systeme', 'Assure la gestion, la maintenance, et la securite des serveurs et des systemes informatiques de l entreprise.'),
('Designer UX/UI', 'Cree des interfaces utilisateurs conviviales et esthetiques tout en optimisant l experience utilisateur.'),
('Responsable Marketing', 'elabore et met en œuvre les strategies marketing pour promouvoir les produits et services de l entreprise.');


INSERT INTO employes (nom, prenom, date_naissance, adresse, sexe, contact, email) 
VALUES 
('Ranaivo', 'Hery', '1990-05-15', 'Lot I, Ankorondrano, Antananarivo', 'masculin', '034 12 34 56', 'hery.ranaivo@email.com'),
('Rasoanaivo', 'Ny Aina', '1985-03-20', 'Lot II, Ambohibao, Antananarivo', 'feminin', '033 45 67 89', 'nyaina.rasoanaivo@email.com'),
('Rakoto', 'Andry', '1992-08-10', 'Lot III, Ankazomanga, Fianarantsoa', 'masculin', '032 12 34 56', 'andry.rakoto@email.com'),
('Ramalason', 'Vola', '1988-07-02', 'Lot IV, Mahajanga', 'feminin', '033 54 67 89', 'vola.ramalason@email.com'),
('Raharimanana', 'Tahina', '1995-12-22', 'Lot V, Toamasina', 'masculin', '034 23 45 67', 'tahina.rahari@email.com');


INSERT INTO employe_postes (employe_id, poste_id, niveau_competence, experience) 
VALUES 
(1, 2, 'avance', 5),  -- Hery Ranaivo, employe avec 5 ans d'experience, poste de niveau 'avance'
(2, 1, 'intermediaire', 3),  -- Ny Aina Rasoanaivo, 3 ans d'experience, poste de niveau 'intermediaire'
(3, 3, 'expert', 8),  -- Andry Rakoto, 8 ans d'experience, poste de niveau 'expert'
(4, 2, 'debutant', 1),  -- Vola Ramalason, debutant avec 1 an d'experience, poste de niveau 'debutant'
(5, 1, 'intermediaire', 4);  -- Tahina Raharimanana, 4 ans d'experience, poste de niveau 'intermediaire'


INSERT INTO competences (nom, description) 
VALUES 
('Java', 'Competence en developpement d applications avec Java, y compris l utilisation de frameworks comme Spring Boot, Hibernate et JavaFX.'),
('SQL', 'Competence en conception, gestion et manipulation de bases de donnees relationnelles avec SQL, y compris l optimisation des requêtes et la gestion des transactions.'),
('HTML/CSS', 'Competence en developpement web frontend, incluant la creation de pages web statiques et dynamiques avec HTML5 et CSS3.'),
('JavaScript', 'Competence en developpement frontend avec JavaScript, en particulier avec des bibliotheques et frameworks modernes comme React, Angular et Vue.js.'),
('Gestion de projet', 'Competence en gestion de projets, y compris la planification, le suivi et la gestion des risques, ainsi que l utilisation de methodologies Agile et Scrum.'),
('UI/UX Design', 'Competence en conception d interfaces utilisateur intuitives et esthetiques, avec un accent sur l experience utilisateur (UX) et l interface utilisateur (UI).'),
('Docker', 'Competence dans la conteneurisation des applications avec Docker, y compris la gestion des images et des conteneurs, ainsi que l orchestration avec Kubernetes.'),
('Git', 'Competence dans l utilisation de Git pour la gestion de version et la collaboration sur des projets de developpement logiciel.'),
('Node.js', 'Competence en developpement backend avec Node.js, notamment dans la creation d API RESTful et l utilisation de bases de donnees NoSQL.'),
('Python', 'Competence en developpement Python, notamment pour le traitement de donnees, l automatisation et l intelligence artificielle.');



 
INSERT INTO employe_competences (employe_id, competence_id) 
VALUES 
(1, 1),  
(1, 2);  -- Hery -> SQL

-- Lier Rasoanaivo Ny Aina avec HTML/CSS et JavaScript
INSERT INTO employe_competences (employe_id, competence_id) 
VALUES 
(2, 3),  -- Ny Aina -> HTML/CSS
(2, 4);  -- Ny Aina -> JavaScript

-- Lier Rakoto Andry avec Docker et Java
INSERT INTO employe_competences (employe_id, competence_id) 
VALUES 
(3, 1),  -- Andry -> Java
(3, 5);  -- Andry -> Docker

-- Lier Ramalason Vola avec SQL et JavaScript
INSERT INTO employe_competences (employe_id, competence_id) 
VALUES 
(4, 2),  -- Vola -> SQL
(4, 4);  -- Vola -> JavaScript

-- Lier Raharimanana Tahina avec Docker et HTML/CSS
INSERT INTO employe_competences (employe_id, competence_id) 
VALUES 
(5, 5),  -- Tahina -> Docker
(5, 3);  -- Tahina -> HTML/CSS


INSERT INTO contrats (employe_id, poste_id, date_debut, date_fin, type)
VALUES (1, 2, '2024-01-01', '9999-12-31', 'cdi');


INSERT INTO promotions (employe_id, ancienne_poste_id, nouveau_poste_id, date_promotion)
VALUES (1, 2, 3, '2024-05-01');



-- Insertion des offres dans la table "offres"

-- Offre 1 : CDI - Developpeur Backend
INSERT INTO offres (poste_id, titre, description, date_publication, date_limite, salaire_min, salaire_max, type_contrat, statut, localisation, experience_requise, competences_requises, teletravail, nb_postes)
VALUES 
(1, 'Developpeur Backend', 'Nous recherchons un developpeur Backend avec des competences en Java, Spring Boot et bases de donnees relationnelles.', '2024-11-17 08:00:00', '2024-12-31', 3000.00, 4500.00, 'CDI', 'ouverte', 'Paris', 3, 'Java, Spring Boot, PostgreSQL, APIs REST', FALSE, 2);

-- Offre 2 : CDD - Chef de Projet
INSERT INTO offres (poste_id, titre, description, date_publication, date_limite, salaire_min, salaire_max, type_contrat, statut, localisation, experience_requise, competences_requises, teletravail, nb_postes)
VALUES 
(2, 'Chef de Projet', 'Gestion de projet pour le developpement d une nouvelle plateforme e-commerce, en coordination avec les equipes techniques.', '2024-11-16 09:00:00', '2025-02-28', 3500.00, 5000.00, 'CDD', 'ouverte', 'Lyon', 5, 'Gestion de projet, Agile, Communication, Leadership', TRUE, 1);

-- Offre 3 : Stage - Developpeur Frontend
INSERT INTO offres (poste_id, titre, description, date_publication, date_limite, salaire_min, salaire_max, type_contrat, statut, localisation, experience_requise, competences_requises, teletravail, nb_postes)
VALUES 
(3, 'Developpeur Frontend', 'Stage pour le developpement de fonctionnalites Frontend en utilisant ReactJS et TypeScript.', '2024-11-15 10:00:00', '2025-01-15', 1000.00, 1500.00, 'Stage', 'ouverte', 'Remote', 0, 'ReactJS, TypeScript, HTML, CSS', TRUE, 3);

-- Offre 4 : Freelance - Consultant SEO
INSERT INTO offres (poste_id, titre, description, date_publication, date_limite, salaire_min, salaire_max, type_contrat, statut, localisation, experience_requise, competences_requises, teletravail, nb_postes)
VALUES 
(4, 'Consultant SEO', 'Consultant SEO independant pour ameliorer le classement de nos pages sur les moteurs de recherche.', '2024-11-14 11:00:00', '2025-03-01', 1500.00, 2500.00, 'Freelance', 'ouverte', 'Paris', 2, 'SEO, Google Analytics, Marketing Digital', TRUE, 1);

-- Offre 5 : CDI - Data Scientist
INSERT INTO offres (poste_id, titre, description, date_publication, date_limite, salaire_min, salaire_max, type_contrat, statut, localisation, experience_requise, competences_requises, teletravail, nb_postes)
VALUES 
(5, 'Data Scientist', 'Nous cherchons un Data Scientist pour travailler sur des projets d intelligence artificielle et de machine learning.', '2024-11-13 12:00:00', '2025-01-31', 4000.00, 6000.00, 'CDI', 'ouverte', 'Teletravail', 4, 'Python, Machine Learning, TensorFlow, Pandas', TRUE, 2);

-- Offre 6 : CDD - Designer UI/UX
INSERT INTO offres (poste_id, titre, description, date_publication, date_limite, salaire_min, salaire_max, type_contrat, statut, localisation, experience_requise, competences_requises, teletravail, nb_postes)
VALUES 
(6, 'Designer UI/UX', 'Nous recherchons un designer UI/UX pour la refonte de notre site web et la creation d interfaces modernes et attractives.', '2024-11-12 14:00:00', '2025-02-28', 2500.00, 4000.00, 'CDD', 'ouverte', 'Marseille', 2, 'Figma, Sketch, UX Design, Wireframes', TRUE, 1);





INSERT INTO candidatures (offre_id, candidat_id, cv, lettre_motivation, date_candidature, statut)
VALUES
(1, 1, 'Nom: Jean Dupont Adresse: 123 Rue Exemple, 75000 Paris, France Telephone: 01 23 45 67 89 Email: jean.dupont@example.com Profil: Ingenieur logiciel experimente avec plus de 5 ans dexperience dans le developpement dapplications Web et de solutions logicielles. Passionne par la technologie et toujours à la recherche de nouveaux defis pour ameliorer les systèmes existants. Competences: - Langages de programmation: Java, Python, PHP, JavaScript - Frameworks: Spring, Django, React.js - Outils: Git, Docker, Jenkins - Gestion de bases de donnees: MySQL, PostgreSQL - Methodologies agiles: Scrum, Kanban Experience professionnelle: - Ingenieur logiciel, TechCorp, Paris, France (2019 - Present)     - Developpement de fonctionnalites backend pour une plateforme de gestion de projets.     - Collaboration avec les equipes de frontend pour lintegration des API.     - Mise en œuvre de tests unitaires et fonctionnels pour assurer la qualite du code. - Developpeur junior, WebDev Inc., Paris, France (2016 - 2019)     - Conception et developpement dapplications Web pour des clients du secteur prive.     - Maintenance des systèmes existants et resolution des bugs. Formation: - Master en Informatique, Universite de Paris (2016) - Licence en Informatique, Universite de Lyon (2014) Langues: - Français: Langue maternelle - Anglais: Courant Centres dinterêt: - Lecture - Voyages - Programmation open-source', 
'Lettre de motivation pour le poste de developpeur.', '2024-11-01 10:30:00', 'en attente'),

(2, 1, 'CV_102.pdf', 'Lettre de motivation pour le poste de chef de projet.', '2024-11-02 14:15:00', 'acceptee'),

(3, 1, 'CV_103.pdf', 'Lettre de motivation pour le poste de designer graphique.', '2024-11-03 09:45:00', 'refusee'),

(4, 1, 'CV_104.pdf', 'Lettre de motivation pour le poste de developpeur back-end.', '2024-11-04 13:00:00', 'en attente'),

(5, 1, 'CV_105.pdf', 'Lettre de motivation pour le poste de directeur marketing.', '2024-11-05 16:20:00', 'acceptee');

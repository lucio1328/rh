INSERT INTO admin (nom, prenom, email, mdp) 
VALUES 
(
    'Dupont', 
    'Jean', 
    'jean@gmail.com', 
    'passe'-- Utilisation de SHA2 pour le hachage, mais ce n'est pas sécurisé pour les mots de passe
);

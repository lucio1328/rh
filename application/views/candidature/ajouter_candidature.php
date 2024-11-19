<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Candidature</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
            background-color: #007BFF;
            color: white;
        }

        form {
            width: 60%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        /* Responsivité pour les petits écrans */
        @media (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>Formulaire de Candidature</h1>
    <form action="<?= site_url('candidature/insert') ?>" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>

        <label for="etudes">Études:</label>
        <textarea id="etudes" name="etudes" required></textarea><br>

        <label for="annee_experience">Années d'Expérience:</label>
        <input type="number" id="annee_experience" name="annee_experience" min="0" required><br>

        <label for="besoins">Besoins:</label>
        <select id="besoins" name="besoins" required>
            <?php foreach($besoins as $besoin) { ?>
                <option value="<?= $besoin->id ?>"><?= $besoin->typeposte ?></option>
            <?php } ?>
        </select><br>

        <button type="submit">Soumettre la Candidature</button>
    </form>
    <div>
        <h3>Questionnaire</h3>
        <ul>
            <li>La date de déposition des dossiers n'a-t-elle pas dépasser la date limite de candidature</li>
            <li>Les documents demandés sont-ils complet</li>
            <li>Cette candidature a-t-elle suivi les étapes pour postuler selon les règles de l'entreprise </li>
        </ul>
    </div>
</body>
</html>

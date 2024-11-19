<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis de Test pour Candidature</title>
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

        .form-container {
            width: 60%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="text"], textarea, input[type="date"], input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h1>Ajouter un Avis de Test</h1>

    <div class="form-container">
        <form method="POST" action="<?= site_url('candidature/ajouter_avis') ?>">
            <input type="hidden" name="id_candidature" value="<?= $id_candidature ?>">

            <label for="message">Message :</label>
            <textarea name="message" id="message" rows="4" required></textarea>

            <label for="date_test">Date du test :</label>
            <input type="date" name="date_test" id="date_test" required>

            <label for="heure_test">Heure du test :</label>
            <input type="time" name="heure_test" id="heure_test" required>

            <button type="submit">Envoyer Avis</button>
        </form>
    </div>

    <div class="back-link">
        <a href="<?= site_url('candidature/listeBesoins') ?>">Liste Besoins</a>
    </div>
    <div>
        <h3>Questionnaire</h3>
        <ul>
            <li>Les compétences essentielles mentionnées dans le CV sont-elles alignées avec les attentes du poste ?</li> 
            <li>Le candidat possède-t-il les compétences techniques ou spécifiques nécessaires pour réussir dans le rôle ?</li> 
            <li>Les candidats ayant des profils similaires ont-ils généralement réussi les tests ou montré des compétences adéquates ?</li>
        </ul>
    </div>
</body>
</html>

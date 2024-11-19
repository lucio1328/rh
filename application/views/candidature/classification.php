<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidats pour le Besoin</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            font-size: 14px;
        }

        /* Responsivité pour les petits écrans */
        @media (max-width: 768px) {
            table {
                width: 100%;
                margin: 10px;
            }

            th, td {
                font-size: 12px;
                padding: 8px;
            }
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        button {
            padding: 8px 16px;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        /* Style du lien de retour */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Candidats Correspondant au Besoin</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Expérience</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidats as $candidat) { ?>
                <tr>
                    <td><?= $candidat->candidat_id ?></td>
                    <td><?= $candidat->nom ?></td>
                    <td><?= $candidat->prenom ?></td>
                    <td><?= $candidat->experience ?> annees</td>
                    <td><a href="<?= site_url('candidature/avis/' . $candidat->id_candidature) ?>"><button>Avis test</button></a>
                    <a href="<?= site_url('candidature/refuser/' . $candidat->id_candidature) ?>"><button>Refuser</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="back-link">
        <a href="<?= site_url('candidature/listeBesoins') ?>">Retour</a>
    </div>
    <div>
        <h3>Questionnaire</h3>
        <ul>
            <li>Les études du talent conviennent il au demande de l'entreprise ou dans un domaine connexe</li> 
            <li>Le talent n'a-t-il pas d'antécédents </li> 
            <li>Ce talent nécessite t-il une test de moralité </li>
        </ul>
    </div>
</body>
</html>

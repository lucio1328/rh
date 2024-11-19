<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Avis de Test</title>
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

        .table-container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-bottom: 20px;
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

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 16px;
        }

        .back-link a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Liste des Avis pour le Besoin : <?= isset($avis[0]->besoin_type) ? htmlspecialchars($avis[0]->besoin_type) : 'N/A' ?></h1>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID Avis</th>
                <th>Nom du Candidat</th>
                <th>Prénom du Candidat</th>
                <th>Message</th>
                <th>Date du Test</th>
                <th>Heure du Test</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($avis)) : ?>
                <?php foreach ($avis as $a) : ?>
                    <tr>
                        <td><?= htmlspecialchars($a->avis_id) ?></td>
                        <td><?= htmlspecialchars($a->nom) ?></td>
                        <td><?= htmlspecialchars($a->prenom) ?></td>
                        <td><?= htmlspecialchars($a->message) ?></td>
                        <td><?= htmlspecialchars($a->date_test) ?></td>
                        <td><?= htmlspecialchars($a->heure_test) ?></td>
                        <td><a href="<?= site_url('candidature/entretien/'.$a->id_candidature) ?>"><button>Entretien</button></a> <a href="<?= site_url('candidature/pdf_avis/'.$a->avis_id) ?>"><button>Format pdf</button></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Aucun avis trouvé pour ce besoin.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="back-link">
        <a href="<?= site_url('candidature/listeBesoins') ?>">Retour à la liste des besoins</a>
    </div>
</div>

</body>
</html>

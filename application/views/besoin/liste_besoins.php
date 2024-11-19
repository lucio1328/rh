<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Besoins</title>
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
    </style>
</head>
<body>
    <h1>Liste des Besoins</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de Poste</th>
                <th>Description</th>
                <th>Responsable Principal</th>
                <th>Etudes Requises</th>
                <th>Années d'Expérience</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($besoins as $besoin) { ?>
                <tr>
                    <td><?= $besoin->id ?></td>
                    <td><?= $besoin->typeposte ?></td>
                    <td><?= $besoin->description ?></td>
                    <td><?= $besoin->respprincip ?></td>
                    <td><?= $besoin->etudes ?></td>
                    <td><?= $besoin->experience ?></td>
                    <td><a href="<?= site_url('candidature/classification/' . $besoin->id) ?>"><button>Classification</button></a>
                    <a href="<?= site_url('candidature/listeAvis/' . $besoin->id) ?>"><button>Liste avis</button></a>
                    <a href="<?= site_url('candidature/listeEntretien/' . $besoin->id) ?>"><button>Liste entretien</button></a>
                    <a href="<?= site_url('candidature/valider/' . $besoin->id) ?>"><button>Valider</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>

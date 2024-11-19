<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations du Candidat</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; }
        h1, h2 { text-align: center; color: #333; }
        .congrats { font-size: 1.2em; color: #007BFF; margin: 20px; text-align: center; }
        .table-container { width: 80%; margin: 20px auto; }
        table { width: 100%; border-collapse: collapse; background-color: white; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        .back-link { text-align: center; margin-top: 10px; }
        .back-link a { color: #007BFF; font-weight: bold; }
    </style>
</head>
<body>

<h1>Informations du Candidat pour le Besoin : <?= isset($candidatures[0]->besoin_type) ? htmlspecialchars($candidatures[0]->besoin_type) : 'N/A' ?></h1>
<div class="congrats"><?= htmlspecialchars($message) ?></div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Études</th>
                <th>Expérience</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($candidatures)) : ?>
                <?php foreach ($candidatures as $candidat) : ?>
                    <tr>
                        <td><?= htmlspecialchars($candidat->nom) ?></td>
                        <td><?= htmlspecialchars($candidat->prenom) ?></td>
                        <td><?= htmlspecialchars($candidat->date_naissance) ?></td>
                        <td><?= htmlspecialchars($candidat->etudes) ?></td>
                        <td><?= htmlspecialchars($candidat->experience) ?> ans</td>
                        <td>
                            <a href="<?= site_url('candidature/pdf_valider/'.$candidat->candidat_id) ?>"><button>Format PDF</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">Aucun avis trouvé pour ce besoin.</td>
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

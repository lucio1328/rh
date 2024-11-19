<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Profils</title>
    <style>
        /* Style général de la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        /* Style pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }
        
        /* Style pour le lien dans la colonne Action */
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Liste des Profils</h1>

    <?php if (!empty($profils)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Poste Actuel</th>
                    <th>Date de Début</th>
                    <th>Études</th>
                    <th>Expérience</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profils as $profil) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($profil->id); ?></td>
                        <td><?php echo htmlspecialchars($profil->nom); ?></td>
                        <td><?php echo htmlspecialchars($profil->poste_actuel); ?></td>
                        <td>
                            <?php 
                                $date_debut = new DateTime($profil->date_debut);
                                $annees_experience = $date_debut->diff(new DateTime())->y;
                                echo htmlspecialchars($profil->date_debut) . " (" . $annees_experience . " ans)";
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($profil->etudes); ?></td>
                        <td><?php echo htmlspecialchars($profil->experience); ?> ans</td>
                        <td><a href="http://">*******</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun profil trouvé.</p>
    <?php endif; ?>
    <div>
        <h3>Questionnaire</h3>
        <ul>
            <li>Le talent proposé suffira pour les besoins de l'entreprise </li>
            <li>Le talent proposé s'adaptera-t-il rapidement dans l'environnement requis pour ce besoin </li>
            <li>Y-a-t-il des coûts supplémentaires pour former ce talent au besoin de la société</li>
        </ul>
    </div>
</body>
</html>

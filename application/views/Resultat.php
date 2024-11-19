<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de l'Appel à Candidature</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Détails de l'Appel à Candidature</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <h3>Poste : <?= htmlspecialchars($poste->typeposte); ?></h3>
                </div>
                <div class="card-body">
                    <h5>Description du Poste</h5>
                    <p><?= nl2br(htmlspecialchars($poste->description)); ?></p>

                    <h5>Responsabilités</h5>
                    <p><?= nl2br(htmlspecialchars($poste->respprincip)); ?></p>

                    <h5>Exigences</h5>
                    <p><?= nl2br(htmlspecialchars($poste->etudes)); ?></p>
                    <p><?= nl2br(htmlspecialchars($poste->experience)); ?></p>

                    <h5>Avantages</h5>
                    <p><?= nl2br(htmlspecialchars($description->avantages)); ?></p>

                    <h5>Date Limite de Candidature</h5>
                    <p><?= htmlspecialchars($description->date_limite); ?></p>

                    <h5>Pièces à Fournir</h5>
                    <?php if (!empty($pieceAFournir)): ?>
                        <ul>
                            <?php foreach ($pieceAFournir as $piece): ?>
                                <li><?= htmlspecialchars($piece->designation); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Aucune pièce à fournir spécifiée.</p>
                    <?php endif; ?>

                    <h5>Moyens pour Postuler</h5>
                    <?php if (!empty($moyenPourPostuler)): ?>
                        <ul>
                            <?php foreach ($moyenPourPostuler as $moyen): ?>
                                <li><?= htmlspecialchars($moyen->designation); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Aucun moyen de postuler spécifié.</p>
                    <?php endif; ?>

                </div>
            </div>

        <div class="text-center">
            <a href="<?= site_url('recrutement') ?>" class="btn btn-primary">Retour</a>
        </div>
    </div>

    <!-- Bootstrap JS (optional for interactivity) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

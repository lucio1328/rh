<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Liste des offres d'emploi</h1>
        
        <a href="<?php echo site_url('offre/ajout'); ?>" style="color:white;">
            <button class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Ajouter une offre
            </button>
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Poste</th>
                <th>Date de Publication</th>
                <th>Date Limite</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($offres as $offre): ?>
            <tr>
                <td><?= $offre->id ?></td>
                <td><?= $offre->titre ?></td>
                <td><?= $this->Poste_model->get($offre->poste_id)->nom; ?></td> <!-- Assurez-vous que le contrôleur joint les postes -->
                <td><?= date('d/m/Y', strtotime($offre->date_publication)) ?></td>
                <td><?= date('d/m/Y', strtotime($offre->date_limite)) ?></td>
                <td>
                    <span class="badge <?= $offre->statut == 'ouverte' ? 'bg-success' : 'bg-danger' ?>">
                        <?= ucfirst($offre->statut) ?>
                    </span>
                </td>
                <td>
                    <a href="<?php echo site_url('offre/modifier/'.$offre->id); ?>" class="btn btn-sm btn-warning me-2">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    
                    <a href="<?php echo site_url('offre/supprimer/'.$offre->id); ?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Liste des candidatures</h1>
        
        
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Candidat</th>
                <th>Poste</th>
                <th>Date de Candidature</th>
                <th>Statut</th>
                <th>Pourcentage de reussite</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($candidatures as $candidature): ?>
            <tr>
                <td><?= $candidature->id ?></td>
                <td><?= $this->Candidat_model->get($candidature->candidat_id)->nom; ?></td>
                <td><?= $this->Poste_model->get($this->Offre_model->get($candidature->offre_id)->poste_id)->nom; ?></td>
                <td><?= date('d/m/Y', strtotime($candidature->date_candidature)) ?></td>
                <td>
                    <span class="badge <?= $candidature->statut == 'acceptee' ? 'bg-success' : ($candidature->statut == 'refusee' ? 'bg-danger' : 'bg-warning') ?>">
                        <?= ucfirst($candidature->statut) ?>
                    </span>
                </td>
                <td><?= $this->Candidature_model->predire_reussite_candidat($candidature->offre_id,$candidature->id)?> %</td>
                <td>
                    <a href="<?php echo site_url('candidature/modifier/'.$candidature->id); ?>" class="btn btn-sm btn-warning me-2">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    
                    <a href="<?php echo site_url('candidature/supprimer/'.$candidature->id); ?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

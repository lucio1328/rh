<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Liste des competence</h1>
        
        <a href="<?php echo site_url('competence/ajout'); ?>" style="color:white;">
            <button class="btn btn-primary">    
                <i class="fas fa-plus me-2"></i>Ajouter une competence
            </button>
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Description</th>
                <th>date creation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($competences as $competence): ?>
            <tr>
                <td><?=$competence->id ?></td>
                <td><?=$competence->nom ?></td>
                <td><?=$competence->description?></td>
                <td><?=$competence->date_creation?></td>

                <td>
                     
                    <a href="<?php echo site_url('competence/modifier/'.$competence->id) ?>" class="btn btn-sm btn-warning me-2">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    
                    <a href="<?php echo site_url('competence/supprimer/'.$competence->id) ?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>
</div>

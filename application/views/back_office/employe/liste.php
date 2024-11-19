<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Liste des employés</h1>
        
        <a href="<?php echo site_url('employe/ajout'); ?>" style="color:white;">
            <button class="btn btn-primary">    
                <i class="fas fa-plus me-2"></i>Ajouter un employé
            </button>
        </a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Poste</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($employes as $employe): ?>
            <tr>
                <td><?=$employe->id ?></td>
                <td><a href="<?=site_url('employe/profil/'.$employe->id)?>"><?=$employe->nom?> <?=$employe->prenom?></a></td>
                <td><?=$employe->email?></td>
                <td>
                    <?php
                    $employePoste = $this->EmployePoste_model->get($employe->id);
                    if ($employePoste && $employePoste->poste_id) {
                         
                        echo $this->Poste_model->get($employePoste->poste_id)->nom;
                    } else {
                        echo "Non affecté"; 
                    }
                    ?>
                </td>

                <td>
                     
                    <a href="<?php echo site_url('employe/modifier/'.$employe->id) ?>" class="btn btn-sm btn-warning me-2">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    
                    <a href="<?php echo site_url('employe/supprimer/'.$employe->id) ?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>
</div>

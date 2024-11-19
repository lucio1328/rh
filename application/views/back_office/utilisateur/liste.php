<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3">Liste des utilisateurs</h1>
      
        <a href="<?php echo site_url("auth/ajout"); ?>" style="color:white;">
        <button class="btn btn-primary">    
            <i class="fas fa-plus me-2"></i>Ajouter un utilisateur

            </button>
        </a>
      
    </div>

    <table class="table table-striped table-hover">
      <thead class="table-primary">
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Rôle</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      <?php
        foreach($utilisateurs as $utilisateur){
            ?>
            <tr>
                <td><?=$utilisateur->id ?></td>
                <td><?=$utilisateur->email?></td>
                <td><?=$utilisateur->role?></td>
                <td>
                    <!-- Lien vers la page de modification de l'utilisateur -->
                    <a href="<?php echo site_url('auth/modifier/'.$utilisateur->id) ?>" class="btn btn-sm btn-warning me-2">
                    <i class="fas fa-edit"></i> Modifier
                    </a>
                    <!-- Lien vers la page de suppression de l'utilisateur -->
                    <a href="<?php echo site_url('auth/supprimer/'.$utilisateur->id) ?>" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Supprimer
                    </a>
                </td>
            </tr>
            <?php
        }
      ?>
        
      </tbody>
    </table>
</div>

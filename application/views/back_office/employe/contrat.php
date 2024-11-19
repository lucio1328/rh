<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Modifier un contrat</h1>
        <a href="<?php echo site_url('employe/liste'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
        </a>
    </div>

     
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

     
    <form action="<?php echo site_url("employe/contrat_up/".$employe->id); ?>" method="POST">
         
        <div class="mb-3">
            <input type="hidden" name="contrat_id" value="<?php echo $contrat->id; ?>">
        </div>

         
        <div class="mb-3">
            <label for="poste_id" class="form-label">Sélectionnez un poste :</label>
            <select name="poste_id" id="poste_id" class="form-select" required>
                <option value="">Sélectionner un poste</option>
                <?php
                 
                foreach ($postes as $poste) {
                    $selected = ($poste->id == $contrat->poste_id) ? 'selected' : '';
                    echo "<option value='{$poste->id}' {$selected}>{$poste->nom}</option>";
                }
                ?>
            </select>
        </div>

         
        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début :</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" value="<?php echo $contrat->date_debut; ?>" required>
        </div>

         
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin :</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" value="<?php echo $contrat->date_fin; ?>" required>
        </div>

        
        <div class="mb-3">
            <label for="type" class="form-label">Type de contrat :</label>
            <select name="type" id="type" class="form-select" required>
                <option value="">Sélectionner un type de contrat</option>
                <option value="cdi" <?php echo ($contrat->type == 'cdi') ? 'selected' : ''; ?>>CDI</option>
                <option value="cdd" <?php echo ($contrat->type == 'cdd') ? 'selected' : ''; ?>>CDD</option>
            </select>
        </div>

        
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> Modifier le contrat
            </button>
        </div>
    </form>
</div>

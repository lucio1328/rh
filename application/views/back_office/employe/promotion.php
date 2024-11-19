<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Promouvoir un employe</h1>
        <a href="<?php echo site_url('employe/liste'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour à la liste des employes
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

    <form action="<?php echo site_url("employe/promouvoir/".$employe->id); ?>" method="POST">

        <div class="mb-3">
            <label for="nouveau_poste_id" class="form-label">Nouveau poste :</label>
            <select name="nouveau_poste_id" id="nouveau_poste_id" class="form-select" required>
                <option value="">Selectionner un nouveau poste</option>
                <?php
                foreach ($postes as $poste2) {
                    if($poste2->id==$poste->poste_id){
                        echo "<option value='{$poste2->id}' selected>{$poste2->nom}</option>";
                    }
                   else{
                    echo "<option value='{$poste2->id}'>{$poste2->nom}</option>";
                   }
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_promotion" class="form-label">Date de la promotion :</label>
            <input type="date" name="date_promotion" id="date_promotion" class="form-control" required>
        </div>

         
        <div class="mb-3">
            <label for="niveau_competence" class="form-label">Niveau de competence :</label>
            <select name="niveau_competence" id="niveau_competence" class="form-select" required>
                <option value="debutant" <?php echo  $poste->niveau_competence=="debutant"? "selected":"" ?>>Debutant</option>
                <option value="intermediaire"  <?php echo  $poste->niveau_competence=="intermediaire"? "selected":"" ?>>Intermediaire</option>
                <option value="avance" <?php echo  $poste->niveau_competence=="avance"? "selected":"" ?>>Avance</option>
                <option value="expert" <?php echo  $poste->niveau_competence=="expert"? "selected":"" ?>>Expert</option>
            </select>
        </div>

         
        <div class="mb-3">
            <label for="experience" class="form-label">Annees d'experience :</label>
            <input type="number" name="experience" value="<?php echo $poste->experience ?>" id="experience" class="form-control" min="0" required>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> Promouvoir l'employe
            </button>
        </div>
    </form>
</div>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Ajouter une compétence à un employé</h1>
        <a href="<?php echo site_url('employe/liste'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
        </a>
    </div>

    <!-- Affichage des messages de succès ou d'erreur -->
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

    <!-- Formulaire d'ajout de compétence -->
    <form action="<?php echo site_url("employe/competence_aj/".$employe->id); ?>" method="POST">
        <!-- ID employé caché -->
        <div class="mb-3">
            <input type="hidden" name="employe_id" value="<?php echo $employe->id; ?>">
        </div>

        <!-- Sélection de la compétence -->
        <div class="mb-3">
            <label for="competence_id" class="form-label">Sélectionnez une compétence :</label>
            <select name="competence_id" id="competence_id" class="form-select" required>
                <option value="">Sélectionner une compétence</option>
                <?php
                // Affichage des compétences disponibles
                foreach ($competences as $competence) {
                    echo "<option value='{$competence->id}'>{$competence->nom}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Bouton d'envoi du formulaire -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> Ajouter la compétence
            </button>
        </div>
    </form>
</div>

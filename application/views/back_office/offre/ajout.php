<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Ajouter une offre d'emploi</h1>
        <a href="<?php echo site_url('offre/liste'); ?>" class="btn btn-secondary">
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

    
    <?php echo form_open('offre/create'); ?>
        <div class="form-group">
            <label for="titre">Titre de l'offre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="poste_id">Poste</label>
            <select class="form-control" id="poste_id" name="poste_id" required>
                <option value="">Sélectionnez un poste</option>
                <!-- Remplir dynamiquement avec les postes existants -->
                <?php foreach ($postes as $poste): ?>
                    <option value="<?php echo $poste->id; ?>"><?php echo $poste->nom; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="type_contrat">Type de contrat</label>
            <select class="form-control" id="type_contrat" name="type_contrat" required>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Stage">Stage</option>
                <option value="Freelance">Freelance</option>
            </select>
        </div>
        <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" class="form-control" id="localisation" name="localisation" required>
        </div>
        <div class="form-group">
            <label for="date_limite">Date limite</label>
            <input type="date" class="form-control" id="date_limite" name="date_limite" required>
        </div>
        <div class="form-group">
            <label for="salaire_min">Salaire minimum (€)</label>
            <input type="number" class="form-control" id="salaire_min" name="salaire_min" step="0.01">
        </div>
        <div class="form-group">
            <label for="salaire_max">Salaire maximum (€)</label>
            <input type="number" class="form-control" id="salaire_max" name="salaire_max" step="0.01">
        </div>
        <div class="form-group">
            <label for="experience_requise">Expérience requise (en années)</label>
            <input type="number" class="form-control" id="experience_requise" name="experience_requise" min="0" required>
        </div>
        <div class="form-group">
            <label for="competences_requises">Compétences requises</label>
            <textarea class="form-control" id="competences_requises" name="competences_requises" rows="3"></textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="teletravail" name="teletravail" value="1">
            <label class="form-check-label" for="teletravail">Télétravail possible</label>
        </div>
        <div class="form-group">
            <label for="nb_postes">Nombre de postes</label>
            <input type="number" class="form-control" id="nb_postes" name="nb_postes" min="1" value="1" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i> Sauvegarder
        </button>
    <?php echo form_close(); ?>
</div>

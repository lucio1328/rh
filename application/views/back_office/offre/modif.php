<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Modifier une offre d'emploi</h1>
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

    <?php echo form_open('offre/modification/'.$offre->id); ?>
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" value="<?php echo $offre->titre; ?>" id="titre" name="titre" required>
        </div>
        
        <div class="form-group">
            <label for="poste_id">Poste</label>
            <select class="form-control" id="poste_id" name="poste_id" required>
                <option value="">Sélectionner un poste</option>
                <?php foreach ($postes as $poste): ?>
                    <option value="<?= $poste->id ?>" <?php echo ($poste->id == $offre->poste_id) ? 'selected' : ''; ?>>
                        <?= $poste->nom ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"><?php echo $offre->description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="date_limite">Date Limite</label>
            <input type="date" class="form-control" id="date_limite" name="date_limite" value="<?php echo $offre->date_limite; ?>" required>
        </div>

        <div class="form-group">
            <label for="salaire_min">Salaire Minimum</label>
            <input type="number" class="form-control" id="salaire_min" name="salaire_min" value="<?php echo $offre->salaire_min; ?>" step="0.01">
        </div>

        <div class="form-group">
            <label for="salaire_max">Salaire Maximum</label>
            <input type="number" class="form-control" id="salaire_max" name="salaire_max" value="<?php echo $offre->salaire_max; ?>" step="0.01">
        </div>

        <div class="form-group">
            <label for="type_contrat">Type de contrat</label>
            <select class="form-control" id="type_contrat" name="type_contrat" required>
                <option value="CDI" <?php echo ($offre->type_contrat == 'CDI') ? 'selected' : ''; ?>>CDI</option>
                <option value="CDD" <?php echo ($offre->type_contrat == 'CDD') ? 'selected' : ''; ?>>CDD</option>
                <option value="Stage" <?php echo ($offre->type_contrat == 'Stage') ? 'selected' : ''; ?>>Stage</option>
                <option value="Freelance" <?php echo ($offre->type_contrat == 'Freelance') ? 'selected' : ''; ?>>Freelance</option>
            </select>
        </div>

        <div class="form-group">
            <label for="statut">Statut de l'offre</label>
            <select class="form-control" id="statut" name="statut" required>
                <option value="ouverte" <?php echo ($offre->statut == 'ouverte') ? 'selected' : ''; ?>>Ouverte</option>
                <option value="ferme" <?php echo ($offre->statut == 'ferme') ? 'selected' : ''; ?>>Fermée</option>
            </select>
        </div>

        <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" class="form-control" id="localisation" name="localisation" value="<?php echo $offre->localisation; ?>">
        </div>

        <div class="form-group">
            <label for="experience_requise">Expérience requise (en années)</label>
            <input type="number" class="form-control" id="experience_requise" name="experience_requise" value="<?php echo $offre->experience_requise; ?>" min="0">
        </div>

        <div class="form-group">
            <label for="competences_requises">Compétences requises</label>
            <textarea class="form-control" name="competences_requises" id="competences_requises"><?php echo $offre->competences_requises; ?></textarea>
        </div>

        <div class="form-group">
            <label for="teletravail">Télétravail possible</label>
            <input type="checkbox" id="teletravail" name="teletravail" value="1" <?php echo ($offre->teletravail) ? 'checked' : ''; ?>>
        </div>

        <div class="form-group">
            <label for="nb_postes">Nombre de postes</label>
            <input type="number" class="form-control" id="nb_postes" name="nb_postes" value="<?php echo $offre->nb_postes; ?>" min="1">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i> Sauvegarder
        </button>
    <?php echo form_close(); ?>
</div>

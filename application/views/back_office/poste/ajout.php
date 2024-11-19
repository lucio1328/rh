<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Ajouter une poste</h1>
        <a href="<?php echo site_url('poste/liste'); ?>" class="btn btn-secondary">
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

    <?php echo form_open('poste/create'); ?>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="hidden" class="form-control" id="action" name="action" value="employe" required>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">
        <i class="fas fa-save me-2"></i> Sauvegarder
    </button>
        
    <?php echo form_close(); ?>
</div>

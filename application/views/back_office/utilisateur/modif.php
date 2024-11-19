<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Modifier l'utilisateur</h1>
        <a href="<?php echo site_url('auth/liste'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Retour à la liste
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open('auth/modification/'.$utilisateur->id); ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <?php echo form_input([
            'type' => 'email',
            'class' => 'form-control',
            'id' => 'email',
            'name' => 'email',
            'value' => set_value('email', $utilisateur->email),
            'required' => 'required'
        ]); ?>
        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <?php echo form_input([
            'type' => 'password',
            'class' => 'form-control',
            'id' => 'password',
            'name' => 'password',
            'value' => set_value('password'),
        ]); ?>
        <small class="form-text text-muted">Laisser vide si vous ne voulez pas modifier le mot de passe.</small>
        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Rôle</label>
        <?php echo form_dropdown('role', [
            'admin' => 'Administrateur',
            'candidat' => 'Candidat',
            'employe' => 'Employé'
        ], set_value('role', $utilisateur->role), 'class="form-select" id="role" required'); ?>
        <?php echo form_error('role', '<div class="text-danger">', '</div>'); ?>
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save me-2"></i> Sauvegarder
    </button>

    <?php echo form_close(); ?>
</div>

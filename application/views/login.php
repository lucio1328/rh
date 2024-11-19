<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- <h1 center>GRH</h1> -->

    <div class="container mt-5">
        <h2 class="text-center">Connexion</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open('auth/login'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    Pas de compte?<a href="<?php echo site_url('auth/signup');?>">Creer un compte</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
</html>

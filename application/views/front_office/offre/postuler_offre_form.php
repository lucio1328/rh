<div class="card">
    <div class="card-body">
        <h5 class="card-title">Formulaire de candidature</h5>

        <!-- Multi Columns Form -->
        <form class="row g-3" action="<?= site_url('accueil/validerCV'); ?>" method="post">
            <div class="col-md-12">
                <input type="text" class="form-control" id="inputName5" name="id_offre" value="<?= $id_offre; ?>" hidden>
            </div>
            <div class="col-md-12">
                <label for="inputName5" class="form-label">Id utilisateur</label>
                <input type="text" class="form-control" id="inputName5" name="user_id" value="<?= $this->session->userdata('user_id'); ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Titre professionnel actuel</label>
                <input type="text" class="form-control" id="inputEmail5" name="titre_pro">
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Etudes</label>
                <input type="text" class="form-control" id="inputEmail5" name="etudes">
            </div>
            <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Experiences</label>
                <input type="number" class="form-control" id="inputPassword5" name="experiences">
            </div>
            <div class="col-md-6">
                <label for="inputAddress5" class="form-label">Prétention salariale mensuelle</label>
                <input type="number" class="form-control" id="inputAddres5s" name="pretention_salaire">
            </div>
            <div class="col-md-12">
                <label for="inputCity" class="form-label">Compétences spécifiques</label>
                <textarea class="form-control" placeholder="" id="floatingTextarea" style="height: 100px;" name="competences_specifiques"></textarea>
            </div>
            <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Qualites</label>
                <input type="text" class="form-control" id="inputPassword5" name="qualites">
            </div>
            <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Loisirs</label>
                <input type="text" class="form-control" id="inputPassword5" name="loisirs">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Soumettre</button>
                <button type="reset" class="btn btn-secondary">Rafraîchir</button>
            </div>
        </form>

    </div>
</div>
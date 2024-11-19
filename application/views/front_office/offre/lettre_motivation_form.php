<div class="card">
    <div class="card-body">
        <h5 class="card-title">Formulaire de candidature</h5>

        <!-- Multi Columns Form -->
        <form class="row g-3" action="<?= site_url('accueil/enregistrerLM'); ?>" method="post">
            <div class="col-md-12">
                <input type="text" class="form-control" id="inputName5" name="id_offre" value="<?= $annonce_id; ?>" hidden>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" id="inputName5" name="id_cv" value="<?= $cv_id; ?>" hidden>
            </div>
            <div class="col-md-6">
                <label for="inputName5" class="form-label">Id</label>
                <input type="text" class="form-control" id="inputName5" name="user_id" value="<?= $this->session->userdata('user_id'); ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Titre</label>
                <input type="text" class="form-control" id="inputEmail5" name="titre">
            </div>
            <div class="col-md-12">
                <label for="inputCity" class="form-label">Contenu</label>
                <textarea class="form-control" placeholder="" id="floatingTextarea" style="height: 200px;" name="contenu"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Soumettre</button>
                <button type="reset" class="btn btn-secondary">Rafraîchir</button>
            </div>
        </form>

    </div>
</div>
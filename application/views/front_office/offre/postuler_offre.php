<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Formulaire de soumission</h5>

                <form class="row g-3" action="<?= site_url('accueil/soumettre_offre_upload'); ?>" method="post" enctype="multipart/form-data">
                    <p class="small fst-italic">Pour postuler à cette offre veuillez soumettre les fichiers requises</p>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Réf.</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="formFile" value="<?= $id_offre; ?>" name="id_offre" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">CV</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile"  name="cv" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Lettre de motivation</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="lm" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                        <button type="reset" class="btn btn-secondary">Rafraîchir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<style>
	/* Section générale */
.section.dashboard {
    padding: 20px;
    background-color: #f8f9fa;
}

/* Cartes d'offres */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.card .card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

.card .text-muted {
    font-size: 0.9rem;
    color: #6c757d;
}

.card .description {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 10px;
}

/* Icône "Trois points" */
.card .filter .icon {
    font-size: 1.2rem;
    color: #6c757d;
    transition: color 0.2s;
}

.card .filter .icon:hover {
    color: #0d6efd;
}

/* Texte de date limite */
.card .text-success {
    font-size: 0.85rem;
    color: #198754 !important;
}

/* Formulaire de recherche */
.card-body form label {
    font-weight: 600;
    color: #495057;
}

.card-body form .form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.card-body form .form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 4px rgba(13, 110, 253, 0.25);
}

.card-body form button {
    border-radius: 5px;
    padding: 10px 15px;
}

.card-body form button.btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
    transition: background-color 0.2s, box-shadow 0.2s;
}

.card-body form button.btn-primary:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
}

/* Grille et marges */
.row {
    margin-top: 20px;
    gap: 20px;
}

.col-lg-8 .row {
    gap: 15px;
}

.col-md-6,
.col-xxl-4 {
    margin-bottom: 20px;
}

/* Media queries pour responsive */
@media (max-width: 768px) {
    .card {
        margin-bottom: 15px;
    }

    .card .card-title {
        font-size: 1rem;
    }

    .card .description {
        font-size: 0.85rem;
    }
}

</style>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <?php if (!empty($offres)) : ?>
                    <?php foreach ($offres as $offre) : ?>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= htmlspecialchars($this->Poste_model->get($offre->poste_id)->nom); ?>
                                        <br>
                                        <span class="text-muted small pt-2 ps-1">
                                            Publié le <?= date('d M Y', strtotime($offre->date_publication)); ?>
                                        </span>
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="description">
                                                <?= htmlspecialchars($offre->description); ?>
                                            </p>
                                            <span class="text-success small pt-2 ps-1 fw-bold" style="font-size: 12px;">
                                                Date limite : <?= date('d M Y', strtotime($offre->date_limite)); ?>
                                            </span>
                                        </div>
                                    </div>
									<a class="icon" href="<?= site_url('accueil/details_offre?id_offre=' . $offre->id); ?>">
									<button type="submit" class="btn btn-primary">Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12">
                        <p class="text-center">Aucune offre disponible pour le moment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Recherche multi-critères -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recherche multi-critères</h5>
                    <form class="row g-3" action="<?= site_url('accueil/filtrer_besoins'); ?>" method="post">
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Date limite avant</label>
                            <input type="date" class="form-control" id="inputName5" name="date_limite">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail5" class="form-label">Expérience min</label>
                            <input type="number" class="form-control" id="inputEmail5" name="annee_min">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Expérience max</label>
                            <input type="number" class="form-control" id="inputPassword5" name="annee_max">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Filtrer</button>
                            <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

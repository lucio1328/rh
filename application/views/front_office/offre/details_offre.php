<section class="section profile">
    <div class="row">
        <div class="card">
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="card-body">
                    <!-- Nom du poste -->
                    <h2 class="pt-4 d-flex flex-column align-items-center"><?= htmlspecialchars($this->Poste_model->get($offre->poste_id)->nom); ?></h2>

                    <!-- Date limite -->
                    <div class="d-flex align-items-center">
                        <div>
                            <span class="text-success pt-2 fw-bold" style="font-size: 15px;">Date limite : <?= date('d M Y', strtotime($offre->date_limite)); ?></span>
                        </div>
                    </div>

                    <!-- Description -->
                    <h5 class="card-title">Description</h5>
                    <p class="small fst-italic"><?= htmlspecialchars($offre->description); ?></p>

                    <!-- Profil recherché -->
                    <h5 class="card-title">Profil recherché</h5>

                    <!-- Compétences -->
					<div class="row">
						<div class="col-lg-3 col-md-4 label">Compétences requises</div>
						<div class="col-lg-9 col-md-8">
							<?php if (!empty($offre->competences_requises)): ?>
								<ul>
									<?php 
									// Diviser la chaîne de compétences en un tableau
									$competences = explode(',', $offre->competences_requises);
									foreach ($competences as $competence): 
									?>
										<li><?= htmlspecialchars(trim($competence)); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php else: ?>
								<p>Aucune compétence spécifiée.</p>
							<?php endif; ?>
						</div>
					</div>


                    <!-- Expériences -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Expérience requise</div>
                        <div class="col-lg-9 col-md-8">
                            <?= $offre->experience_requise; ?> ans minimum
                        </div>
                    </div>

                    <!-- Salaire -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Salaire</div>
                        <div class="col-lg-9 col-md-8">
                            <?= $offre->salaire_min; ?> - <?= $offre->salaire_max; ?> €
                        </div>
                    </div>

                    <!-- Type de contrat -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Type de contrat</div>
                        <div class="col-lg-9 col-md-8">
                            <?= htmlspecialchars($offre->type_contrat); ?>
                        </div>
                    </div>

                    <!-- Localisation -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Localisation</div>
                        <div class="col-lg-9 col-md-8">
                            <?= htmlspecialchars($offre->localisation); ?>
                        </div>
                    </div>

                    <!-- Télétravail -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Télétravail</div>
                        <div class="col-lg-9 col-md-8">
                            <?= $offre->teletravail ? 'Oui' : 'Non'; ?>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <a href="<?= site_url('accueil/soumettre_offre?id_offre=' . $offre->id); ?>">
                        <button type="button" class="btn btn-primary">Postuler à cette offre</button>
                    </a>
                    <!-- <a href="<?= site_url('accueil/soumettre_offre_form?id_offre=' . $offre->id); ?>">
                        <button type="button" class="btn btn-primary">Remplir le formulaire de candidature</button>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</section>

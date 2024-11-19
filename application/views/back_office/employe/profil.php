<div class="container mt-5">
    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                <?php
                    $imageSrc = ($employe->sexe == 'feminin') 
                        ? 'messages-1.jpg' 
                        : 'messages-3.jpg';
                ?>

                <!-- Affichage de l'image du profil -->
                <img src="<?php echo base_url("assets/img/".$imageSrc); ?>" class="card-img-top" alt="Photo Profil">
                <div class="card-body">
                    <h5 class="card-title"><?=$employe->nom?> <?=$employe->prenom?></h5>
                    <p class="card-text"><strong>Email:</strong> <?=$employe->email?> </p>
                    <p class="card-text"><strong>Poste actuel:</strong> 
                        <?php
                            $employePoste = $this->EmployePoste_model->get($employe->id);
                            if ($employePoste && $employePoste->poste_id) {
                                echo $this->Poste_model->get($employePoste->poste_id)->nom;
                            } else {
                                echo "Non affecté"; 
                            }
                        ?>
                    </p>
                    <p class="card-text"><strong>Date d'embauche:</strong><?php echo $employe->date_embauche; ?></p>
                </div>
            </div>
        </div>

        
        <div class="col-md-8">
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Informations Personnelles</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nom:</strong> <?=$employe->nom?></p>
                    <p><strong>Prénom:</strong> <?=$employe->prenom?></p>
                    <p><strong>Date de naissance:</strong> <?=$employe->date_naissance?></p>
                    <p><strong>Sexe:</strong><?=$employe->sexe?></p>
                    <p><strong>Adresse:</strong> <?=$employe->adresse?></p>
                    <p><strong>Contact:</strong> <?=$employe->contact?></p>
                    <p><strong>Email:</strong><?=$employe->email?></p>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Compétences</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <?php
                            // var_dump($competences);
                            if(!empty($competences)){
                                foreach($competences as $competence){
                                    ?><li><?php echo $this->Competence_model->get($competence->competence_id)->nom?></li><?php
                                }
                            }else{
                                ?><li>Aucune competence</li><?php
                            }
                        ?>
                    </ul>
                    <!-- Ajouter un bouton pour ajouter une compétence -->
                    <a href="<?php echo site_url('employe/competence/'.$employe->id); ?>" class="btn btn-primary mt-3">Ajouter une compétence</a>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Postes Occupés</h5>
                </div>
                <div class="card-body">
                    <h6><strong>Poste Actuel:</strong><?php echo $this->Poste_model->get($poste->poste_id)->nom ?></h6>
                    <br>
                    <p><strong>Description:</strong> <?php echo $this->Poste_model->get($poste->poste_id)->description ?></p>
                    <p><strong>Années d'expérience:</strong><?php echo $poste->experience ?> ans</p>

                    <p><strong>Niveau:</strong><?php echo $poste->niveau_competence ?></p>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Contrats</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(!empty($contrat)){
                            ?>
                                <p><strong>Poste:</strong> <?php echo $this->Poste_model->get($contrat->poste_id)->nom ?></p>
                                <p><strong>Date de début:</strong> <?php echo $contrat->date_debut?></p>
                                <p><strong>Date de fin:</strong> <?php echo $contrat->type == 'cdd' ? $contrat->date_fin :"Non applicable (CDI)"?></p>
                                <p><strong>Type de contrat:</strong>  <?php echo $contrat->type?></p>
                                <!-- Ajouter un bouton pour modifier le contrat -->
                                <a href="<?php echo site_url('employe/contrat/'.$employe->id); ?>" class="btn btn-warning mt-3">Modifier le contrat</a>
                            <?php
                        }
                        else{
                            echo "<ul><li>Aucun contrat</li></ul>";
                        }
                    ?>
                </div>
            </div>

            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Promotions</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(!empty($promotion)){
                            foreach($promotion as $p){
                                ?>
                                <h6><strong>Ancien Poste:</strong> <?php echo $this->Poste_model->get($p->ancienne_poste_id)->nom ?></h6>
                                <p><strong>Nouveau Poste:</strong><?php echo $this->Poste_model->get($p->nouveau_poste_id)->nom ?></p>
                                <p><strong>Date de promotion:</strong><?php echo $p->date_promotion; ?></p>
                                <!-- Ajouter un bouton pour promouvoir -->
                               
                            <?php
                            }
                        }
                        else{
                            echo "<ul><li>Aucune promotion</li></ul>";
                        }
                    ?>
                     <a href="<?php echo site_url('employe/promotion/'.$employe->id); ?>" class="btn btn-success mt-3">Promouvoir</a>
                </div>
            </div>
            <a href="<?php echo site_url('employe/liste'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>

        </div>
    </div>
</div>

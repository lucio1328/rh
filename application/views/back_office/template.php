<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion RH - Menu</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      height: 100vh;
      position: fixed;
      background-color: #f8f9fa;
      padding-top: 20px;
    }
    .sidebar .nav-link {
      color: #000;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .sidebar .nav-link:hover {
      background-color: #e9ecef;
      color: #000;
    }
    .sidebar .logo-text {
      font-size: 1.5rem;
      font-weight: bold;
      color: #007bff;
      text-align: center;
      margin-bottom: 20px;
    }
    .main-content {
      margin-left: 260px;
      padding: 20px;
      width: calc(100% - 260px); 
    }
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #f8f9fa;
      border-bottom: 1px solid #ddd;
    }
    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        height: auto;
        margin-bottom: 20px;
      }
      .main-content {
        margin-left: 0;
        padding: 10px;
      }
    }
    .card-icon {
      font-size: 1.5rem;
      color: #fff;
    }
    .card {
      border: none;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="d-flex flex-column flex-md-row">
    <!-- Sidebar -->
    <nav class="sidebar col-md-3 col-lg-2 bg-light">
      <div class="position-sticky">
        <div class="logo-text">IT-Corporation</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?=site_url("auth/dashbord")?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('auth/liste') ?>">
              <i class="fas fa-users"></i> Gestion des utilisateurs
              <span class="badge bg-primary ms-2"><?php echo count($utilisateurs); ?></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('employe/liste') ?>">
              <i class="fas fa-briefcase"></i> Gestion des employés
              <span class="badge bg-secondary ms-2"><?php echo count($employes); ?></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("poste/choix"); ?>">
              <i class="fas fa-tasks"></i> Postes et compétences
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("offre/choix"); ?>">
              <i class="fas fa-file-alt"></i> Offres & Candidatures
              <span class="badge bg-success ms-2"><?php echo count($candidatures); ?></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-calendar-alt"></i> Evaluations
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-file-contract"></i> Contrats
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-bell"></i> Notifications
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url("auth/logout") ?>" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Se déconnecter
            </a>
          </li>
         
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
     

        <div style="height:30px;"></div>

      <?php
        if(isset($vue)){
            include($vue);
        } else {
        ?>
          <div class="container">
            

            <!-- Dashboard Cards -->
            <div class="row g-3">
              <div class="col-md-4">
                <div class="card bg-primary text-white shadow-sm">
                  <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                      <i class="fas fa-users card-icon"></i>
                    </div>
                    <div>
                      <h5 class="card-title">Utilisateurs</h5>
                      <p class="card-text"><?php echo count($utilisateurs); ?> utilisateurs actifs</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card bg-success text-white shadow-sm">
                  <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                      <i class="fas fa-briefcase card-icon"></i>
                    </div>
                    <div>
                      <h5 class="card-title">Employés</h5>
                      <p class="card-text"><?php echo count($employes); ?> employés inscrits</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card bg-warning text-white shadow-sm">
                  <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                      <i class="fas fa-tasks card-icon"></i>
                    </div>
                    <div>
                      <h5 class="card-title">Postes</h5>
                      <p class="card-text"><?php echo count($postes); ?> postes disponibles</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Table Example -->
            <div class="mt-4 table-responsive">
              <h3>Dernières candidatures</h3>
              <table class="table table-striped table-hover">
                <thead class="table-primary">
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Poste</th>
                    <th>Date</th>
                    <th>Statut</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach($candidatures as $candidature){
                        ?>
                        <tr>
                            <td><?php echo $candidature->id;?></td>
                            <td><?php echo $this->Candidat_model->get($candidature->candidat_id)->nom; ?></td>
                            <td><?= $this->Poste_model->get($this->Offre_model->get($candidature->offre_id)->poste_id)->nom; ?></td>
                            <td><?php echo $candidature->date_candidature; ?></td>
                            <td><span class="badge bg-success"><?php echo $candidature->statut ?></span></td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php
        }
      ?>
    </main>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

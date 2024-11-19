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
            <?php

							if($this->session->userdata('utilisateur_role')=='candidat'){
								?>
									<li class="nav-item">
                <a class="nav-link" href="<?=site_url("offre2/liste")?>">
                <i class="fas fa-briefcase me-2"></i> Les Offres
                </a>
            </li>
								
								<?php
							}
						?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('auth/liste') ?>">
              <i class="fas fa-users"></i> Evaluations
              <span class="badge bg-primary ms-2"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('employe/liste') ?>">
              <i class="fas fa-briefcase"></i>Notifications
              <span class="badge bg-secondary ms-2"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("poste/choix"); ?>">
              <i class="fas fa-tasks"></i> ChatBot
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
        }
        ?>
         
    </main>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

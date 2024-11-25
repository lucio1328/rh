<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png'); ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?= base_url('assets/img/logo.png'); ?>" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                    <p class="text-center small">Entrez vos données personnels pour créer un compte</p>
                  </div>

                  <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                      <?= $this->session->flashdata('error'); ?>
                    </div>
                  <?php endif; ?>

                  <form class="row g-3 needs-validation" action="<?= site_url('user/createUser'); ?>" method="post" novalidate>
                    <div class="col-md-12">
                      <label for="yourName" class="form-label">Nom</label>
                      <input type="text" name="nom_utilisateur" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Veuillez saisir votre nom!</div>
                    </div>

                    <div class="col-md-12">
                      <label for="yourName" class="form-label">Description</label>
                      <textarea name="a_propos" class="form-control" id="about" style="height: 50px" required></textarea>
                      <div class="invalid-feedback">Veuillez vous décrire en quelques phrases!</div>
                    </div>

                    <div class="col-md-3">
                      <label for="yourEmail" class="form-label">Telephone</label>
                      <input type="text" name="telephone" class="form-control" id="yourEmail">
                    </div>

                    <div class="col-md-3">
                      <label for="yourEmail" class="form-label">Facebook</label>
                      <input type="text" name="facebook" class="form-control" id="yourEmail">
                    </div>

                    <div class="col-md-3">
                      <label for="yourEmail" class="form-label">Instagram</label>
                      <input type="text" name="instagram" class="form-control" id="yourEmail">
                    </div>

                    <div class="col-md-3">
                      <label for="yourEmail" class="form-label">Linkedin</label>
                      <input type="text" name="linkedin" class="form-control" id="yourEmail">
                    </div>

                    <div class="col-md-6">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Veuillez saisir votre email!</div>
                    </div>

                    <div class="col-md-6">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="mot_de_passe" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Veuillez saisir votre mot de passe!</div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">J'accepte <a href="#">les termes et conditions</a></label>
                        <div class="invalid-feedback">Vous devez accepter avant de soumettre votre inscription.</div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <p class="small mb-0">Déjà un compte? <a href="<?= site_url('welcome'); ?>">Connexion</a></p>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Créer un compte</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/chart.umd.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/quill/quill.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js'); ?>"></script>

</body>

</html>
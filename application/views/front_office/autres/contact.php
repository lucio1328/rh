<section class="section contact">

  <div class="row gy-4">

    <div class="col-xl-6">

      <div class="row">
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-geo-alt"></i>
            <h3>Addresse</h3>
            <p>IT University,<br>Andoharanofotsy, Antananarivo 101</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-telephone"></i>
            <h3>Nous contacté</h3>
            <p>020 21 263 85<br>032 12 107 33</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-envelope"></i>
            <h3>Nous écrire</h3>
            <p>info@example.com<br>contact@example.com</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card">
            <i class="bi bi-clock"></i>
            <h3>Heure d'ouverture</h3>
            <p>Lundi - Vendredi<br>9:00 - 17:00</p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-6">
      <div class="card p-4">
        <form action="<?= site_url('email/send'); ?>" method="post">
          <div class="row gy-4">

            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" value="<?= $user->nom; ?>" readonly>
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" value="<?= $user->email; ?>" readonly>
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>

          </div>
        </form>
      </div>

    </div>

  </div>

</section>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title"><img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" style="width: 140px; height:140px; border-radius:50%;"></h5>
      <p class="card-text">Selamat Datang <b><?= $user['name']; ?></b></p>
      <p class="card-text">Di E-Learning SMPN 2 Wado</p>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
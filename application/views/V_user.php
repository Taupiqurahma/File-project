</br>
</br>
</br> 
<div class="container">
<div class="card mb-3" style="max-width: 1200px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src=<?= base_url ("assets/csspage/img/profil.jpg") ?> class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-outline-danger">Nama Lengkap  : <?= $akun ['nama']; ?></h5>
        <h5 class="card-text">Email terdaftar : <?= $akun ['email']; ?></h5>
        <h5 class="card-text">Kode Daftar Anda           : <?= $akun ['kode_daftar']; ?> </h5>
        <p class="card-text"><small class="text-muted">Akun ini telah terdaftar sejak tanggal <?= date('d F Y', $akun['date']); ?></small></p>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
<form>
</br>
</br>

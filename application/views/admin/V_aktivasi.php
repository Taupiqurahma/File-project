

            <div class="table-responsive">
            <div class="card-body">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
              <h4>Daftar Berkas Peserta</h4>

             
                  <tr>
              <th>Kode Berkas</th>
                   <th>Id Peserta</th>
                   <th>Ijazah</th>
                   <th>SKHUN</th>
                   <th>KK</th>
                   <th>AKSI</th>

                  </tr>
                </thead>
                <tbody>
                   <?php foreach ($berkas as $k): ?>        
                  <tr>
                             
                   <td><?= $k->kode_berkas ?></td>
                   <td><?= $k->id_peserta ?></td>
                   <br>
                   <td><a href="<?= base_url('upload/berkas/').$k->ijazah ?>"><img width="70px"  src="<?= base_url('upload/berkas/').$k->ijazah ?> "></a></td>
                   <td><a href="<?= base_url('upload/berkas/').$k->skhun ?>"><img width="70px"  src="<?= base_url('upload/berkas/').$k->skhun ?> "></a></td>
                   <td><a href="<?= base_url('upload/berkas/').$k->kk ?>"><img width="70px"  src="<?= base_url('upload/berkas/').$k->kk ?> "></a></td>
                    <td>
                    <a href="<?= base_url('Dashboard_admin/hapus_berkas/').$k->kode_berkas ?>" class="btn btn-danger">HAPUS</a></td>
                  </td>
                   
                
                <?php endforeach ?>
        </tr>

                </tbody>
              </table>
            </div>
          </div>
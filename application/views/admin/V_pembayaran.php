   <div class="container">
        <h4>Konfirmasi Pembayaran Formulir</h4>
           <table class="table table-bordered">
               <tr>
                   <th>Tanggal Bayar</th>
                   <th>Nama Peserta</th>
                   <th>Bukti Transfer</th>
                   <th>Nomor Rekening</th>
                   <th>Atas Nama</th>
                   <th>Aksi</th>
               </tr>
               <tr>
                <?php foreach ($pembayaran as $k): ?>                    
                   <td><?= $k->tanggal_registrasi ?></td>
                   <td><?= $k->nama ?></td>
                   <td><a href="<?= base_url('upload/pembayaran/').$k->gambar ?>"><img width="70px"  src="<?= base_url('upload/pembayaran/').$k->gambar ?> "></a></td>
                   <td><?= $k->nomor_rekening ?></td>
                   <td><?= $k->nama_pengirim ?></td>
                 
                   <td>
                    <form method="post" action="<?= base_url('Pembayaran_admin/bukti_ok') ?>">
                        <input type="hidden" name="email" value="<?= $k->email?>">
                        <input type="hidden" name="id_pembayaran" value="<?= $k->id_pembayaran?>">
                    <button class="btn btn-primary" type="submit" >valid</button>
                    </form>
                    <a href="<?= base_url('Pembayaran_admin/bukti_belumvalid/').$k->id_pembayaran ?>" class="btn btn-danger">Tidak Valid</a></td>
                <?php endforeach ?>
               </tr>
           </table>
            </div>

               <div class="container">

        <h4>Konfirmasi Pelunasan</h4>
           <table class="table table-bordered">
               <tr>
                   <th>Tanggal Bayar</th>
                   <th>Nama Peserta</th>
                   <th>Bukti Transfer</th>
                   <th>Nomor Rekening</th>
                   <th>Atas Nama</th>
                   <th>Aksi</th>
               </tr>
               <br>
               <tr>
                <?php foreach ($pelunasan as $k): ?>                    
                   <td><?= $k->tanggal_bayar ?></td>
                   <td><?= $k->nama_lengkap ?></td>
                   <td><a href="<?= base_url('upload/pelunasan/').$k->bukti_tf ?>"><img width="70px"  src="<?= base_url('upload/pelunasan/').$k->bukti_tf ?> "></a></td>
                   <td><?= $k->nomor_rekening ?></td>
                   <td><?= $k->atas_nama ?></td>
                 
                   <td>
                    <form method="post" action="<?= base_url('Pembayaran_admin/bukti_valid') ?>">
                        <input type="hidden" name="email" value="<?= $k->email?>">
                        <input type="hidden" name="kode_pelunasan" value="<?= $k->kode_pelunasan?>">
                    <button class="btn btn-primary" type="submit" >Valid</button>
                    </form>
                    <a href="<?= base_url('Pembayaran_admin/bukti_gagal/').$k->kode_pelunasan ?>" class="btn btn-danger">Tidak Valid</a></td>
                <?php endforeach ?>
               
           </table>
            </div>
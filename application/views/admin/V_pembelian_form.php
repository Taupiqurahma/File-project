   <div class="container">
        <h4>Daftar Pelunasan pembayaran pendaftaran</h4>
           <table class="table table-bordered">
               <tr>
                   <th>Tanggal Bayar</th>
                   <th>Email</th>
                   <th>Bukti Transfer</th>
                   <th>Nomor Rekening</th>
                   <th>Atas Nama</th>
                   <th>Status Pembayaran</th>
               </tr>
               <tr>
                <?php foreach ($pembayaran as $p): ?>                    
                   <td><?= $p->tanggal ?></td>
                   <td><?= $p->email ?></td>
                   <td><a href="<?= base_url('upload/pembayaran/').$p->gambar ?>"><img width="70px"  src="<?= base_url('upload/pembayaran/').$p->gambar ?> "></a></td>
                   <td><?= $p->nomor_rekening ?></td>
                   <td><?= $p->nama_pengirim ?></td>
                    <td><?= $p->status_bayar ?></td>
                </tr>
                 
                <?php endforeach ?>
            </tbody>
              </table>
            </div>
          </div>
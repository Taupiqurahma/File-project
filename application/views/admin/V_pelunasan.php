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
                <?php foreach ($pelunasan as $k): ?>                    
                   <td><?= $k->tanggal_bayar ?></td>
                   <td><?= $k->email ?></td>
                   <td><a href="<?= base_url('upload/pelunasan/').$k->bukti_tf ?>"><img width="70px"  src="<?= base_url('upload/pelunasan/').$k->bukti_tf ?> "></a></td>
                   <td><?= $k->nomor_rekening ?></td>
                   <td><?= $k->atas_nama ?></td>
                    <td><?= $k->status ?></td>
                </tr>
                 
                <?php endforeach ?>
            </tbody>
              </table>
            </div>
          </div>


 
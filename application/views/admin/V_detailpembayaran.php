<style>
* {
    box-sizing: border-box;
}

.zoom {
    padding: 50px;
    transition: transform .2s;
    max-height: 300px;
    margin: 0 auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.zoom:hover {
    -ms-transform: scale(1.5);
    /* IE 9 */
    -webkit-transform: scale(1.5);
    /* Safari 3-8 */
    transform: scale(2.5);
}
</style>

<?php foreach ($pembayaran as $d): ?>
<div class="container">
<div class="panel panel-default ">
    <div class="panel-heading">
        <div class="table-responsive">


        <h4 style="font-family:roboto; font-weight:bold">Bukti Pembayaran</h4>
    </div>
    <div class="panel-body ">

        <tr>
             <form method="post" action="<?= base_url('Pembayaran_admin/bukti_ok') ?>">
                        <input type="hidden" name="email" value="<?= $d->email?>">
                        <input type="hidden" name="id_pembayaran" value="<?= $d->id_pembayaran?>">
                    <button class="btn btn-primary" type="submit" >Valid</button>
                    </form>
            <td>
            <p style="font-family:roboto">Nomor Rekening Pengirim : <?php echo $d->id_pembayaran ?> <br> Nomor Rekening Pengirim : <?php echo $d->nomor_rekening ?> <br> Tanggal : <?php echo $d->tanggal ?> <br>Waktu : <?php echo $d->waktu ?> <br> KODE DAFTAR : <?php echo $d->kode_daftar ?> <br> Nama Pengirim : <?php echo $d->nama_pengirim ?> <br> Email : <?php echo $d->email ?><img class="zoom" src="<?php echo base_url();?>upload/pembayaran/<?php echo $d->gambar ?>" />
            </p>
            </td>
          
        </tr>

    </div>
</div><br><br><br><br>

<?php endforeach; ?>
</div>
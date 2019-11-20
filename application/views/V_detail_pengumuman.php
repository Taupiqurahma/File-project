<div class="panel panel-default container"><br>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-stdiped table-bordered table-hover">
                <?php foreach ($detailPengumuman as $s): ?>
                <tbody>
                    <tr>
                        <td colspan="3" align="center">
                            <img height="80px" class="float-right" src="<?= base_url('assets/images/barcode/'). $s->kode_daftar.'.png' ?>">
                            <h4><img src="<?php echo base_url('assets/admin/img/1122.png') ;?>">
                             No.Pendafataran:
                                <?php echo $s->kode_daftar;?>/<?php echo $s->id_peserta;?>/<?php echo date('dmy');?>
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><?php echo $s->nama_lengkap;?></td>
                    </tr>
                    <tr>
                        <td>Kode Daftar</td>
                        <td><?php echo $s->kode_daftar?></td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td><?php echo $s->asal_sekolah?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td><?php echo $s->jurusan?></td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" align="center"><b>STATUS PENDAFTARAN :</b></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <h3><b>......<?php echo $s->status_pendaftaran; ?>......</b></h3>
                        </td>
                    </tr>
                </tbody>
            </table><br>
            <h4>Silakan Cetak Lembar Bukti Diterima dengan Klik tombol detail : </h4>
            <a href="<?php echo base_url('Dashboard_Siswa/cetak/'.$s->kode_daftar); ?>"><button
                    class="btn btn-primary pull-right">Detail</button></a>
            <a class="btn btn-success" href="<?php echo base_url('Dashboard_Siswa/pengumuman'); ?>">Kembali</a>
            <?php endforeach; ?>

        </div>
    </div>
</div>`
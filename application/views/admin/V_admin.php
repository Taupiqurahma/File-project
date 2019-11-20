    
<div class="container">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">DASHBOARD ADMIN</h1>
  <div class="panel panel-default ">
    <div class="panel-heading">
        <div class="row">
          <div class="container">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $jumlahSiswa ?></div>
                        <div>Jumlah Pendaftar PPDB</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url ('Dashboard_admin/listPeserta') ?>">
                <div class="panel">
                    <span class="pull-left">Detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <hr class="my-5">
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <i class="fa fa-check-circle fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $jumlahDiterima ?></div>
                    <div>Jumlah Diterima</div>
                </div>
            </div>
        </div>
        <a href="">
            <div class="panel">
                <span class="pull-left">Detail</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
</div>
<hr class="my-5">
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <i class="fas fa-money-check-alt fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
                <div class="huge"><?php echo $jumlahPembayaran ?></div>
                <div>Jumlah pembayaran yang baru masuk</div>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url('pembayaran_admin')?>">
        <div class="panel">
            <span class="pull-left">Detail</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

            <div class="clearfix"></div>
        </div>
    </a>
</div>
<hr class="my-5">
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
             <i class="fas fa-file-invoice-dollar fa-5x"></i> 
         </div>
         <div class="col-xs-9 text-right">
            <div class="huge"><?php echo $jumlahPelunasan ?></div>
            <div>Jumlah pembayaran pelunasan pendaftaran</div>
        </div>
    </div>
</div>
<a href="<?php echo base_url('pembayaran_admin/pelunasan')?>">
    <div class="panel">
        <span class="pull-left">Detail</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

        <div class="clearfix"></div>
    </div>
</a>
</div>
<hr class="my-5">
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
             <i class="fas fa-file-invoice-dollar fa-5x"></i> 
         </div>
         <div class="col-xs-9 text-right">
            <div class="huge"><?php echo $jumlahPembelian ?></div>
            <div>Jumlah pembayaran pembelian formulir</div>
        </div>
    </div>
</div>
<a href="<?php echo base_url('pembayaran_admin/beli_formulir')?>">
    <div class="panel">
        <span class="pull-left">Detail</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

        <div class="clearfix"></div>
    </div>
    <hr class="my-5">
</a>
</div>


    
</div>
<br><br><br><br>
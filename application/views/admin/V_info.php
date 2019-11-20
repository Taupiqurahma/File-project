<div class="panel panel-default ">
    <div class="panel-heading">
        <h4 style="font-family:roboto; text-align:center; font-weight:bold">SETTING PAGE DAFTAR</h4>
    </div>

  <body>
    <?php echo form_open_multipart(); ?>
       <input type="file" name="gambar"><br>
        <img src="<?php echo base_url()?>images/<?php echo $tampil->gambar ?>" width="100" alt="" name="gambar">
        <input type="hidden" name="id" value="<?php echo $tampil->id_info ?>">
        <input type="submit" value="update">
    <?php echo form_close() ?>
</body>
</div>

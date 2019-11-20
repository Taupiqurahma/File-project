 <title>PPDB - SMK Cakrawala</title>
<?php $this->load->view('header');?>


</br>
</br>
<div class="jumbotron">
  <h1 class="display-8">Selamat Datang di Website PPDB SMK Cakrawala Bojonggede-Bogor</h1>
  <p class="lead">Web ini berisi informasi mengenai profil sekolah dan info Penerimaan Peserta Didik Baru SMK Cakrawala</p>
  <hr class="my-4">
  <hr class="my-4">
  <div class="container mb-4">
                <?php foreach($maps as $m): ?>         
                <iframe
                    src="<?php echo $m->link ?>"
                    width="<?php echo $m->width ?>%" height="<?php echo $m->height ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <?php endforeach; ?>
   </div>
       
</body>

</html>
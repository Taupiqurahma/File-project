<html>
<head>
  <title>LAPORAN</title>
    
  
</head>
<body>
    <div class="container">
    <h2>Data LAPORAN</h2><hr>
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="3">Per Tahun</option>
        </select>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit">Tampilkan</button>
        <a href="<?php echo base_url(); ?>">Reset Filter</a>
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />
    <table border="1" cellpadding="8">
    <tr>
        <th>Tes1</th>
        <th>tes2</th>
        <th>tes3</th>
        <th>tes4</th>
        <th>tes5</th>
    </tr>
    <?php
    if( ! empty($peserta)){
      
      foreach($peserta as $data){
            $tanggal = date('d-m-Y', strtotime($data->tanggal));
            
        echo "<tr>";
        echo "<td>".$tanggal."</td>";
        echo "<td>".$data->nama_lengkap."</td>";
        echo "<td>".$data->nama_panggilan."</td>";
        echo "<td>".$data->jurusan."</td>";
        echo "<td>".$data->agama."</td>";
        echo "</tr>";
      }
    }
    ?>
    
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
      
        $('#form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</table>
</body>
</html>
</div>
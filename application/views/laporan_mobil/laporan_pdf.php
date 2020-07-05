<?php

if (empty($status)) {
    $query = $this->db->query("SELECT *
                                FROM laporan_mobil
                                ");
} elseif ($status == 6) {
    $query = $this->db->query("SELECT *
                                FROM laporan_mobil
                                WHERE status < $status
                                ");
} else {
    $query = $this->db->query("SELECT *
                                FROM laporan_mobil
                                WHERE status is null
                                ");
}

?>
<html>
<style>
.body {
  font-family: "Times New Roman", Times, serif;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: grey;
  color: white;
  text-align: center;
}
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
<body class="body">
<center><h2>PT PLN</h2>
</center>

<div class="box-body">
    <div style="padding-bottom: 10px;">
    <table class='table table-bordered' width="100%" >
        <tr>
            <td>No</td>
            <td>Mobil</td>
            <td>Nopol</td>
            <td>Jam Masuk</td>
            <td>Jam Keluar</td>
            <td>Status</td>
        </tr>
        <?php
$no = 1;
foreach ($query->result_array() as $data) {
    ?>
        <tr>
            <td> <?php echo $no; ?></td>
            <td> <?php echo $data['mobil']; ?></td>
            <td> <?php echo $data['nopol']; ?></td>
            <td> <?php echo $data['keluar_jam']; ?></td>
            <td> <?php echo $data['masuk_jam']; ?></td>
            <td> <?php echo rename_string_status_mobil($data['status']); ?></td>
        </tr>
        <?php $no++?>
        <?php }?>
</table>
</div>
</div>
<div class="footer">
  <p>Dicetak tanggal <?php echo date('Y-m-d H:i:s'); ?></p>
</div>
</body>
</html>
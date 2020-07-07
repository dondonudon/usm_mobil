<?php

if (empty($tanggal_a) || empty($tanggal_b) || empty($id_karyawan)) {
    $query = $this->db->query("SELECT *
                                FROM laporan_history
                                ");
} elseif (!empty($id_karyawan)) {
    $query = $this->db->query("SELECT *
                                FROM laporan_history
                                WHERE id_karyawan = '$id_karyawan'
                                ");
} else {
    $query = $this->db->query("SELECT *
                                FROM laporan_history
                                WHERE
                                id_karyawan = '$id_karyawan' AND
                                (laporan_history.tanggal >= '$tanggal_a' AND laporan_history.tanggal <= '$tanggal_b')
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
            <td>No Request</td>
            <td>Nama Karyawan</td>
            <td>Tanggal</td>
            <td>Pengikut</td>
            <td>Tujuan</td>
            <td>Keterangan</td>
            <td>Status</td>
        </tr>
        <?php
$no = 1;
foreach ($query->result_array() as $data) {
    ?>
        <tr>
            <td> <?php echo $no; ?></td>
            <td> <?php echo $data['notrans']; ?></td>
            <td> <?php echo $data['nama_karyawan']; ?></td>
            <td> <?php echo $data['tanggal']; ?></td>
            <td> <?php echo $data['pengikut']; ?></td>
            <td> <?php echo $data['tujuan']; ?></td>
            <td> <?php echo $data['keterangan']; ?></td>
            <td> <?php echo rename_string_status($data['status']); ?></td>
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
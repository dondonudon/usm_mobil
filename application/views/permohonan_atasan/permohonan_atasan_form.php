<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PERMOHONAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
<?php
if ($bbm == '1') {
    $is_bbm = 'Ya';
} else {
    $is_bbm = 'Tidak';
}

if ($is_driver == '1') {
    $iss_driver = 'Ya';
} else {
    $iss_driver = 'Tidak';
}
?>
<table class='table table-bordered'>

		<tr><td>No Request</td><td><?php echo $notrans; ?></td></tr>
		<tr><td>Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
		<tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Pengikut</td><td><?php echo $pengikut; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Bahan Bakar</td><td><?php echo $is_bbm; ?></td></tr>
		<tr><td>Pakai Driver</td><td><?php echo $iss_driver; ?></td></tr>
	    <!-- <tr><td>Datetime</td><td><?php echo $datetime; ?></td></tr> -->
		<input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_users']; ?>">
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
		<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button1 ?></button>
	    <a href="<?php echo site_url('permohonan_atasan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
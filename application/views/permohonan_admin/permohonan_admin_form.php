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
		<input type="hidden" name="is_bbm" id="is_bbm" value="<?php echo $is_bbm; ?>">
		<input type="hidden" name="iss_driver" id="iss_driver" value="<?php echo $iss_driver; ?>">

		<tr><td>No Request</td><td><?php echo $notrans; ?></td></tr>
		<tr><td>Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
		<tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Pengikut</td><td><?php echo $pengikut; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
		<tr><td>Mobil</td><td><?php echo select2_dinamis_id('id_mobil', 'mst_mobil', 'nopol', 'id', 'Mobil', 'aktif', 1) ?></td></tr>
		<tr><td>Bahan Bakar</td><td><?php echo $is_bbm; ?></td></tr>
		<tr><td>Kupon</td><td><input type="text" name="kupon_bbm" id="kupon_bbm" disabled></td></tr>
		<tr><td>Pakai Driver</td><td><?php echo $iss_driver; ?></td></tr>
		<tr><td>Driver</td><td><?php echo select2_dinamis_id('id_driver', 'mst_driver', 'nama', 'id', 'Driver', 'aktif', 1) ?></td></tr>
	    <!-- <tr><td>Datetime</td><td><?php echo $datetime; ?></td></tr> -->
		<input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_users']; ?>">
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('permohonan_admin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

var is_bbm = $('#is_bbm').val();
var iss_driver = $('#iss_driver').val();

// cek value is_bbm
if(is_bbm === "Ya"){
	document.getElementById('kupon_bbm').disabled = false;
}
// cek value iss_driver
if(iss_driver === "Tidak"){
	$("#id_driver").prop('disabled', true);
}

});

</script>
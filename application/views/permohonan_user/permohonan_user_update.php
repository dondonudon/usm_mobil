<div class="content-wrapper">

<section class="content">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Permohonan <?php echo $notrans; ?></h3>
        </div>
		<form action="<?php echo $action; ?>" method="post">
<?php
if ($bbm == '1') {
    $is_bbm = '1';
} else {
    $is_bbm = '0';
}

if ($is_driver == '1') {
    $iss_driver = '1';
} else {
    $iss_driver = '0';
}
?>
<table class='table table-bordered>'>
		<input type="hidden" name="is_bbm" id="is_bbm" value="<?php echo $is_bbm; ?>">
		<input type="hidden" name="iss_driver" id="iss_driver" value="<?php echo $iss_driver; ?>">

	    <tr><td>No Request</td><td><?php echo $notrans; ?></td></tr>
	    <tr><td>Id Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
	    <tr><td>Tanggal</td><td><input type="date" name="tanggal" id="tanggal" value="<?php echo $tanggal; ?>"> </td></tr>
	    <tr><td>Pengikut</td><td><input type="text" name="pengikut" id="pengikut" value="<?php echo $pengikut; ?>"> </td></tr>
	    <tr><td>Tujuan</td><td><input type="text" name="tujuan" id="tujuan" value="<?php echo $tujuan; ?>"> </td></tr>
	    <tr><td>Keterangan</td><td><input type="text" name="keterangan" id="keterangan" value="<?php echo $keterangan; ?>"> </td></tr>
		<tr><td>Bahan Bakar <?php echo form_error('bbm') ?></td><td><input type="checkbox" name="bbm" id="bbm" value="1" /></td></tr>
		<tr><td>Pakai Pengemudi <?php echo form_error('is_driver') ?></td><td><input type="checkbox" name="is_driver" id="is_driver" value="1" /></td></tr>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />

	    <tr><td></td><td>
		<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
		<a href="<?php echo site_url('permohonan_user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table></form>

</div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

var is_bbm = $('#is_bbm').val();
var iss_driver = $('#iss_driver').val();

if(is_bbm == 1){
        $(bbm).attr("checked", "checked");
	}

if(iss_driver == 1){
	$(is_driver).attr("checked", "checked");
}

});

</script>
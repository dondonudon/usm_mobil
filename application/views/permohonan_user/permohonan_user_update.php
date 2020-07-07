<div class="content-wrapper">

<section class="content">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Permohonan <?php echo $notrans; ?></h3>
        </div>
		<form action="<?php echo $action; ?>" method="post">

<table class='table table-bordered>'>
	    <tr><td>No Request</td><td><?php echo $notrans; ?></td></tr>
	    <tr><td>Id Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
	    <tr><td>Tanggal</td><td><input type="date" name="tanggal" id="tanggal" value="<?php echo $tanggal; ?>"> </td></tr>
	    <tr><td>Pengikut</td><td><input type="text" name="pengikut" id="pengikut" value="<?php echo $pengikut; ?>"> </td></tr>
	    <tr><td>Tujuan</td><td><input type="text" name="tujuan" id="tujuan" value="<?php echo $tujuan; ?>"> </td></tr>
	    <tr><td>Keterangan</td><td><input type="text" name="keterangan" id="keterangan" value="<?php echo $keterangan; ?>"> </td></tr>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />

	    <tr><td></td><td>
		<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
		<a href="<?php echo site_url('permohonan_user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table></form>

</div>
</div>
</div>
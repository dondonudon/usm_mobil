<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PERMOHONAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

<table class='table table-bordered'>

	    <tr><td width='200'>No <?php echo form_error('notrans') ?></td><td><input type="text" class="form-control" name="notrans" id="notrans" placeholder="Notrans" value="<?php echo notrans(); ?>" readonly/></td></tr>
		<tr><td width='200'>Karyawan <?php echo form_error('id_karyawan') ?></td>
		<td><?php echo select2_dinamis_id('id_karyawan', 'mst_karyawan', 'nama', 'id', 'Karyawan', 'aktif', 1) ?></td></tr>
	    <tr><td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>
	    <tr><td width='200'>Jumlah Pengikut <?php echo form_error('pengikut') ?></td><td><input type="text" class="form-control" name="pengikut" id="pengikut" placeholder="Pengikut" value="<?php echo $pengikut; ?>" /></td></tr>
	    <tr><td width='200'>Tujuan <?php echo form_error('tujuan') ?></td><td><input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" /></td></tr>
	    <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td></tr>
		<tr><td width='200'>Bahan Bakar <?php echo form_error('bbm') ?></td><td><input type="checkbox" name="bbm" id="bbm" value="1" value="<?php echo $bbm; ?>" /></td></tr>
		<tr><td width='200'>Pakai Pengemudi <?php echo form_error('is_driver') ?></td><td><input type="checkbox" name="is_driver" id="is_driver" value="1" value="<?php echo $is_driver; ?>" /></td></tr>
		<input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_users']; ?>">

	    <!-- <tr><td width='200'>Id Mobil <?php echo form_error('id_mobil') ?></td><td><input type="text" class="form-control" name="id_mobil" id="id_mobil" placeholder="Id Mobil" value="<?php echo $id_mobil; ?>" /></td></tr>
	    <tr><td width='200'>Id Driver <?php echo form_error('id_driver') ?></td><td><input type="text" class="form-control" name="id_driver" id="id_driver" placeholder="Id Driver" value="<?php echo $id_driver; ?>" /></td></tr> -->
	    <!-- <tr><td width='200'>Keluar Jam <?php echo form_error('keluar_jam') ?></td><td><input type="time" class="form-control" name="keluar_jam" id="keluar_jam" placeholder="Keluar Jam" value="<?php echo $keluar_jam; ?>" /></td></tr>
	    <tr><td width='200'>Masuk Jam <?php echo form_error('masuk_jam') ?></td><td><input type="time" class="form-control" name="masuk_jam" id="masuk_jam" placeholder="Masuk Jam" value="<?php echo $masuk_jam; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td></tr> -->
	    <!-- <tr><td width='200'>Datetime <?php echo form_error('datetime') ?></td><td><input type="text" class="form-control" name="datetime" id="datetime" placeholder="Datetime" value="<?php echo $datetime; ?>" /></td></tr> -->
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('permohonan_user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
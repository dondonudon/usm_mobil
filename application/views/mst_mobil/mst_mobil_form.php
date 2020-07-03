<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MST_MOBIL</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>

	    <tr><td width='200'>Mobil <?php echo form_error('mobil') ?></td><td><input type="text" class="form-control" name="mobil" id="mobil" placeholder="Mobil" value="<?php echo $mobil; ?>" /></td></tr>
	    <tr><td width='200'>Nopol <?php echo form_error('nopol') ?></td><td><input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nopol" value="<?php echo $nopol; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('mst_mobil') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
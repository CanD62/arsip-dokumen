<?php
$attributes = array(
  'role' => 'form', 'id' => 'form_add', 'name' => 'form_add', 'class' => 'form-horizontal',
  'enctype' => 'multipart/form-data',
  'onSubmit' => 'document.getElementById(\'btn\').disabled=true;'
);
echo form_open($update, $attributes);
?>
<input type="hidden" name="id_jenis" value="<?= $getJenis['id_jenis']; ?>" required="required">
<div class="row">
<div class="col-md-12">
    <div class="form-group">
      <label class="control-label" for="jenis">Jenis Dokumen</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" autocomplete="off" id="jenis" name="jenis" value="<?= $getJenis['nama_jenis']; ?>" placeholder="Masukan Jenis Dokumen" autofocus required="required">
      </div>
    </div>
  </div>
  <div class="col-md-11 col text-center">
    <div class="col-sm-11">
      <button type="submit" class="btn btn-primary" id="btn"><i class="fa fa-save"></i> Simpan Data</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
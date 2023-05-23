<?php
$attributes = array(
  'role' => 'form', 'id' => 'form_add', 'name' => 'form_add', 'class' => 'form-horizontal',
  'enctype' => 'multipart/form-data',
  'onSubmit' => 'document.getElementById(\'btn\').disabled=true;'
);
echo form_open($save, $attributes);
?>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label" for="NIP">NIP</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" autocomplete="off" id="NIP" name="NIP" placeholder="Masukan NIP" required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label" for="NamaLengkap">Nama Lengkap</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" autocomplete="off" id="NamaLengkap" name="NamaLengkap" placeholder="Masukan Nama Lengkap" required="required">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label" for="Email">Alamat E-mail</label>
      <div class="col-sm-9">
        <input type="Email" class="form-control" autocomplete="off" id="Email" name="Email" placeholder="Masukan Alamat Email" required="required">
      </div>
    </div>

  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label" for="Nama_Pengguna">Nama Pengguna</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" autocomplete="off" id="Nama_Pengguna" name="Nama_Pengguna" placeholder="Masukan Nama Pengguna" required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label" for="Kata_Sandi">Kata Sandi</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" autocomplete="off" id="Kata_Sandi" name="Kata_Sandi" placeholder="Masukan Kata Sandi" required="required">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label" for="Jabatan">Jabatan</label>
      <div class="col-sm-9">
        <select class="form-control" id="Jabatan" name="Jabatan" required="required">
          <option hidden value="">Silahkan Pilih Jabatan</option>
          <option value="1">Admin</option>
          <option value="2">Tenaga Pendidik</option>
          <option value="3">Tenaga Kependidikan</option>
        </select>
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
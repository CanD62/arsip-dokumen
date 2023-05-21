<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-cloud-upload-alt"></i> Upload Dokumen</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('drive'); ?>" class="btn btn-danger btn-sm">
                            <i class="fas fa-arrow-alt-circle-left"></i> Kembali
                            </a>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <!-- <form> -->
                        <?php echo form_open_multipart('drive/save');?>
                            <div class="row">
                                <!-- kiri -->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="NamaDokumen">Nama Dokumen</label>
                                        <input type="text" class="form-control" id="NamaDokumen" name="NamaDokumen" placeholder="Masukan Nama Dokumen" autocomplete="off" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="DeskripsiDokumen">Deskripsi Dokumen</label>
                                        <textarea class="form-control" rows="2" id="DeskripsiDokumen" name="DeskripsiDokumen" placeholder="Masukan Deskripsi Dokumen..." required></textarea>
                                    </div>
                                </div>

                                <!-- kanan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="JenisDokumen">Jenis Dokumen</label>
                                        <select class="form-control select2 select2-primary" id="JenisDokumen" name="JenisDokumen" data-placeholder="Pilih Jenis Dokumen" required data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option></option>
                                            <?php
                                            foreach ($JenisDokumen as $jenis) {
                                            ?>
                                                <option value="<?= $jenis['id_jenis']; ?>"><?= $jenis['nama_jenis']; ?></option>.

                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="FileDokumen">File Dokumen </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="FileDokumen" name="FileDokumen" required>
                                            <label class="custom-file-label" for="FileDokumen">Choose file</label>
                                        </div>
                                        <span style="font-size: 12px;">Maks: 5MB | Tipe File : PDF,WORD,PPT,EXCEL,GAMBAR <font style="color:red">*</font>)</span>
                                    </div>

                                </div>
                            </div>


                            <!-- /.card-body -->

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-cloud-upload-alt"></i> Upload</button>
                    </div>
                    </form>

                </div>
                <!-- /.card -->
            </div>

            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        bsCustomFileInput.init();
    });
</script>
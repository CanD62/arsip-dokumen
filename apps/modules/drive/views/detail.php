<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas <?= $getDokumen['icon']; ?> mr-1"></i> <?= ucwords($getDokumen['nama_dokumen']); ?></h3>
            </div>
            <div class="card-body">
                <strong><i class="fas fa-file-alt mr-1"></i> Deskripsi Dokumen</strong>

                <p class="text-muted">
                    <?= $getDokumen['deskripsi']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-filter mr-1"></i> Jenis Dokumen</strong>

                <p class="text-muted"><?= $getDokumen['nama_jenis']; ?></p>

                <hr>

                <strong><i class="fas fa-folder-open mr-1"></i> Jenis File</strong>

                <p class="text-muted"><?= $getDokumen['nama_type']; ?></p>

                <hr>

                <strong><i class="fas fa-calendar-alt mr-1"></i> Terakhir diperbarui</strong>

                <p class="text-muted font-italic"><?= $getDokumen['update_at'] == NULL ? '-' : tanggal_indo($getDokumen['update_at']); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Opsi Dokumen</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <a href="<?=base_url('drive/edit/'.$getDokumen['id_dokumen']);?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt mr-1"></i> Edit</a>
                    <a href="#" onclick="hapus('<?= $getDokumen['id_dokumen']; ?>', '<?= ucwords($getDokumen['nama_dokumen']); ?>')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i> Hapus</a>
                    <!-- <a href="#" class="btn btn-sm btn-default"><i class="fas fa-cloud-download-alt mr-1"></i> Download</a> -->
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function hapus(id_dokumen,nama_dokumen) {
        // $("#Modal").modal("hide");
        $("#Modal").modal("show");
        $(".modal-title").html('<i class="fas fa-trash-alt"></i> Konfirmasi Hapus Dokumen');
        $("#show-detail").html('Apakah Anda Yakin, akan menghapus data '+nama_dokumen+'?  <div class="text-center"><a href="<?=base_url('drive/hapus/');?>'+id_dokumen+'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i> Ya, Hapus</a></div>');
    }
    </script>
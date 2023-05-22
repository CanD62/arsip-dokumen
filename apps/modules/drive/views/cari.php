<?php
if (!empty($getDokumen)) {
    foreach ($getDokumen as $dokumen) {
?>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon <?= $dokumen['color']; ?>"><i class="far <?= $dokumen['icon']; ?> fa-lg"></i></span>

                <div class="info-box-content">
                    <span style="font-size: 13px;"><?= ucwords($dokumen['nama_dokumen']); ?></span>
                    <span style="font-size: 12px;" class="font-italic">Upload : <?= tanggal_indo($dokumen['created_at']); ?></span>
                    <span style="font-size: 12px;" class="font-weight-bold"> Size : <?= formatSize($dokumen['size']); ?>
                        <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                        <a href="#" onclick="detail('<?= $dokumen['id_dokumen']; ?>')" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                    </span>
                </div>
            </div>

        </div>
<?php }
} else{
?>

<div class="col-6 text-right">Data Tidak Tersedia</div>

<?php
} ?>
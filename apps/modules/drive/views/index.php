<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="fas fa-search"></i> Cari Dokumen</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('drive/upload'); ?>" class="btn btn-tool btn-sm">
                                <i class="fas fa-cloud-upload-alt"></i> Upload Dokumen
                            </a>

                        </div>
                    </div>
                    <div class="card-body">

                        <!-- <form action="enhanced-results.html"> -->
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Tipe File:</label>
                                            <select class="select2" id="tipe" name="tipe" data-placeholder="Pilih Tipe File" style="width: 100%;">
                                                <option></option>
                                                <option value="all">Semua</option>
                                                <?php
                                                foreach ($getTipeAll as $tipe) {
                                                    echo '<option value="' . $tipe['id_type'] . '">' . $tipe['nama_type'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Jenis Dokumen:</label>
                                            <select class="select2" id="jenis" name="jenis" data-placeholder="Pilih Jenis Dokumen" style="width: 100%;">
                                                <option></option>
                                                <option value="all">Semua</option>
                                                <?php
                                                foreach ($getJenisAll as $jenis) {
                                                    echo '<option value="' . $jenis['id_jenis'] . '">' . $jenis['nama_jenis'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Urutan Sortir:</label>
                                            <select class="select2" id="sort" data-placeholder="Pilih sortir" name="sort" style="width: 100%;">
                                                <option></option>
                                                <option selected value="ASC">A-Z</option>
                                                <option value="DESC">Z-A</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Urutkan Berdasarkan:</label>
                                            <select class="select2" id="urutan" data-placeholder="Pilih urutan" name="urutan" style="width: 100%;">
                                                <option></option>
                                                <option selected value="1">Judul Dokumen</option>
                                                <option value="2">Tanggal Upload</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <input type="search" id="kata_kunci" name="kata_kunci" class="form-control form-control-lg" autocomplete="off" placeholder="Masukan kata kunci disini" required>
                                        <div class="input-group-append">
                                            <button id="cari" type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="fas fa-archive"></i> Arsip Dokumen</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('drive/upload'); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-cloud-upload-alt"></i> Upload Dokumen
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="row" id="tampilkan">
                            <!-- disini -->
                            <!-- <div id="tampilkan"> -->
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

                                <?php
                                }
                                } else {
                                ?>
                                <div class="col-12"><button type="button" class="btn btn-block bg-gradient-danger btn-lg">Belum ada dokumen</button></div>

                            <?php
                            } ?>
                            <!-- </div> -->
                            <!-- disini -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="modal fade" id="Modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="show-detail">
                <!-- <p>One fine body&hellip;</p> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function detail(id_dokumen) {
        $("#Modal").modal("show");
        $(".modal-title").html('');
        $.ajax({
            type: "POST",
            data: {
                id_dokumen: id_dokumen
            },
            url: '<?= base_url('drive/detail'); ?>',
            dataType: "html",
            success: function(data) {
                $(".modal-title").html('<i class="fas fa-archive"></i> Detail Dokumen');
                $("#show-detail").html(data);
            },
            pesan: function() {
                $("#show-detail").html("Terjadi kesalahan...");
            },
            beforeSend: function() {
                $("#show-detail").html('<div class="col-6 text-right"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Sedang memuat...</div>');
            },
        });
    }
    $(document).ready(function() {
        $('.select2').select2({});

        $("#cari").click(function() {
            var kata_kunci = $('#kata_kunci').val();
            var tipe = $('#tipe option:selected').val();
            var jenis = $('#jenis option:selected').val();
            var sort = $('#sort option:selected').val();
            var urutan = $('#urutan option:selected').val();
            $.ajax({
                type: "POST",
                url: '<?= base_url('drive/cariDokumen'); ?>',
                data: {
                    kata_kunci: kata_kunci,
                    tipe: tipe,
                    jenis: jenis,
                    sort: sort,
                    urutan: urutan
                },
                success: function(data) {
                    $("#tampilkan").html(data);
                },
                pesan: function() {
                    $("#tampilkan").html("Terjadi kesalahan...");
                },
                beforeSend: function() {
                    $("#tampilkan").html('<div class="col-6 text-right"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Mohon Tunggu...</div>');
                },
            });

        });
    });
</script>
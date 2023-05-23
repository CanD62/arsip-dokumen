<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-warning">
                    <div class="card-header border-0">
                        <h3 class="card-title">Arsip Dokumen Terakhir Upload</h3>
                        <!-- <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div> -->
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nama Dokumen</th>
                                    <th>Tipe Dokumen</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Tanggal Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- disini -->
                                <?php
                                if (!empty($getDokumen)) {
                                    foreach ($getDokumen as $dokumen) {
                                ?>
                                        <tr>
                                            <td>
                                                <button class="btn <?= $dokumen['color']; ?>">
                                                    <i class="fas <?= $dokumen['icon']; ?>"></i> </button>
                                                <?= ucwords($dokumen['nama_dokumen']); ?>
                                            </td>
                                            <td><?= $dokumen['nama_type']; ?></td>
                                            <td><?= $dokumen['nama_jenis']; ?></td>
                                            <td><?= tanggal_indo($dokumen['created_at']); ?></td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <td colspan="4" class="text-center"> Data Tidak Tersedia</td>
                                <?php } ?>
                                <!-- disni -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-primary">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Tenaga Pendidik</span>
                        <span class="info-box-number"><?= $jml_pendidik['jml']; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Tenaga Kependidikan</span>
                        <span class="info-box-number"><?= $jml_kependidikan['jml']; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fas fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Dokumen</span>
                        <span class="info-box-number"><?= $jml_dokumen['jml']; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-danger">
                    <span class="info-box-icon"><i class="fas fa-user-secret"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Admin</span>
                        <span class="info-box-number"><?= $jml_admin['jml']; ?></span>
                    </div>
                </div>
                <!-- /.info-box -->



            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
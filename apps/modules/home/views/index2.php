<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-danger">
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
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-danger">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><?= ucwords($getUser['nama_lengkap']); ?></h3>
                        <p class="widget-user-desc"><?= $getUser['nip']; ?> - <?= $getUser['status']; ?></p>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <!-- disini -->
                            <?php
                            foreach ($getDokumenUser as $doc) {
                            ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    <?=$doc['nama_jenis'];?> <span class="float-right badge <?=$doc['color'];?>"><?=$doc['jml'];?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <!-- disini -->
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
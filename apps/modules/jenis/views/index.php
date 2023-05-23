<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-filter"></i> Data Jenis</h3>
                        <div class="card-tools">
                            <button id="add_user" class="btn btn-success btn-sm">
                                <i class="fas fa-user-plus"></i> Tambah Jenis
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getJenis as $jenis) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= ucwords($jenis['nama_jenis']); ?></td>
                                        <td><?= $jenis['status']; ?></td>
                                        <td>
                                            <button onclick="edit('<?= $jenis['id_jenis']; ?>')" class="btn btn-warning text-white">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <?php
                                            if($jenis['jml_dokumen'] == 0):
                                            ?>
                                             <button onclick="hapus('<?= $jenis['id_jenis']; ?>', '<?= ucwords($jenis['nama_jenis']); ?>')" class="btn btn-danger text-white">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <?php else: ?>
                                                <button disabled class="btn btn-danger text-white">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- modal -->
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
    $("#add_user").click(function() {
        $("#Modal").modal("show");
        $.ajax({
            type: "GET",
            url: '<?= base_url('jenis/add'); ?>',
            dataType: "html",
            success: function(data) {
                $(".modal-title").html($("#add_user").text());
                $("#show-detail").html(data);
            },
            pesan: function() {
                $("#show-detail").html("Terjadi kesalahan...");
            },
            beforeSend: function() {
                $("#show-detail").html("Sedang memuat...");
            },
        });
    });

    function edit(id_jenis) {
        $("#Modal").modal("show");
        $(".modal-title").html('');
        $.ajax({
            type: "POST",
            data: {
                id_jenis: id_jenis
            },
            url: '<?= base_url('jenis/edit'); ?>',
            dataType: "html",
            success: function(data) {
                $(".modal-title").html('<i class="fas fa-pencil-alt"></i> Edit Jenis');
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

    function hapus(id_jenis, nama_lengkap) {
        // $("#Modal").modal("hide");
        $("#Modal").modal("show");
        $(".modal-title").html('<i class="fas fa-trash-alt"></i> Konfirmasi Hapus Jenis');
        $("#show-detail").html('Apakah Anda Yakin, akan menghapus Jenis ' + nama_lengkap + '?  <div class="text-center"><a href="<?= base_url('jenis/hapus/'); ?>' + id_jenis + '" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i> Ya, Hapus</a></div>');
    }
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
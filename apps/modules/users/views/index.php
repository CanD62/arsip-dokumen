<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-users"></i> Data Pengguna</h3>
                        <div class="card-tools">
                            <button id="add_user" class="btn btn-success btn-sm">
                                <i class="fas fa-user-plus"></i> Tambah Pengguna
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getUsers as $users) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $users['nip']; ?></td>
                                        <td><?= ucwords($users['nama_lengkap']); ?></td>
                                        <td><?= $users['email']; ?></td>
                                        <td><?= $users['status']; ?></td>
                                        <td>
                                            <button onclick="edit('<?= $users['user_id']; ?>')" class="btn btn-warning text-white">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button onclick="hapus('<?= $users['user_id']; ?>', '<?= ucwords($users['nama_lengkap']); ?>')" class="btn btn-danger text-white">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
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
            url: '<?= base_url('users/add'); ?>',
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

    function edit(user_id) {
        $("#Modal").modal("show");
        $(".modal-title").html('');
        $.ajax({
            type: "POST",
            data: {
                user_id: user_id
            },
            url: '<?= base_url('users/edit'); ?>',
            dataType: "html",
            success: function(data) {
                $(".modal-title").html('<i class="fas fa-pencil-alt"></i> Edit Pengguna');
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

    function hapus(user_id, nama_lengkap) {
        // $("#Modal").modal("hide");
        $("#Modal").modal("show");
        $(".modal-title").html('<i class="fas fa-trash-alt"></i> Konfirmasi Hapus Pengguna');
        $("#show-detail").html('Apakah Anda Yakin, akan menghapus Pengguna ' + nama_lengkap + '?  <div class="text-center"><a href="<?= base_url('users/hapus/'); ?>' + user_id + '" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i> Ya, Hapus</a></div>');
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
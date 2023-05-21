<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="fas fa-search"></i> Cari Dokumen</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-cloud-upload-alt"></i> Upload Dokumen
                            </a>

                        </div>
                    </div>
                    <div class="card-body">

                        <form action="enhanced-results.html">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Tipe File:</label>
                                                <select class="select2" name="tipe" data-placeholder="Pilih Tipe File" style="width: 100%;">
                                                    <option></option>    
                                                    <option value="all">Semua</option>
                                                    <?php
                                                    foreach ($getTipeAll as $tipe) {
                                                    echo '<option value="'.$tipe['id_type'].'">'.$tipe['nama_type'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Jenis Dokumen:</label>
                                                <select class="select2" name="jenis" data-placeholder="Pilih Jenis Dokumen" style="width: 100%;">
                                                    <option></option>    
                                                    <option value="all">Semua</option>
                                                    <?php
                                                    foreach ($getJenisAll as $jenis) {
                                                    echo '<option value="'.$jenis['id_jenis'].'">'.$jenis['nama_jenis'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Urutan Sortir:</label>
                                                <select class="select2" data-placeholder="Pilih sortir" name="sort" style="width: 100%;">
                                                    <option></option>    
                                                    <option selected value="ASC">A-Z</option>
                                                    <option value="DESC">Z-A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Urutkan Berdasarkan:</label>
                                                <select class="select2" data-placeholder="Pilih urutan" name="urutan" style="width: 100%;">
                                                     <option></option>    
                                                    <option selected value="1">Judul Dokumen</option>
                                                    <option value="2">Tanggal Upload</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-lg">
                                            <input type="search" name="kata_kunci" class="form-control form-control-lg" placeholder="Masukan kata kunci disini" required>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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
                            <a href="<?=base_url('drive/upload');?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-cloud-upload-alt"></i> Upload Dokumen
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="row">
                            <!-- disini -->
                            <?php
                            if(!empty($getDokumen)){
                            foreach ($getDokumen as $dokumen) {
                            ?>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon <?=$dokumen['color'];?>"><i class="far <?=$dokumen['icon'];?> fa-lg"></i></span>

                                    <div class="info-box-content">
                                        <span style="font-size: 13px;"><?=$dokumen['nama_dokumen'];?></span>
                                        <span style="font-size: 12px;" class="font-italic">Upload : <?=tanggal_indo($dokumen['created_at']);?></span>
                                           <span style="font-size: 12px;" class="font-weight-bold"> Size : <?=$dokumen['size'];?> KB
                                             <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <?php }} ?>
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
<script>
    $(document).ready(function() {
        $('.select2').select2({
          
        });
    });
</script>
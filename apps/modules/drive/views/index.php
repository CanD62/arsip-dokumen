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
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Tipe File:</label>
                                                <select class="select2" name="tipe" data-placeholder="Pilih tipe" style="width: 100%;">
                                                    <option></option>    
                                                    <option value="all">Semua</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Urutan Sortir:</label>
                                                <select class="select2" data-placeholder="Pilih sortir" style="width: 100%;">
                                                    <option></option>    
                                                    <option selected>A-Z</option>
                                                    <option>Z-A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Urutkan Berdasarkan:</label>
                                                <select class="select2" data-placeholder="Pilih urutan" style="width: 100%;">
                                                     <option></option>    
                                                    <option selected>Judul</option>
                                                    <option>Tanggal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-lg">
                                            <input type="search" class="form-control form-control-lg" placeholder="Masukan kata kunci disini">
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
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-primary"><i class="far fa-file-word fa-lg"></i></span>

                                    <div class="info-box-content">
                                        <span style="font-size: 13px;">SK Mengajar Hitungan Data Murid</span>
                                        <span style="font-size: 12px;" class="font-italic">Upload : 29 Desember 2023</span>
                                           <span style="font-size: 12px;" class="font-weight-bold"> Size : 1,121 KB
                                             <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>

                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="far fa-file-pdf"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">SK Paur Puar</span>
                                        <span class="info-box-number">1,410 KB
                                            <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="far fa-file-excel"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Hitungan Data Murid</span>
                                        <span class="info-box-number">1,410 KB
                                            <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fa fa-image"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Kenangan 2012</span>
                                        <span class="info-box-number">1,410 KB
                                            <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-file-powerpoint"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Bahan Ajar</span>
                                        <span class="info-box-number">1,410 KB
                                            <a href="#" class="btn btn-default btn-sm float-right button-spacing"><i class="fas fa-cloud-download-alt"></i></a>
                                            <a href="#" class="btn btn-secondary btn-sm float-right button-spacing"><i class="fas fa-info-circle"></i></a>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $template['title']; ?> - ARUNA KOSMETIK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css'); ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <div class="text-center"><i class="fa fa-cubes"></i> ARUNA KOSMETIK</div>
          <div class="text-center">Alamat: perumahan griya sembung baru no 8A</div>
          <div class="text-center">Cepiring - Kendal 51352</div>
        </h2>
      </div>
      <!-- /.col -->
    </div>


    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
      <?php echo $template['body']; ?>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
      
      </div>
      <!-- /.col -->
      <div class="col-xs-2 pull-right">

        <div class="table-responsive">
        <table class="table">
<tbody>
<tr>
<td colspan="3">Kendal, <?= date('d/m/Y');?></td>
</tr>
<tr></tr>
<td colspan="3">&nbsp;Admin</td>
</tr>

<tr>
<td colspan="3"><hr size="55px" /></td>
</tr>

</tbody>
</table>
        
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

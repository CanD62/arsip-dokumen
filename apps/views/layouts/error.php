<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>  
  <meta charset="utf-8" />
  <title><?php echo $template['title'];?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css');?>" type="text/css" />
  <link rel="stylesheet" href="<?=base_url('assets/css/animate.css');?>" type="text/css" />
  <link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css');?>" type="text/css" />
  <link rel="stylesheet" href="<?=base_url('assets/css/icon.css');?>" type="text/css" />
  <link rel="stylesheet" href="<?=base_url('assets/css/font.css');?>" type="text/css" />
  <link rel="stylesheet" href="<?=base_url('assets/css/app.css');?>" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
    <section id="content">
    <div class="row m-n">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="text-center m-b-lg">
          <h1 class="h text-white animated fadeInDownBig">404</h1>
        </div>
        <div class="list-group bg-info auto m-b-sm m-b-lg">
          <a href="<?=base_url('dashboard');?>" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="fa fa-fw fa-home icon-muted"></i> Goto homepage
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="fa fa-fw fa-question icon-muted"></i> Send us a tip
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <span class="badge bg-info lt">021-215-584</span>
            <i class="fa fa-fw fa-phone icon-muted"></i> Call us
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
            <?php echo  (ENVIRONMENT === 'development') ? 'Memory usage :' . $this->benchmark->memory_usage() . ', ' . $this->benchmark->elapsed_time() . ' seconds CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
          <strong><?php echo $this->apps->copyright;?></strong> &copy; 2015 - <?php echo (date('Y',strtotime('+1 years')));?> All rights reserved.
    </div>
  </footer>
  <!-- / footer -->
  <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
  <!-- Bootstrap -->
  <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
  <!-- App -->
  <script src="<?=base_url('assets/js/app.js');?>"></script>  
  <script src="<?=base_url('assets/js/slimscroll/jquery.slimscroll.min.js');?>"></script>
    <script src="<?=base_url('assets/js/app.plugin.js');?>"></script>
</body>
</html>
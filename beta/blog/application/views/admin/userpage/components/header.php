<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clean Phone Number Validation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style type="text/css">
  footer.main-footer.navbar-fixed-bottom {
    margin-left: 0px !important;
}
nav.navbar.navbar-static-top {
    margin-left: 0px !important;
}
header.main-header {
    background-color: #00a65a;
    color: #000 !important;
}
ul.nav.navbar-nav > li > a {
    color: white;
}
li.user-header {
    background-color: #3c8dbc;
}
li.dropdown.user.user-menu.open > a {
    background-color: #3c8dbc;
}
</style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page skin-blue layout-top-nav" style="height: 0px;">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>" class="navbar-brand"><b>Morena Technologies Pvt. Ltd.</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <!-- <ul class="nav navbar-nav">
            <li><a href="#">Link</a></li>
          </ul>
          -->
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      
                  <img src="<?php echo base_url();?>admin_assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if ($adminData->gender == 1) {echo "Mr.";}else{echo "Mrs.";}?> <?php echo $adminData->first_name.' '.$adminData->last_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>admin_assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 
                  <?php if ($adminData->gender == 1) {echo "Mr.";}else{echo "Miss.";}?> <?php echo $adminData->first_name.' '.$adminData->last_name; ?> - 
          <?php if($adminData->user_type == 1){
          echo "Super Admin";
          }else if($adminData->user_type == 2){
           echo "Admin";
          }else if($adminData->user_type == 3){
           echo "Agent";
          }else if($adminData->user_type == 4){
           echo "Digital";
          }else{
          echo "";
          }?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
          
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('Admin/changepassword'); ?>" class="btn btn-default btn-flat">Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>Admin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

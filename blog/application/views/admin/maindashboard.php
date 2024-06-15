<?php $this->load->View('admin/components/header_css'); ?>
<div class="wrapper">
<?php $this->load->View('admin/components/header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->View('admin/components/sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<style type="text/css">
.class-for-list{
  text-align: center;
  color: #fff;
}
.class-for-list > a{
  text-align: center;
  color: #fff;
}
</style>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Employes</span>
              <span class="info-box-number">
              1
              </span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="#">Go List</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total  Campaign</span>
              <span class="info-box-number">
                1
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="#">Go List</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Form Data </span>
              <span class="info-box-number">
                 1
              </span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description class-for-list"><a href="#">Go List</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
      </div>
      <!-- /.row -->
     

       <div class="row">
        <div class="col-md-12">
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- Main row -->
      <div class="row">
        
      </div>
      <!-- /.row (main row) -->

    </section>
  </div>
  <!-- /.content-wrapper -->
 <?php $this->load->View('admin/components/footer'); ?>
<?php $this->load->View('admin/components/footer_js'); ?>
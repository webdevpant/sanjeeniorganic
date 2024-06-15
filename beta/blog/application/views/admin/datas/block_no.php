<?php $this->load->view('admin/components/header_css.php'); ?>
<div class="wrapper">
  <?php $this->load->view('admin/components/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/components/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
    .dataTables_filter{
      text-align: right;
    }
    .paging_simple_numbers {
      text-align: right;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         DNC No Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  DNC No Management</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
            <div class="col-lg-5">
              <h3 class="box-title"> DNC No Management</h3>
            </div>
            <!-- <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>admin/Category/add_category" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Category</a>&nbsp;
              <a href="<?php echo base_url(); ?>admin/Category" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Category List</a>&nbsp;
            </div> -->
            <div class="col-lg-7">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message') ?></p>
              <?php if ($ms){?>
                <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px; color: #fff !important; ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><?php echo $ms ;?>
                </div>
              <?php }?>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             	<form name="optionForm" role="form" action="<?php echo base_url('Admin/phoneNoBlock'); ?>" method="post" >

 <div class="col-md-12" >  
 <div class="form-group"><label> DNC No Like :(1234567890,0987654321)</label>
	<textarea name="block_no" rows="8" class="form-control" ></textarea>
	<?php echo form_error("block_no");?>
 </div> 
</div>
 <div class="clearfix"></div>

 <div class="col-md-12" style="text-align: center;">  
	
	<div class="col-md-3"><button type="submit" class="btn btn-info col-md-8">Save</button></div>
 </div>  
 
</form>

<br><br><br><hr><br><br><br>

<form name="callSubmitForma" role="form" id="callSubmitForm" action="<?php echo base_url('Admin/DncCsvSubmit');?>" method="post" enctype="multipart/form-data">
      <div class="col-md-7">
        <div class="form-group">
          <label for="exampleInputEmail1">Import DNC No CSV</label>
          <input type="file" class="form-control" name="csvfile"  accept=".csv">
            <?php echo form_error("csvfile"); ?>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group" style="margin-top: 23px;">
          <button type="submit" class="btn btn-success">Import Data</button>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group" style="margin-top: 23px;">
          <a href="<?php echo base_url(); ?>uploads/csv/number.csv" class="btn btn-success">Download</a>
        </div>
      </div>
</form>

            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>

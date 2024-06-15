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
      Add Phlebo
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Add Phlebo</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
              <a href="<?php echo base_url(); ?>Admin/addtestcollectionuser" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Phlebo </a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/testcollectionuser" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Phlebo List</a>&nbsp;
            </div>
            <div class="col-lg-7">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message'); ?></p>
              <?php if ($ms){?>
                <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><?php echo $ms ;?>
                </div>
              <?php }?>
            </div>
            </div>
                   
                   <div class="box-body">
                    <div class="col-md-12">
     <?php  echo form_open_multipart('Admin/submittestcollectionuser', array('method'=>'post','role'=>'form')); ?>
                         
            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Name</label>
                                <input type="text" class="form-control" id="user_name" placeholder="Enter User Name" name="user_name" value="<?php echo set_value('user_name'); ?>">
              </div>
              <?php echo form_error("user_name"); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email ID</label>
                                <input type="text" class="form-control" id="user_email" placeholder="Enter Email ID" name="user_email" value="<?php echo set_value('user_email'); ?>">
                            </div>
                            <?php echo form_error("user_email"); ?>
                        </div>
            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile Number</label>
                                <input type="text" class="form-control" id="user_mobile" placeholder="Enter Mobile" name="user_mobile" value="<?php echo set_value('user_mobile'); ?>">
                            </div>
                                <?php echo form_error("user_mobile"); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" class="form-control" id="user_password" placeholder="Enter Password" name="user_password" value="<?php echo set_value('user_password'); ?>">
                            </div>
                                <?php echo form_error("user_password"); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">State</label>
                                <input type="text" class="form-control" id="user_state" placeholder="Enter State" name="user_state" value="<?php echo set_value('user_state'); ?>">
                            </div>
                                <?php echo form_error("user_state"); ?>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">City </label>
                                <input type="text" class="form-control" id="user_city" placeholder="Enter City" name="user_city" value="<?php echo set_value('user_city'); ?>">
                            </div>
                                <?php echo form_error("user_city"); ?>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" id="user_address" placeholder="Enter Address" name="user_address" value="<?php echo set_value('user_address'); ?>">
                            </div>
                                <?php echo form_error("user_address"); ?>
                        </div>
                  
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Zip Code</label>
                                <input type="text" class="form-control" id="user_zipcode" placeholder="Enter Zip Code" name="user_zipcode" value="<?php echo set_value('user_zipcode'); ?>">
                            </div>
                                <?php echo form_error("user_zipcode"); ?>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Profile Image</label>
                                <input type="file" class="form-control" id="user_img" placeholder="user_img" name="user_img" value="<?php echo set_value('user_img'); ?>">
                            </div>
                                <?php echo form_error("user_img"); ?>
                        </div>
                    
          
           <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-info">Submit User</button>
            </div>
                    </div>
                 <?php  echo form_close(); ?>
               
                    </div>
                </div>
                </div>
               </div>
              </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>
    </div><!-- ./wrapper -->
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" />
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>


    <script>
      $(function () {      
        $('#example').DataTable();
        //$('#timepicker1').timepicker();
      });
</script>

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
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
      <h1>Campaign List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Campaign List</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
            Campaign List
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
    <form name="elementForm" id="leadAddForm" role="form" action="<?php echo base_url('Admin/updatCampaign');?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="campaign_id" value="<?php echo $brd_info->campaign_id; ?>">
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Campaign Name</label>
                                <input type="text" class="form-control" id="campaign_title" placeholder="Enter Name" name="campaign_title" value="<?php echo $brd_info->campaign_title; ?>">
							</div>
                <?php echo form_error( "campaign_title"); ?>          
               <div class="form-group">
                <label for="exampleInputEmail1">Campaign Form</label>
                      <select name="campaign_form" class="form-control" >
                      <option value="1" <?php if($brd_info->campaign_form == 1) echo "selected"; ?>>DEBT FORM</option>
                      <option value="2" <?php if($brd_info->campaign_form == 2) echo "selected"; ?>>TAX FORM</option>
                      <option value="3" <?php if($brd_info->campaign_form == 3) echo "selected"; ?>>MORTGAGE FORM</option>
                </select>
                <?php echo form_error( "campaign_form"); ?>
              </div>
              
							
                        </div>
					 <div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
                    </div>
                    </form>              </div>
                </div>

                </div>
               </div>

              </div>
          </div>

        </section><!-- /.content -->





      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>
    </div><!-- ./wrapper -->


<?php //$this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
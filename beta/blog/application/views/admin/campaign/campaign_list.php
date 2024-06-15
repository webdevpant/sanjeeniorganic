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
      <h1>campaign List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> campaign List</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
             campaign List
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
                    <form name="elementForm" id="leadAddForm" role="form" action="<?php echo base_url('Admin/addcampaign');?>" method="post" enctype="multipart/form-data">
                			 
                			<div class="col-md-4">
                				<div class="form-group">
                					<label for="exampleInputEmail1">Campaign Title</label>
                					<input type="text" class="form-control" id="campaign_title" placeholder="Enter Title" name="campaign_title" value="<?php echo set_value('campaign_title'); ?>">
                				</div>
                				<?php echo form_error( "campaign_title"); ?>
                			</div>
                			<div class="form-group col-md-4">
                				<label for="exampleInputFile"> Form</label>
                				<select name="campaign_form" class="form-control" >
                					<option value="1" selected>DEBT FORM</option>
                					<option value="2">TAX FORM</option>
                          <option value="3">MORTGAGE FORM</option>
                				</select>
                				<?php echo form_error( "campaign_form"); ?>
                				 
                			</div>
                		    <div class="col-md-2">
                				<div class="form-group">
                					<label for="exampleInputFile">&nbsp;</label>
                					<button type="submit" class="btn btn-info form-control">Submit</button>
                				</div>
                			</div>
                		</form>
                  </div>
                </div>

                </div>
               </div>


               <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-10 btn-class">
              campaign List
            </div>
            <div class="col-lg-2">
              
            </div>
            </div>
                   
                   <div class="box-body">
                    <div class="col-md-12">
                 
                 <table id="example" class="table table-striped table-bordered bootstrap-datatable responsive datatable">
    <thead>
    <tr>
        <th>S.No.</th>
        <th>Campaign</th>
        <th>Created</th>
        <th>Status</th>
        <th>Action</th>
       
    </tr>
    </thead>
    <tbody>
	<?php
	 $count=0;
	if(count($allElement)>0)
	{
		foreach($allElement as $ae) {
			$count++;
	?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $ae->campaign_title; ?></td>
        <td><?php echo $ae->campaign_created; ?></td>
      
        
         
       
		<td class="center">
		<?php
		if($ae->campaign_status==1){
		?>
		<p><a href="<?php echo base_url('Admin/campaignstatus/'.$ae->campaign_id.'/0/'); ?>"><span class="label label-success">Active</span></a></p>
		<?php } else { ?>
		<p><a href="<?php echo base_url('Admin/campaignstatus/'.$ae->campaign_id.'/1/'); ?>"><span class="label label-danger">Inactive</span></a></p>
		<?php } ?>
		
	
		</td>
		<td>	
			<p><a href="<?php echo base_url('Admin/campaigndelete/'.$ae->campaign_id.'/3/'); ?>" Onclick="return ConfirmDelete()"><span class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></span></a></p>
			<p><a href="<?php echo base_url('Admin/eidtcampaign/'.$ae->campaign_id.'/'); ?>" ><span class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i></span></a></p>
		</td>
 
    </tr>
	<?php } } ?>
    </tbody>
    </table>  </div>
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

<?php //$this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
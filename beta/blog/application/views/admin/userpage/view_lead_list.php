<?php $this->load->view('admin/userpage/components/header'); ?>
<div class="container">
<div class="row">		
	<div class="col-md-12">
		<div class="box">
          
             <div class="box-header with-border">
            	
	            <div class="col-lg-7 btn-class">
	              <a href="<?php echo base_url(); ?>Admin/checkNumber" class="btn btn-flat" style="background-color: #e91e63; color: #fff;"><span class="fa fa-plus-circle" ></span> Go Back </a>&nbsp;
	              <a href="<?php echo base_url(); ?>Admin/select_lead/<?php echo str_replace('=','',base64_encode($this->input->post('mobile')));?>" class="btn btn-flat" style="background-color: #4caf50; color: #fff;"><span class="fa fa-plus-circle" ></span> Go Started </a>&nbsp;
	            </div> 
	            <div class="col-lg-5">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message'); ?></p>
              <?php if ($ms){?>
                <div class='alert alert-success alert-dismissible pull-right' style="margin: 0px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i><?php echo $ms ;?>
                </div>
              <?php }?>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped display" >
	              <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Date</th>
	                  <th>Name</th>
	                  <th>Mobile No.</th>
	                  <th>Campaign</th>
	                  <th>Agent Name</th>
	                  <th>Remark Status</th> 
	                  <th>Comment</th>                           
	                </tr>
	              </thead>

	             
	               <tbody>
	                  <?php
	                   $i=0; foreach ($lead_data as $key => $value) { $i++; ?>
	                   <tr>
	                  	<td><?php echo $i; ?></td>
	                    <td><?php echo date("d M Y", strtotime($value->date)); ?></td>
	                    <td><?php echo $value->name; ?></td>
	                    <td><?php echo $value->phone_number; ?></td>
	                    <td><?php echo $value->campaign; ?></td>
	                    <td><?php echo $value->agent_name; ?></td>
	                    <td><?php echo $value->remark_status; ?></td>
	                    <td><?php echo $value->comment; ?></td>  
	                   </tr>          
	                  <?php } ?>
	                
	              </tbody>
	            </table> 
          </div>
	</div>
</div>
</div>
<?php $this->load->view('admin/userpage/components/footer'); ?>

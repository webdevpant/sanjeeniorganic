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
       Post List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Post List</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           <div class="col-lg-4 btn-class">
              <a href="<?php echo base_url(); ?>Admin/addpost" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Post </a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/post" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Post List</a>&nbsp;
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
                  
                  <div class="col-md-7">
            <?php echo $links; ?>
            </div>
   <div class="col-md-5" style="margin: 20px 0px 20px 0px;">
      <form method="GET" action="<?php echo base_url('Admin/post'); ?>">
        <div class="col-md-10 mtassing">
          <input type="text" name="post_name" class="form-control" id="post_name" data-live-search="true" placeholder="Search by Post Name" value="<?php echo @$_GET['post_name']; ?>"> 
        </div> 
 
        <div class="col-md-2 mtassing">
          <input type="submit" value="Search" name="submit" title="Search" style="margin-right: 10px;" class="btn btn-success">
        		
		 </div>
      </form>
    </div>
                     <table  class="table table-striped table-bordered bootstrap-datatable responsive datatable">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Image</th>
        <th>Post Name</th>
        <th>Category</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
  <?php
  
  if($this->uri->segment('3')==null)
  {
      $k=0;
  }else{
      $k=$this->uri->segment('3');
  }
  
 
  if(count($post_list)>0)
  {
    foreach($post_list as $ae) {
      $k++;
  ?>
    <tr>
        <td><?php echo $k; ?></td>
        <td>
          <?php if (!empty($ae->post_img)) { ?>
              <img src="<?php echo base_url("uploads/post")."/".$ae->post_img; ?>" height="60">
            <?php  } else { ?>
             <img src="<?php echo base_url(); ?>admin_assets/img/no-image-icon.png" height="60">
            <?php } ?>
          
        </td>
        <td>
    <?php echo $ae->post_title; ?>
    
    </td>
        <td>
    <?php
    if($ae->post_id!=0) { 
      $CategoryData= $this->Admin_Model->getCatNameForPost($ae->post_id); 
      

      if (!empty($CategoryData)) {
        foreach ($CategoryData as $key => $aed) {
          echo $aed->category_name;echo "<br>";
        }
      }else{
        echo "";
      }
    } else { 
      echo "Parent"; 
    } 
    ?>
    </td>
     <td>
    <?php echo date("d M Y", strtotime($ae->post_created)); ?>
    </td>
    <?php /*<td>
    <?php
    if($ae->product_id!=0) { 
      $BraData= $this->Admin_Model->getBranchForProduct($ae->product_id); 
      foreach ($BraData as $key => $BraDa) {
        echo $BraDa->bra_name; echo "<br>";
      }
    } else { 
      echo "Parent"; 
    } 
    ?>
    </td> */?>
  
        <td class="center">
      <p class="text-center">
      <?php  if($ae->post_status==1) { ?>
    
        <a href="<?php echo base_url('Admin/updateupoststatus/'.str_replace('=','',base64_encode($ae->post_id).'/0/')); ?>"><span class="label-success label label-default">Active</span></a>
      <?php } else { ?> 
        <a href="<?php echo base_url('Admin/updateupoststatus/'.str_replace('=','',base64_encode($ae->post_id).'/1/')); ?>"><span class="label-default label label-danger">Inactive</span></a>
       
      <?php } ?>
       
     

      
      </p>
   
   
        
      <p class="text-center">

<a href="<?php echo base_url('Admin/add_post_faq/'.str_replace('=','',base64_encode($ae->post_id))); ?>" class="btn btn-info">FAQ</a>
      <a href="<?php echo base_url('Admin/editpost/'.str_replace('=','',base64_encode($ae->post_id))); ?>" class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i></a>
      <a href="<?php echo base_url('Admin/deletepost/'.str_replace('=','',base64_encode($ae->post_id).'/1/')); ?>" class="btn btn-danger" onclick="return confirm('Do you really want to delete this Post ?')"><i class="glyphicon glyphicon-trash icon-white"></i></a>
     
      </p>
    </td>
     
    </tr>
  <?php } } ?>
    </tbody>
    </table>
    
    <?php echo $links; ?>
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
    <script>
      $(function () {      
        $('#example').DataTable();
        //$('#timepicker1').timepicker();
      });
</script>

<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
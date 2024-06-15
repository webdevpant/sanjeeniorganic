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
       Phlebo User List
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Phlebo User List</li>
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
               <a href="<?php echo base_url(); ?>Admin/searchPhleboslotOrder" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-search"></span> Phlebo Slot</a>&nbsp;
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
               <table id="example" class="table table-striped table-bordered bootstrap-datatable responsive datatable">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Source</th>
        <th>Status</th>
        <th>Registered On</th>
        <th>Action</th>
        
    </tr>
    </thead>
    <tbody>
  <?php
   $kk=1;
   $sess_data=$this->session->userdata('login-in');
     $user_type=$sess_data['user_type'];
  if(count($userList)>0)
  {
    foreach($userList as $ae) {
  ?>
    <tr>
        <td><?php echo $kk; ?></td>
        <td><?php if (!empty($ae->user_img)) { ?>
            <img style="width: 84px;" src="<?php echo base_url(); ?>uploads/test_collection_user_img/<?php echo $ae->user_img; ?>">
        <?php }else{?>
            <img style="width: 84px;" src="<?php echo base_url(); ?>assets/img/no-photo.jpg">
        <?php } ?></td>
        <td><?php echo $ae->user_name; ?></td>
        <td><?php echo $ae->user_email; ?></td>
        <td><?php echo $ae->user_mobile; ?></td>
        <td><?php echo $ae->user_address; ?></td>
        <td><?php echo $ae->user_source; ?></td>
        <td>
            <?php
        if($ae->user_status==1){
        ?>
        <p><a href="<?php echo base_url('Admin/testcollectionuserStatus/'.$ae->user_id.'/0/'); ?>"><span class="label label-success">Active</span></a></p>
        <?php } else { ?>
        <p><a href="<?php echo base_url('Admin/testcollectionuserStatus/'.$ae->user_id.'/1/'); ?>"><span class="label label-danger">Inactive</span></a></p>
        <?php } ?>
        
        </td>
        <td><?php echo date('d, M Y H:i',strtotime($ae->user_created)); ?></td>
       <td>
        
            
        <p><a href="<?php echo base_url('Admin/edittestcollectionuser/'.$ae->user_id.'/'); ?>" ><span class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i></span></a></p>
    <?php if($user_type==1){ ?>
        <p><a href="<?php echo base_url('Admin/testcollectionuserDelete/'.$ae->user_id.'/3/'); ?>" Onclick="return ConfirmDelete()"><span class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></span></a></p>
    <?php }?>
        </td>
    </tr>
  <?php $kk++; } } ?>
    </tbody>
    </table>
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
<script>
function ConfirmDelete()
{
  var confDel = confirm("Do You Really want to Delete this User ?");
  
  if(confDel==1) { return true; } else { return false; }
   
}
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
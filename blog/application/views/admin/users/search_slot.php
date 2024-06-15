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
    .mtassing{
      margin-top: 10px; 
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Search Slot Data
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Search Slot Data</li>
      </ol>
    </section>

  <?php
  $phlebo_id=$this->input->get('phlebo_id');
  $searchdate=$this->input->get('searchdate');


  if ($phlebo_id || $searchdate) {
      $slotSearchData=$this->Admin_Model->getSlotTimeOrder($phlebo_id,$searchdate);
  } 
  //print_r(@$slotSearchData); 
  ?>
  <form action="<?php echo base_url('Admin/searchPhleboslotOrder');?>" method="get"> 
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
              <div class="col-lg-2">
              <select class="form-control" name="phlebo_id">
                  <option value="0">Select User</option>
                  <?php
                  $userslists=$this->Admin_Model->getPhleboNameData();
                  //print_r($userslist);
                  if(count($userslists)>0) {
                    foreach($userslists as $users_lists){
                  ?>
                  <option value="<?php echo $users_lists->user_id; ?>" <?php if(@$_GET['phlebo_id']==$users_lists->user_id) echo 'selected'; ?>><?php echo $users_lists->user_name; ?></option> 
                  <?php } } ?>
                </select>
            </div>
            <div class="col-lg-2">
              <?php $search=$this->input->get('searchdate');?>
              <input type="text" required="" autocomplete="off" value="<?php echo $search ?>" name="searchdate" placeholder="To Date" id="datetimepicker" class="form-control">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-success">Search Data</button>
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
                   
                   <div class="box-body">
                    <div class="col-md-12">
                     <table id="example" class="table table-striped table-bordered bootstrap-datatable responsive datatable">
  
    <thead>
    <tr>
        <th>S.No</th>
        <th>Order ID</th>
        <th>Patient Detail</th>
        <th>Order Date</th>
        <th>Address</th>
  
    </tr>
    </thead>
    <tbody>
  <?php
  $k=0;

  if(!empty($slotSearchData))
  {
    foreach($slotSearchData as $ae) {
    $k++;
  ?>
    <tr>
     <td class="center">
      <?php echo $k; ?></td>
       <td><?php echo $ae->order_unique_code; ?></td>
      <td>Patient Name :- <?php echo $ae->order_firstname; ?><br>
      Mobile No :- <?php echo $ae->order_phone; ?><br>
      Email ID :- <?php echo $ae->order_email; ?></td>
      
      <td><b>Order Date : -</b> <?php echo $ae->order_created; ?><br>
          <b>Test Data & Time :- </b> <?php echo $ae->test_date; ?><br>
          <b>Time Slot:- </b> <?php
          if (!empty($ae->time_slot)) {
            $getTimeSlot= $this->Admin_Model->getTimeSlot($ae->time_slot); echo $getTimeSlot->time_slot;
          } else {
          
          }?></td>
      <td><?php echo $ae->order_address; ?></td>
       
    </tr>
  <?php  }} ?>
    </tbody>
    </table>
                    </div>
                </div>
                </div>
               </div>
              </div>
          </div>

        </section><!-- /.content -->
      </form>
      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>



    </div><!-- ./wrapper -->

    <script>
      $(function () {      
        $('#example').DataTable();
        //$('#timepicker1').timepicker();
      });
</script>
<script type="text/javascript">
      $('#checkall').change(function(){
        $('.checkitem').prop("checked", $(this).prop("checked"))
      })
    </script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
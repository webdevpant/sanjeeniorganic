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
        Form Date List Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Date Query</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
          
            <div class="col-lg-7 btn-class">
               <form method="POST" action="<?php echo base_url('Admin/exportdata');?>">
      <div class="col-md-12">
        <div class="col-md-3">
          <div class="form-group">
              <div class="form-group"><label>From Date</label>
              <?php $fromdate=$this->input->get("fromdate");?>
          <input type="text" required="" autocomplete="off" value="<?php echo $fromdate; ?>" name="fromdate" placeholder="From Date" id="datetimepicker4" class="form-control" >
            </div>
            </div>
        </div>  

        <div class="col-md-3">
          <div class="form-group">
              <div class="form-group"><label> To Date</label>
               <?php $todate=$this->input->get("todate");?>
          <input type="text" required="" autocomplete="off" value="<?php echo $todate; ?>" name="todate" placeholder="To Date" id="datetimepicker5" class="form-control">
            </div>
            </div>
        </div>
      <div class="col-md-3" style="margin-top: 23px;">
        <input type="submit" value="Export" name="submit" title="Export" style="margin-right: 10px;"  class="btn btn-success">
      </div>
       </div>
</form>

            </div>

            <div class="col-md-5">
             
            </div>
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
              <table id="example1" class="table table-striped table-bordered bootstrap-datatable responsive datatable">
    <thead>
    <tr>
        <th>S.No.</th>
        <th>Contact Info.</th>
        <th>Company Details</th>
        <th>Account. INFO.</th>
        <th>Action</th>
       
    </tr>
    </thead>
    <tbody>
  <?php
   $count=0;
  if(count($fordata)>0)
  {
    foreach($fordata as $ae) {
      $count++;
  ?>
    <tr>

      <td><?php echo $count; ?></td>
      <td>
      <b>Name : </b> <?php echo $ae->company_name; ?><br>
      <b>Mobile No. : </b> <?php echo $ae->company_mobile; ?><br>
      <b>Phone No. : </b> <?php echo $ae->company_phone; ?><br>
      <b>Paytm No. : </b> <?php echo $ae->paytm_number; ?><br>
      <b>GooglePay No. : </b> <?php echo $ae->google_pay_number; ?><br>
      <b>PhonePe No. : </b> <?php echo $ae->phone_pe_number; ?><br>
      <b>Email : </b> <?php echo $ae->company_email; ?><br>
      <b>Address : </b> <?php echo $ae->company_address; ?><br>
      <a target="_new" class="btn-sm btn-success" href="<?php echo base_url(); ?><?php echo $ae->any_qr_code; ?>">QrCode</a>
    </td>
    <td>
      <b>Year of Est. : </b> <?php echo $ae->company_year_of_est; ?><br>
      <b>Category : </b> <?php echo $ae->company_category; ?><br>
      <b>Nature Business : </b> <?php echo $ae->company_nature_business; ?><br>
      <b>Card URL : </b> <?php echo $ae->company_url; ?><br>
      <b>Website URL : </b> <?php echo $ae->company_website_url; ?><br>
      <b>Specialities : </b> <?php echo word_limiter($ae->company_specialities, 8); ?><br>
      <b>Facebook : </b> <?php echo $ae->company_facebook; ?><br>
      <b>Twitter : </b> <?php echo $ae->company_twitter; ?><br>
      <b>Instagram : </b> <?php echo $ae->company_instagram; ?><br>
      <b>Youtube : </b> <?php echo $ae->company_youtube; ?><br>
      <b>Pinterest : </b> <?php echo $ae->company_pinterest; ?><br>
      <b>Linkedin : </b> <?php echo $ae->company_linkedin; ?><br>
      <b>Telegram : </b> <?php echo $ae->company_telegram; ?><br>
    </td>
    <td>
      <b>Man. Director : </b> <?php echo $ae->company_managing_director; ?><br>
      <b>Bank Name : </b> <?php echo $ae->company_bank_name; ?><br>
      <b>IFSC : </b> <?php echo $ae->company_ifsc_code; ?><br>
      <b>Holder : </b> <?php echo $ae->account_holder_name; ?><br>
      <b>Account No. : </b> <?php echo $ae->account_number; ?><br>
      <b>Account Type. : </b> <?php if( $ae->account_type == 1){ echo "Saving Account"; }else{ echo "Current Account"; } ?><br>
      
    </td>
    
    <td class="center">
    <p>
      <?php if($ae->company_status == 0){?>
        <a href="<?php echo base_url(); ?>Admin/partQuery/<?php echo $ae->company_id; ?>/1"><span class="btn btn-danger btn-sm">In Active</a></p>
      <?php }else{ ?>
        <a href="<?php echo base_url(); ?>Admin/partQuery/<?php echo $ae->company_id; ?>/0"><span class="btn btn-success btn-sm">Active</a></p>
      <?php } ?>
      <a href="<?php echo base_url(); ?>Admin/partDelete/<?php echo $ae->company_id; ?>/3"><span class="btn btn-danger btn-sm">Delete</a></p>    
    </td>
 
    </tr>
  <?php } } ?>
    </tbody>
    </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>


<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/calendar/jquery.datetimepicker.css"/>
<script src="<?php echo base_url();?>assets/calendar/jquery.js"></script>
<script src="<?php echo base_url();?>assets/calendar/jquery.datetimepicker.full.js"></script>
<script>
    // $('#datetimepicker2').datetimepicker({
    // format:'Y-m-d h:i:s',  
    // //  format:'d/m/Y H:i', 
    //   // minTime: '0:00',
    //   // maxTime: '24:00',
    // });


$('#datetimepicker3').datetimepicker({
      format:'Y-m-d',  
      timepicker:false
    });
    $('#datetimepicker4').datetimepicker({
      format:'Y-m-d',  
      timepicker:false
    });

</script>

<script>
    $('#datetimepicker2').datetimepicker({
      timepicker:false,
      format:'Y-m-d'
    });
    $('#datetimepicker3').datetimepicker({
      timepicker:false,
      format:'Y-m-d'
    });
     $('#datetimepicker5').datetimepicker({
      timepicker:false,
      format:'Y-m-d'
    });
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
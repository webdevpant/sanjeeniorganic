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
      <h1>Add Post Faq
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Add Post Faq</li>
      </ol>
    </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
           Add Post Faq
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
<form name="optionForm" role="form" action="<?php echo base_url('Admin/addTestFaq'); ?>" method="post">
        <input class="form-control" type="hidden" name="post_id" id="post_id" value="<?php echo base64_decode($this->uri->segment(3)); ?>"/>
<div class="col-md-12">
  <div class="form-group"><label> Faq Questions:</label>
    <input class="form-control" type="text" name="faq_q" id="faq_q" placeholder="Enter Name" />
  </div>
  <?php echo form_error("test_name");?>
</div>
<div class="col-md-12">
  <div class="form-group"><label> Faq Answers:</label>
    <textarea class="form-control" id="editor1"  name="faq_a"></textarea>
  </div>
  <?php echo form_error("test_desc");?>
</div>


 <div class="col-md-12" style="text-align: center;">  
  <div class="col-md-3"><button type="submit" class="btn btn-info col-md-8">Save</button></div>
 </div>  
</form>                    </div>
                </div>

                </div>
               </div>


               <div class="col-md-12">
               <div id="listGroup" class="box box-info">
                <div class="box-header with-border">
           
            <div class="col-lg-5 btn-class">
              Test Name List
            </div>
            <div class="col-lg-7">
             
            </div>
            </div>
                   
                   <div class="box-body">
                    <div class="col-md-12">
        <table id="example" class="table table-striped table-bordered bootstrap-datatable datatable responsive">  
          <thead>
            <tr>
              <th>S.No</th>
              <th>Faq Questions</th>
              <th>Faq Answers</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id="tbd1">
          <?php  
          $k=0;
          $testNameLis=$this->Admin_Model->getTestFaqList(base64_decode($this->uri->segment(3)));
          foreach($testNameLis as $test){
          $k++; 
          ?>
            <tr>
              <td><?php echo $k ?></td>
              <td><?php echo $test->faq_q; ?></td>
              <td><?php echo $test->faq_a; ?></td>
              <td> <a href="<?php echo base_url('Admin/deletePostfaq').'/'.$test->post_faq_id; ?>" title="Delete"><span class="label label-danger">Delete</span></a>
               <a href="<?php echo base_url('Admin/editPostFaq/'.str_replace('=','',base64_encode($test->post_faq_id))); ?>" title="Delete"><span class="label label-info">Edit</span></a>
             </td> 

            </tr> 
          <?php  }  ?>
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

<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
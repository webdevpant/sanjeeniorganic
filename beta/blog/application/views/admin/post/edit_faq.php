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
<form name="optionForm" role="form" action="<?php echo base_url('Admin/updateTestFaq'); ?>" method="post">
<input class="form-control" type="hidden" name="post_faq_id" id="post_faq_id" value="<?php echo base64_decode($this->uri->segment(3)); ?>"/>
<input class="form-control" type="hidden" name="post_id" id="post_id" value="<?php echo $faq_edit->post_id; ?>"/>
<div class="col-md-12">
  <div class="form-group"><label> Faq Questions:</label>
    <input class="form-control" type="text" name="faq_q" id="faq_q" placeholder="Enter Name" value="<?php echo $faq_edit->faq_q; ?>" />
  </div>
  <?php echo form_error("faq_q");?>
</div>
<div class="col-md-12">
  <div class="form-group"><label> Faq Answers:</label>
    <textarea class="form-control" id="editor1"  name="faq_a" ><?php echo $faq_edit->faq_a; ?></textarea>
  </div>
  <?php echo form_error("faq_a");?>
</div>


 <div class="col-md-12" style="text-align: center;">  
  <div class="col-md-3"><button type="submit" class="btn btn-info col-md-8">Save</button></div>
 </div>  
</form>                    </div>
                </div>

                </div>
               </div>


              
              </div>
          </div>

        </section><!-- /.content -->





      </div><!-- /.content-wrapper -->

<?php $this->load->view('admin/components/footer'); ?>
    </div><!-- ./wrapper -->
 
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
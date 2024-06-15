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
        Blog Category List Management
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog Category</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
           
             <div class="col-lg-4 btn-class">
               <a href="<?php echo base_url(); ?>Admin/blogaddCategory" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Category</a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/blogcategory" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Category List</a>&nbsp;
            </div> 
            <div class="col-lg-4">
              <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                  <option value="0">Main Category</option>
                  <?php 
                  $categoryList = $this->Admin_Model->bloggetActiveCategory();
                  //print_r($categoryList);
                  if(count($categoryList)>0) {
                    foreach($categoryList as $category){
                  ?>
                  <option value="<?php echo base_url();?>Admin/blogcategory/<?php echo $category->category_id; ?>" <?php if($this->uri->segment(3)==$category->category_id) echo 'selected'; ?>><?php echo $category->category_name; ?></option> 
                  <?php } } ?>
                </select>
            </div>
            <div class="col-lg-4">
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
        <th>Category Name</th>
        <th>Parent Category</th>
        <th>Menu Active</th>
        <th>Image</th>
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
        <td><?php echo $ae->category_name; ?></td>
        <td class="center"><?php
        if($ae->category_parent_id!=0) { $catdataforprint=$this->Admin_Model->bloggetCatName($ae->category_parent_id); echo $catdataforprint->category_name; } else { echo "Parent"; } 
        ?></td>
        <td class="center"><?php echo $ae->category_menu_active; ?></td>
            <?php if (!empty($ae->category_image)) { ?>
              <td class="center"><img src="<?php echo base_url('uploads/blog_category')."/".$ae->category_image; ?>" height="50"></td>
            <?php  } else { ?>
              <td class="center"><img src="<?php echo base_url(); ?>admin_assets/img/no-image-icon.png" height="50"></td>
            <?php } ?>
        <td class="center"><?php echo date("Y-m-d h:i A",strtotime($ae->category_created)); ?></td>
        <td class="center">
        <?php
        if($ae->category_status==1){
        ?>
        <p><a href="<?php echo base_url('admin/blogcategorystatus/'.$ae->category_id.'/0/'); ?>"><span class="label label-success">Active</span></a></p>
        <?php } else { ?>
        <p><a href="<?php echo base_url('admin/blogcategorystatus/'.$ae->category_id.'/1/'); ?>"><span class="label label-danger">Inactive</span></a></p>
        <?php } ?>
        
    
        </td>
        <td>    
            <p><a href="<?php echo base_url('admin/blogdeletecategory/'.$ae->category_id.'/'); ?>" Onclick="return ConfirmDelete()"><span class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></span></a></p>
            <p><a href="<?php echo base_url('admin/blogeditcategory/'.$ae->category_id.'/'); ?>" ><span class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i></span></a></p>
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






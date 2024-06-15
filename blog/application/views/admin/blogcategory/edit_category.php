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
       Edit Blog Category
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Blog Category</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-bottom: 30px;">
       <div class="box">
             <div class="box-header with-border">
           
             <div class="col-lg-5 btn-class">
               <a href="<?php echo base_url(); ?>Admin/blogaddCategory" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-plus-circle" ></span> Add Category</a>&nbsp;
              <a href="<?php echo base_url(); ?>Admin/blogcategory" class="btn btn-flat margin" style="background-color: #605ca8; color: #fff;"><span class="fa fa-list"></span> Category List</a>&nbsp;
            </div> 
            <div class="col-lg-7">
              <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message') ?></p>
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
                    <form name="elementForm" id="leadAddForm" role="form" action="<?php echo base_url('admin/blogupdatecategory');?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="category_id" value="<?php echo $cat_info->category_id; ?>">
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="category_name" placeholder="Enter Name" name="category_name" value="<?php echo $cat_info->category_name; ?>">
							</div>
								<?php echo form_error( "category_name"); ?>
							
                
                <div class="form-group">
                                <label for="exampleInputEmail1">Category URL</label>
                                <input type="text" class="form-control" id="category_url" placeholder="Enter Name" name="category_url" value="<?php echo $cat_info->category_url; ?>">
              </div>
                <?php echo form_error("category_url"); ?>


              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <select class="form-control" id="category_parent" name="category_parent">
									<option value="0">Main Category</option>
									<?php 
									$categoryList = $this->Admin_Model->bloggetActiveCategory();
									if(count($categoryList)>0) {
										foreach($categoryList as $category){
									?>
									<option value="<?php echo $category->category_id; ?>" <?php if($cat_info->category_parent_id==$category->category_id) echo 'selected'; ?>><?php echo $category->category_name; ?></option> 
									<?php } } ?>
								 
								</select>
								
							</div>
							<?php echo form_error( "category_parent"); ?>

							
							<div class="form-group">
                                <label for="exampleInputEmail1">Category Image<span style="font-size:11px;color:red"> Size(570x300)</span></label>
                                <input type="file" class="form-control" id="category_image" placeholder="Choose Image" name="category_image" value=""> </div>
                            <?php echo form_error( "category_image"); ?>
							
							<div class="form-group col-md-6">
                                <label for="exampleInputFile"> Status</label>
                                <br> Active
                                <input name="category_status" id="category_status" value="1" type="radio" <?php if($cat_info->category_status==1) echo 'checked'; ?> > Inactive
                                <input name="category_status" id="category_status" value="0" type="radio" <?php if($cat_info->category_status==0) echo 'checked'; ?> > 
							</div>
							<div class="form-group col-md-6">
                                <label for="exampleInputFile"> Menu Link</label>
                                <br> Active
                                <input name="menu_status" id="menu_status" value="1" type="radio" <?php if($cat_info->category_menu_active==1) echo 'checked'; ?>> Inactive
                                <input name="menu_status" id="menu_status" value="0" type="radio" <?php if($cat_info->category_menu_active==0) echo 'checked'; ?>> 
							</div>
								

							
                        </div>
						
					
					 <!--<div class="col-md-6">-->
      <!--                  <div class="form-group">-->
      <!--                          <label for="exampleInputEmail1">Category Descrption</label>-->
						<!--		 <textarea class="form-control" id="pageContent"  name="cate_desc"><?php echo $cat_info->category_desc; ?></textarea>-->
      <!--                  </div>-->
						<!--<?php //echo form_error("cate_desc"); ?>-->
            
					 <!--</div>-->


           <div class="col-md-12">
              <div class="form-group">
                  <label for="exampleInputEmail1">Category Artical</label>
                 <textarea class="form-control" id="editor1"  name="category_article"><?php echo $cat_info->category_article; ?></textarea>
                </div>
            <?php echo form_error("category_article"); ?>
           </div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Meta Tag Title</label>
							<input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title" value="<?php echo $cat_info->meta_title; ?>">
						</div>
						<?php echo form_error("meta_title"); ?>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Meta Tag Description</label>
							<textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description"><?php echo $cat_info->meta_desc; ?></textarea>
						</div>
						<?php echo form_error("meta_description"); ?>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="exampleInputEmail1">Meta Tag Keywords</label>
							<textarea class="form-control" id="meta_keyword" placeholder="Enter Meta Keywords" name="meta_keyword"><?php echo $cat_info->meta_keyword; ?></textarea>
						</div>
						<?php echo form_error("meta_keyword"); ?>
					</div>
					 <div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-info">Update</button>
						</div>
                    </div>
                    </form>
                  <!-- /.row (main row) -->
             </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>

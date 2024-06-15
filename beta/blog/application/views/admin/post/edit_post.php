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
       Edit Post
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Edit Post</li>
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
                 <form name="elementForm" id="leadAddForm" role="form" action="<?php echo base_url('Admin/updatepost');?>" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="post_id" value="<?php echo $post_info->post_id; ?>">
            <div class="col-md-12">
              
               <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Name</label>
                  <input type="text" class="form-control" id="post_title" placeholder="Enter Name" name="post_title" value="<?php echo $post_info->post_title; ?>">
                </div>
                <?php echo form_error( "post_title"); ?>
              </div> 
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post URL</label>
                  <input type="text" class="form-control" id="post_url" placeholder="Enter Name" name="post_url" value="<?php echo $post_info->post_url; ?>">
                </div>
                <?php echo form_error( "post_url"); ?>
              </div> 
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Date</label>
                  <input type="date" class="form-control" id="post_created" placeholder="Choose Image" name="post_created" value="<?php echo $post_info->post_created; ?>"> </div>
                <?php echo form_error("post_created"); ?>
              </div>
              
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Main Image</label>
                  <input type="file" class="form-control" id="post_image" placeholder="Choose Image" name="post_image" value="<?php echo set_value('post_image'); ?>"> </div>
                <?php echo form_error("post_image"); ?>
              </div>
              
              
              
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <select class="form-control select2" id="post_cat" name="post_cat[]" multiple style="height:200px" required>
                    <?php 
                    
                    
                    $productCatList = $this->Admin_Model->getPostCategorys($post_info->post_id);
                    print_r($productCatList);
                    if(count($productCatList)>0)
                    {
                      foreach($productCatList as $catItem)
                      {
                        $catBox[] = $catItem->cat_id;
                      }
                    }
                    else
                    {
                      $catBox = array();
                    }
                    
                    
                    $categoryList = $this->Admin_Model->bloggetActiveProductCategory();
                    if(count($categoryList)>0) {
                      foreach($categoryList as $category){
                        $subCategoryList = $this->Admin_Model->bloggetActiveProductCategory($category->category_id);
                    ?>
                    <option value="<?php echo $category->category_id; ?>" <?php  if(in_array($category->category_id,$catBox)) echo 'selected';    // if($post_info->product_cat_id==$category->category_id) echo 'selected';   ?> style="font-weight:normal;border-bottom:1px dotted #000;padding:5px" <?php if(count($subCategoryList)>0) // echo 'disabled'; ?> ><?php echo $category->category_name; ?></option> 
                    
                    <?php 
                    $subCategoryList = $this->Admin_Model->bloggetActiveProductCategory($category->category_id);
                    if(count($subCategoryList)>0) {
                      foreach($subCategoryList as $subCat){
                    ?>
                    <option  style="font-weight:normal;border-bottom:1px dotted #000;padding:5px" value="<?php echo $subCat->category_id; ?>" <?php if(in_array($subCat->category_id,$catBox)) echo 'selected'; // if($post_info->product_cat_id==$subCat->category_id) echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $subCat->category_name; ?></option>
                    <?php } } } } ?>
                   
                  </select> 
                </div>
                 
              </div>

              
              
            
              <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Descrption</label>
                    <textarea class="form-control" id="editor1"  name="post_description"><?php echo $post_info->post_description; ?></textarea>
                </div>
                <?php echo form_error("post_description"); ?>
              </div>
          


              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Small Description</label>
                  <input type="text" class="form-control" id="small_description" placeholder="Enter Small Description" name="small_description" value="<?php echo $post_info->small_description; ?>">
                </div>
                <?php echo form_error("small_description"); ?>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Meta Tag Title</label>
                  <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title" value="<?php echo $post_info->meta_title; ?>">
                </div>
                <?php echo form_error("meta_title"); ?>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Meta Tag Description</label>
                  <textarea class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description"><?php echo $post_info->meta_desc; ?></textarea>
                </div>
                <?php echo form_error("meta_description"); ?>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Meta Tag Keywords</label>
                  <textarea class="form-control" id="meta_keyword" placeholder="Enter Meta Keywords" name="meta_keyword"><?php echo $post_info->meta_keyword; ?></textarea>
                </div>
                <?php echo form_error("meta_keyword"); ?>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Post Tags</label>
                  <input type="text" class="form-control" id="post_tags" placeholder="Enter Post Tags" name="post_tags" value="<?php echo $post_info->post_tags; ?>">
                </div>
                <?php echo form_error("post_tags"); ?>
              </div>
               
              <div class="col-md-6">  
                <div class="form-group">
                  <button type="submit" class="btn btn-info">Update</button>
                </div>
                            </div>
              
                        </div>
            
          
          
                    </form>
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
// <script>
//     CKEDITOR.replace('editor1', {
//       extraPlugins: 'uploadimage,image2',
//       height: 300,

//       // Upload images to a CKFinder connector (note that the response type is set to JSON).
//       uploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

//       // Configure your file manager integration. This example uses CKFinder 3 for PHP.
//       filebrowserBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html',
//       filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
//       filebrowserUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files',
//       filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images',

//       // The following options are not necessary and are used here for presentation purposes only.
//       // They configure the Styles drop-down list and widgets to use classes.

//       stylesSet: [{
//           name: 'Narrow image',
//           type: 'widget',
//           widget: 'image',
//           attributes: {
//             'class': 'image-narrow'
//           }
//         },
//         {
//           name: 'Wide image',
//           type: 'widget',
//           widget: 'image',
//           attributes: {
//             'class': 'image-wide'
//           }
//         }
//       ],

//       // Load the default contents.css file plus customizations for this sample.
//       contentsCss: [
//         'http://cdn.ckeditor.com/4.16.0/full-all/contents.css',
//         'https://ckeditor.com/docs/ckeditor4/4.16.0/examples/assets/css/widgetstyles.css'
//       ],

//       // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
//       // resizer (because image size is controlled by widget styles or the image takes maximum
//       // 100% of the editor width).
//       image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
//       image2_disableResizer: true
//     });
//   </script>
<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    $('.textarea').wysihtml5()
  })
</script>
<?php $this->load->view('admin/components/footer.php'); ?>
<?php $this->load->view('admin/components/footer_js.php'); ?>
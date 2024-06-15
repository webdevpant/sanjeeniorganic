
<?php $this->load->view('site/components/header'); ?>
<div class="general-single-page-layout single-page-layout-one">
  <div class="breadcrumb-wrapper">
   
    
      <ul class="breadcrumb-listing">
        <li><a href="https://www.sanjeevaniagrofoods.com/beta/blog/">Home</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="#"><?php echo $cat_info->category_name; ?></a></li>
      </ul>
      <div class="mask"></div>
    <!-- // breadcrumb -->
  </div>
 </div>
 <div class="single-wrapper main-post-area-wrapper">
  <div class="single-inner">
    <div class="container">
      <div class="search-page">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="main-post-area-holder">
              
                
                                   
<div class="post-search-panel" style="display: none;">
  <input type="text" id="keywords" placeholder="Type keywords to filter posts" onkeyup="searchFilter();"/>
  <input type="hidden" id="urls" value="<?php echo $this->uri->segment(2)?>" />
  <select id="sortBy" onchange="searchFilter();">
    <option value="">Sort by Title</option>
    <option value="asc">Ascending</option>
    <option value="desc">Descending</option>
  </select>
</div>

<div class="post-list" id="dataList">
  <!-- Display posts list -->
  <?php 
  // ;
  if(!empty($blog_list)){ foreach($blog_list as $blog){ ?>
    <article class="post-details-holder layout-two-post-details-holder wow  fadeInUp">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="post-image post-image-fix-siz">
                      <?php if(!empty($blog['post_img'])){ ?>
                        <img src="<?php echo base_url(); ?>uploads/post/<?php echo $blog['post_img']; ?>" alt="<?php echo $blog['post_title']; ?>"> 
                      <?php }else{ ?>
                        <img src="<?php echo base_url(); ?>assets/img/no.jpg" alt="<?php echo $blog['post_title']; ?>"> 
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    
                    <div class="post-title">
                      <h2><a href="<?php echo base_url(); ?><?php echo $blog['post_url']; ?>" target="_blank"><?php echo $blog['post_title']; ?><?php //echo $blog->small_description; ?></a></h2>
                    </div>
                    <div class="post-meta-posted-date">
                      <p><?php echo character_limiter($blog['small_description'], 100); ?></p>
                      
                      <?php $catDats=$this->Site_Model->getReletedCat($blog['post_id']);?>
                      <?php foreach($catDats as $acat){ ?>
                        <a class="cat-list" href="<?php echo base_url(); ?>blog-category/<?php echo $acat->category_url; ?>"><?php echo $acat->category_name; ?></a>
                      <?php  } ?>
                    </div>
                    <div class="post-meta-posted-date">
                      <p><a href="<?php echo base_url(); ?><?php echo $blog['post_url']; ?>" target="_blank"><?php echo date('d M Y', strtotime($blog['post_created'])); ?></a></p>
                    </div>
                     <div class="post-meta-posted-date">
                    <a href="<?php echo base_url(); ?><?php echo $blog['post_url']; ?>" class="custom-button ">Read More...</a>
                        </div>
                    <!--<div class="post-share">-->
                    <!--  <div class="share"></div>-->
                    <!--</div>-->
                  </div>
                  <!-- // col -->
                </div>
                <!-- row -->
              </article>
  <?php } }else{ ?>
    <p>Post(s) not found...</p>
  <?php } ?>
  
  <!-- Render pagination links -->
  <?php echo $this->ajax_pagination->create_links(); ?>
</div>
              <!-- // end of article -->
            </div>
            <!-- // main-post-area-holder -->
          </div>
          <!-- // col -->
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <?php $this->load->view('site/components/sidebar'); ?>
            <!-- // sidebar -->
          </div>
          <!-- // col 4 -->
        </div>
        <!-- // row that divides left and right sidebar -->
      </div>
      <!-- // search-page -->
    </div>
    <!-- // container -->
  </div>
  <!-- // single_inner -->
</div>

<?php $this->load->view('site/components/footer'); ?>
<script>
function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    var url = $('#urls').val();
    
   
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Website/ajaxPaginationDatacat/'); ?>'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&url='+url+'&sortBy='+sortBy,
        beforeSend: function(){
            $('.loading').show();
        },
        success: function(html){
            $('#dataList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>

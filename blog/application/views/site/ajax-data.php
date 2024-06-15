<!-- Display posts list -->
<?php if(!empty($blog_list)){ foreach($blog_list as $blog){ ?>
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
	<h3 style="text-align: center;">Post(s) Not Found...</h3>
<?php } ?>

<!-- Render pagination links -->
<?php echo $this->ajax_pagination->create_links(); ?>
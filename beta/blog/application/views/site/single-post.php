<?php $this->load->view('site/components/header'); ?>
<style>
    .post-the-content a {
    color: #026dc1;
}
.sub-comment-second {
     border:none;
}
</style>
<div class="general-single-page-layout single-page-layout-one">
  <div class="breadcrumb-wrapper">
      <?php $catDats=$this->Site_Model->getReletedCat($postdata->post_id);?>
      <ul class="breadcrumb-listing">
        <li><a href="https://www.sanjeevaniagrofoods.com/blog/">Blog</a></li>
        <li><a href="<?php echo base_url(); ?>blog-category/<?php echo $catDats[0]->category_url; ?>"><?php echo $catDats[0]->category_name; ?></a></li>
        <li><a href="#"><?php echo $postdata->post_title; ?></a></li>
      </ul>
      <div class="mask"></div>
    <!-- // breadcrumb -->
  </div>
  <!-- // breadcrumb-wrapper -->
  <div class="single-page-wrapper">
    <div class="single-page-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="main-post-area-holder">
               
              <article class="single-page-details-holder wow fadeInUp">
                  <div class="post-title" style="padding: 17px 0px;">
                    <h1><?php echo $postdata->post_title; ?></h1>
                  </div>
                <div class="post-image"> 
     
                     <?php if(!empty($postdata->post_img)){ ?>
                        <img src="<?php echo base_url(); ?>uploads/post/<?php echo $postdata->post_img; ?>" alt="<?php echo $postdata->post_title; ?>"> 
                      <?php }else{ ?>
                        <img src="<?php echo base_url(); ?>assets/img/no.jpg" alt="<?php echo $postdata->post_title; ?>"> 
                      <?php } ?>
                </div>
                <div class="single-page-other-information-holder">
                 
                  
                  <!-- // post-title -->
                  <div class="post-extra-meta">
                    <div class="row">
                      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
                      <!--  <div class="post-author"><span><a href="#">StarEdu</a></span> </div>-->
                      <!--</div>-->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <?php $catDats=$this->Site_Model->getReletedCat($postdata->post_id);?>
                      <?php foreach($catDats as $acat){ ?>
                        <a class="cat-list" href="<?php echo base_url(); ?>blog-category/<?php echo $acat->category_url; ?>"><?php echo $acat->category_name; ?></a>
                      <?php  } ?>
                    
                      <span><a href="#"><?php echo date('d M Y', strtotime($postdata->post_created)); ?></a></span> 
                        </div>
                      <!-- // col -->
                    </div>
                    <div class="row">
                      
                      <!-- // col -->
                      
                      <!-- // col -->
                    </div>
                     
                    <!-- // row -->
                  </div>
                  <!-- // post-extra-meta -->
                  <div class="post-the-content">
                     <?php echo $postdata->post_description; ?>
                  </div>
                  <!-- // post-the-content  -->
                 <div class="post-share">
                   <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 share-container text-center">
                    <!-- Twitter -->
                       
                        <?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>
                        <a class="share_button" href="https://twitter.com/share?url=<?php echo $actual_link; ?>" target="_blank">
                        <img src="<?php echo base_url(); ?>assets/button/twitter.png" alt="Twitter" style="height: 40px !important; width: 40px !important;">
                        </a>
                        
                       
                        <!-- Facebook -->
                        <a class="share_button" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link; ?>" target="_blank">
                        <img src="<?php echo base_url(); ?>assets/button/facebook.png" alt="Facebook" style="height: 40px !important; width: 40px !important;">
                        </a>
                        
                        <!-- LinkedIn -->
                        <a class="share_button" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $actual_link; ?>" target="_blank">
                        <img src="<?php echo base_url(); ?>assets/button/linkedin.png" alt="LinkedIn" style="height: 40px !important; width: 40px !important;">
                        </a>
                        </div>
                  </div>
                  <!--<div class="tags-meta-and-others clearfix">-->
                  <!--  <div class="post-tags"> <span><a href="#">lifestyle</a></span> <span><a href="#">Trending</a></span> </div>-->
                  <!--  <div class="view-count"> <span class="display-view-count"><i class="fa fa-eye" aria-hidden="true"></i> 568 Views</span> </div>-->
                  <!--</div>-->
                </div>
                <!-- // single-page-information-holder -->
              </article>
              
              
              
            <div class="comment-area-wrapper faq">
            
                                       <?php 
$faqdata=$this->Site_Model->getTestFaqForView($this->uri->segment(2)); 
//print_r($faqdata); die;
?>
 <?php if (!empty($faqdata)) { ?>
    <div class="post-title">
                    <h2>Frequently Asked Question</h2>
                  </div>
<div class="clearfix"></div>
<div class="extra-detail bg-white mt-3">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php  foreach ($faqdata as $key => $faq) { ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree_<?php echo $faq->post_faq_id; ?>">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree_<?php echo $faq->post_faq_id; ?>" aria-expanded="false" aria-controls="collapseThree_<?php echo $faq->post_faq_id; ?>">
         
      <h4 class="panel-title"><?php echo $faq->faq_q; ?></h4>
       </a>
    </div>
    <div id="collapseThree_<?php echo $faq->post_faq_id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_<?php echo $faq->post_faq_id; ?>">
      <div class="panel-body">
         <?php echo $faq->faq_a; ?>
      </div>
    </div>
  </div>
 
<?php } ?>

</div>
</div>
<?php } ?>
                    </div>


              <!-- // related-posts-wrapper -->
              <div class="comment-area-wrapper">
                <div class="comment-area-inner">
                  <div class="comments">
                    <div class="comments__list">
                      <div class="comment-listing-tile">
                        <h4>Comments List</h4>
                      </div>
                       <?php 
                            $maincommentlist = $this->Site_Model->getmaincomment($postdata->post_id);
                              // print_r($maincommentlist);
                              foreach($maincommentlist as $comment_m){
                                          
                              ?>
                                


                      <article class="review-box clearfix">
                    
                        <div class="rev-content">
                          <div class="rev-info"><strong><?php echo strtoupper($comment_m->user_name);?> : <?php echo $comment_m->create_at; ?> </strong></div>
                          <div class="rev-text">
                            <p style="text-align: justify;"><?php echo $comment_m->comment_text; ?></p>
                          </div>
                          <div class="rev-reply">
                               <a href="javascript:void(0);"  onClick="reply_click<?= $comment_m->id;?>(<?= $postdata->post_id;?>,<?= $comment_m->id;?>)" class="comment-reply-link reply_comt" id="comment_reply" data-comt_id="<?= $comment_m->id;?>" data-post_id="<?= $postdata->post_id;?>"><span><i class="fa fa-reply" aria-hidden="true"></i> Reply</span></a>

                        </div>
                        </div>
                     <script type="text/javascript">
  function reply_click<?= $comment_m->id;?>(post,comt)
  {
      $('#Modal_Edit').modal('show');
      $('[name="post_id_r"]').val(post);
      $('[name="comt_id_r"]').val(comt);
      
  }
</script> </article>



                                    <?php 
                                    $parent_comm = $this->Site_Model->getparentcomm($comment_m->id);
                                   // print_r($parent_comm);
                  foreach($parent_comm as $comment_parent){ ?>
                   <!--article class="review-box sub-comment-first clearfix" style="border:1px solid #000;"-->
                       
                      <article class="review-box  sub-comment-second clearfix box-2">
                        <figure class="rev-thumb"><img src="assets/dist/img/profiles/6.jpg" alt=""></figure>
                        <div class="rev-content">
                          <div class="rev-info"><strong><?php echo strtoupper($comment_parent->user_name);?> : <?php echo $comment_parent->create_at; ?> </strong></div>
                          <div class="rev-text">
                            <p style="text-align: justify;"><?php echo $comment_parent->comment_text; ?></p>
                          </div>
                          <!--<div class="rev-reply"> <a href="javascript:void(0);" class="comment-reply-link reply_comt" id="comment_reply" onClick="reply_click(<?= $postdata->post_id;?>,<?= $comment_m->id;?>)"><span><i class="fa fa-reply" aria-hidden="true"></i> Reply</span></a> </div>-->
                        </div>
                      </article>




                                           <?php
                                       }
                                    
                                    ?>
                                    
                                       <?php } ?>
                    </div>
                    
                    
                    
                   
                    <!-- // comments__list -->
                    <div class="comment-box form-box">
                      <div class="comment-box-tile">
                        <h4>Leave a Comment</h4>
                      </div>
                      <form class="comments__form" id="add_comt" style="width:100%" method="post">
                                        <div class="textaler" style="color: #4caf50; text-align: center;"></div>
                                        <div id="comment_error" style="text-align: center; color: #fb0b0b;"></div>
                                        
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <label class="review">Your Review :</label>
                                            
                                            <input type="hidden" name="post_id" id="post_id" value="<?= $postdata->post_id;?>">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <input type="text" name="user_email" id="user_name" class="comments__form-input" placeholder="Enter Your Name"></div>
                                            <div class="col-md-6">
                                            <input type="text" name="user_email" id="user_email" class="comments__form-input" placeholder="Enter Email ID"></div>
                                            <div class="col-md-12">
                                            <textarea class="comments__form-input" placeholder="Write a Comment" name="comment" id="comment"></textarea></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                          
            <input type="submit" name="submit" id="btn_save"  class="custom-submit-1" value="Post Comment">     
                                        </div>
                                    </div>
                                    </form>
                    </div>
                    <!-- // comment-box -->
                  </div>
                </div>
                <!-- // comment-area-inner -->
              </div>
              
              
             
    <?php $relatedPost=$this->Site_Model->getRelatedCagegoryPost($postdata->post_id);
    
      //  print_r($relatedPost); 
    ?>
    <?php if(!empty($relatedPost)){ ?>
    
     <div class="post-title">
                    <h2> Related Posts</h2>
                  </div>
    
    
            <div class="related-posts-wrapper">
                <div class="related-posts-inner">
                  <div class="related-post-carousel owl-carousel">
                   <?php foreach($relatedPost as $posts){ ?>
                    <div class="grid-item item">
                      <article class="post-details-holder layout-three-post-details-holder wow fadeInUp">
                        <div class="post-image"> 
                              <?php if(!empty($posts->post_img)){ ?>
                                <img src="<?php echo base_url(); ?>uploads/post/<?php echo $posts->post_img; ?>" alt="<?php echo $posts->post_title; ?>"> 
                              <?php }else{ ?>
                                <img src="<?php echo base_url(); ?>assets/img/no.jpg" alt="<?php echo $posts->post_title; ?>"> 
                              <?php } ?>
                        </div>
                        <!-- // post image -->
                        <div class="post-extra-details">
                          <div class="post-title sider-content">
                            <h2><a href="<?php echo base_url(); ?><?php echo $posts->post_url; ?>"><?php echo $posts->post_title; ?></a></h2>
                          </div>
                        </div>
                        <!-- // post extra details -->
                      </article>
                      <!-- // article -->
                    </div>
                    <?php } ?>
                    <!-- // grid-item -->
                
                    <!-- // grid-item -->
                  </div>
                  <!-- // related-post-carousel -->
                </div>
                <!-- // related-posts-inner -->
              </div>
              <?php } ?>
              
              
              <!-- // comment-area-wrapper -->
            </div>
            <!-- // main-post-area-holder-->
          </div>

          <!-- // col -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <?php $this->load->view('site/components/sidebar'); ?>
            <!-- // sidebar -->
          </div>
          <!-- // col -->
        </div>
        <!-- // row that divides left and right side-->
      </div>
      <!-- // container -->
    </div>
    <!-- // single-page-inner -->
  </div>
  <!-- // single-page-wrapper -->
</div>
<!-- // general-single-page-layout single-page-layout-one -->

<?php $this->load->view('site/components/footer'); ?>
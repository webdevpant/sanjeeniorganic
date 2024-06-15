<aside class="sidebar">
              <div class="sidebar-inner">
                
                <div class="widget widget-category wow fadeInUp">
                  <div class="widget-content">
                    <div class="widget-title">
                      <h2>Search</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                    <form method="get" action="<?php echo base_url('blogsearch.html/search') ?>">
                        <input type="text" name="q" class="form-controls side">
                        <input type="submit" name="submit" class="submit-button" value="Search" >
                    </form>
                    </div>
                    <!-- // widget-extra-info-holder -->
                  </div>
                  <!-- // widget-content -->
                </div>
                
                <!-- // widget widget-newsletter -->
                <div class="widget widget-popular-post wow fadeInUp">
                  <div class="widget-content">
                    <div class="widget-title">
                      <h2>Popular Posts</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                      
                      

                      <?php $getrecentpost=$this->Site_Model->getrecentpost(); ?> 
                       <?php foreach($getrecentpost as $posts){ ?>
                        

                        <div class="widget-posts">
                        <div class="post-thumb"> 
                     
                      <?php if(!empty($posts->post_img)){ ?>
                         <a href="<?php echo base_url(); ?><?php echo $posts->post_url; ?>"><img src="<?php echo base_url(); ?>uploads/post/<?php echo $posts->post_img; ?>" alt="<?php echo $posts->post_title; ?>"> </a>
                      <?php }else{ ?>
                        <a href="<?php echo base_url(); ?><?php echo $posts->post_url; ?>"><img src="<?php echo base_url(); ?>assets/img/no.jpg" alt="<?php echo $posts->post_title; ?>">  </a>
                      <?php } ?>
                        </div>
                        <div class="post-title">
                          <a style="color: #000;" href="<?php echo base_url(); ?><?php echo $posts->post_url; ?>"><?php echo $posts->post_title; ?></a>
                        </div>
                      </div>
                        <?php } ?>
                    </div>
                    <!-- // widget-extra-info-holder -->
                  </div>
                  <!-- // widget-content -->
                </div>
                 <!-- // widget widget-category -->
                <div class="widget widget-category wow fadeInUp">
                  <div class="widget-content">
                    <div class="widget-title">
                      <h2>Category</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                      <ul class="widget-category-listings">
                    <?php
                         $getCat=$this->Site_Model->getCatListForSiteallcat();
                            foreach ($getCat as $key => $Catvalue) {
                                $cateCount=$this->Site_Model->getRelatedCagegoryPostCount($Catvalue->category_id);
                            ?>
                            
                                <li>
                                      <a href="<?php echo base_url();?>blog-category/<?php echo $Catvalue->category_url; ?>"><?php echo $Catvalue->category_name; ?> (<?php echo $cateCount; ?>)</a>
                                </li>
                            <?php } ?>
                      </ul>
                    </div>
                    <!-- // widget-extra-info-holder -->
                  </div>
                  <!-- // widget-content -->
                </div>
                <!-- // widget -->
                <div class="widget widget-facebook-page-box wow fadeInUp">
                  <div class="widget-content">
                    <div class="widget-title">
                      <h2>Quick Enquiry</h2>
                    </div>
                    <div class="widget-extra-info-holder">
                        <p style="color: red;"><?php $ms=@$this->session->userdata('message');$this->session->unset_userdata('message'); ?></p>
                        <?php if(isset($ms))
                            {
                             ?>
                                <script>
                                   alert('<?php  echo $ms ?>');
                                </script>
                            <?php 
                            }
                            ?>
                         
                      <form method="post" action="<?php echo base_url('Website/contact_Submit');?>">
      	            <div class="row">
      		
					<div class="col-lg-12 col-md-12 text-center">
                                       
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                             <input type="text" name="name" class="form-control brainy-validated" data-required="true" data-error-message="Please enter your name" placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                             <input type="email" name="email" class="form-control brainy-validated" data-required="true" data-error-message="Please enter your email" placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                             <input type="number" name="phone" data-required="true" data-error-message="Please enter your number" class="form-control brainy-validated" placeholder="Phone" required="">
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12 col-md-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--         <input type="tel" name="subject" data-required="true" data-error-message="Please Subject" class="form-control brainy-validated" placeholder="Subject" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                             <textarea name="message" class="form-control brainy-validated" cols="30" rows="5" data-required="true" data-error-message="Write your message" placeholder="Your Message" required=""></textarea>
                                        </div>
                                    </div>
                                                
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" name="submit" class="custom-submit-2">Send Message</button>
                                    </div>
                                   
         </div>
     </form>
                    </div>
                    <!-- // widget-extra-info-holder -->
                  </div>
                  <!-- // widget-content -->
                </div>
               
            
                <!-- // widget widget-newsletter -->
              </div>
              <!-- // sidebar-inner -->
            </aside>
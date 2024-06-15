
<div id="instafeed" class="instafeed owl-carousel feed-carousel"> </div>
<footer class="general-footer">
  <div class="footer-mask"></div>
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 footer-block">
          <div class="">
            <div class="footer-widget-content about-widget">
              <div class="widget-title">
                <h2>Exploree</h2>
              </div>
              <div class="widget-content">
                   <ul class="widget-category-listings">
                    <li><a href="https://www.sanjeevaniagrofoods.com/index.php">Sanjeevani Agrofoods</a></li>
                    <li><a href="https://www.sanjeevaniagrofoods.com/our-strength-our-team.php">About-Us</a></li>
                    <li><a href="https://www.sanjeevaniagrofoods.com/">Mission and Vision</a></li>
                    <li><a href="https://www.sanjeevaniagrofoods.com/our-strength-our-team.php"> Our Team</a></li>
                    <li><a href="https://www.sanjeevaniagrofoods.com/career.php"> Career</a></li>
                    <li><a href="https://www.sanjeevaniagrofoods.com/contact-us.php"> Contact-Us</a></li>
                        
                        
                  </ul>
              </div>
              <!-- // widget-content -->
            </div>
            <!-- // footer-widget-content -->
          </div>
          <!-- // footer block -->
        </div>
        <!-- // col -->
              <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 footer-block">
          <div class="">
            <div class="footer-widget-content">
              <div class="widget-title">
                <h2>Services</h2>
              </div>
              <div class="widget-content">
                <ul class="widget-category-listings">
									<li><a href="#">ORGANIC DAIRY FARMING</a></li>
                                    <li><a href="#">ORGANIC GRAINS</a></li>
                                    <li><a href="#">ORGANIC PULSES</a></li>
                                    <li><a href="#">ORGANIC EDIBLE OILS</a></li>
                                    <li><a href="#">ORGANIC SPICES</a></li>
                                    <li><a href="#">ORGANIC FROZEN VEGETABLES</a></li>
									</ul>
              </div>
              <!-- // widget-content -->
            </div>
            <!-- // footer-widget-content -->
          </div>
          <!-- // footer block -->
        </div>
        <!-- // col -->
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 footer-block">
          <div class="">
            <div class="footer-widget-content">
              <div class="widget-title">
                  <h2>Contact</h2>
              </div>
              <div class="widget-content">
                <div class="widget-posts">
                  <div class="post-title">
                    <h3><a href="#"> <span><i class="fa fa-phone"> </i> </span> General Enquiry : +91-135-4150929</a></h2>
                    <h3><a href="#"> <span><i class="fa fa-phone"> </i> </span> Order Related : +91-87910-79305</a></h3>
                    <h3><i class="fa fa-envelope"><a href=""><span> info@sanjeevaniagrofoods.com </span></a></i></h5>
                    <h3><i class="fa fa-envelope"><a href=""><span> sales@sanjeevaniagrofoods.com </span></a></i></h5>

                    
                  </div>
                </div>
                
                <!-- // widget-post -->
              <br>
              
            </div>
            <!-- // footer-widget-content -->
          </div>
          <!-- // footer block -->
        </div>
        <!-- // col -->
      </div>
      <!-- // row -->
          </div>
            </div>
  <!-- // footer inner -->
</footer>

      <div class="copyright">
        <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="copyrights">
              <p>© 2024 Copyright Sanjeevani AgroFoods All Rights Reserved | Developed by <a href="#" target="_blank"> Sanjeevani Agrofoods</a> </p>
            </div>
            <!-- // copyrights -->
          </div>
        </div>
      </div>
        <!-- // row -->
      </div>
      <!-- // copyright-and-nav-row -->

    <!-- // container -->

<script src="<?php echo base_url(); ?>assets/js/bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>




<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comment Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form autocomplete="off">
                        
                         <div class="responskjm" style="color: #4caf50; text-align: center;"></div>
                        <p class="comment-notes">
                                            <span id="email-notes">Your privacy will not be published.</span>
                                            Required fields are marked 
                                            <span class="required">*</span>
                                        </p>

                     
  <div class="single-form">
    <input type="hidden" name="comt_id_r" id="comt_id_r" value="" >
    <input type="hidden" name="post_id_r" id="post_id_r" value="" >
    <input type="text" name="user_namea" id="user_namea"  placeholder="Enter Your Name" class="comment-form">
    <input type="text" name="user_emaila" id="user_emaila"  placeholder="Enter Email ID" class="comment-form">
   <textarea name="comment_r" class="reply_comt_textarea" autocomplete="off" id="comment_r" cols="45" placeholder="Your Comment...*" rows="3" ></textarea>
    <span id="comment_r_error" class="text-danger error_size"></span>
  </div>
  <div class="single-form">
    <input type="button" name="submit" id="comment_reply_button" class="comment-submit" value="Reply Comment">
  </div>
 
</form>
                  </div>
                 
                </div>
              </div>
            </div>
<style>
span#comment_error> div {
    margin-top: -20px !important;
    font-weight: bold;
    letter-spacing: .8px;
}
</style>
<script>
     $('#btn_save').on('click',function(){
      //alert('Hello');
            var comment = $('#comment').val();
            var post_id =$('#post_id').val();
            var user_email = $('#user_email').val();
             var user_name = $('#user_name').val();
            
            //  alert(user_name);die();
            $.ajax({
                type : "POST",
                // url  : "<?php echo base_url('add_comment')?>",
                url  : "<?php echo base_url('Website/commentsave')?>",
                dataType : "JSON",
                data : {comment:comment , post_id:post_id , user_email:user_email , user_name:user_name },
                success: function(data){
                //   alert(data.response);die();
            $(".textaler").html(data.response);
                  if(data.error){
                      //alert(data.comment_error);
                     if(data.comment_error != '')
                         {
                          $('#comment_error').html(data.comment_error);
                         }
                         else
                         {
                          $('#comment_error').html('');
                         }
                          if(data.post_id_error != '')
                         {
                          $('#post_id_error').html(data.post_id_error);
                         }
                         else
                         {
                          $('#post_id_error').html('');
                         }

                  }
                  else{
                    $('[name="comment"]').val("");
                  }
                    
                    if (data.success){
                       $("#add_comt").load(location.href + " #add_comt");
                        }
                }
            });
            return false;
   });
   
   // reply comment modal
        $('#comment_reply').on('click','.reply_comt',function(){
            var post_id = $(this).data('post_id');
            var comt_id = $(this).data('comt_id');
            

            $('#Modal_Edit').modal('show');
            $('[name="post_id_r"]').val(post_id);
            $('[name="comt_id_r"]').val(comt_id);
        });
 //reply comment
         $('#comment_reply_button').on('click',function(){
             //alert('Hello')
            var comment_r = $('#comment_r').val();
            var post_id_r =$('#post_id_r').val();
            var comt_id_r =$('#comt_id_r').val();
            
            
            var user_emaila = $('#user_emaila').val();
             var user_namea = $('#user_namea').val();
             //alert(user_emaila);
             
            $.ajax({
                type : "POST",
                // url  : "<?php echo base_url('reply_comment')?>",
                    url  : "<?php echo base_url('Website/replycommentsave')?>",
                dataType : "JSON",
                data : {comment_r:comment_r, post_id_r:post_id_r, comt_id_r:comt_id_r, user_emaila:user_emaila, user_namea:user_namea},
                success: function(data){
                    
                    if (data.response) {
                        alert(data.response);
                        $('#Modal_Edit').modal('hide');
                        $("#responskjm").html(data.response);
                    }
                    
                    
                  if(data.error){

                     if(data.comment_r_error != '')
                         {
                          $('#comment_r_error').html(data.comment_r_error);
                         }
                         else
                         {
                          $('#comment_r_error').html('');
                         }

                          if(data.post_id_error != '')
                         {
                          $('#post_id_error').html(data.post_id_error);
                         }
                         else
                         {
                          $('#post_id_error').html('');
                         }
                  }
                  else{
                    $('[name="comment_r"]').val("");

                  }
                    
                    
                }
            });
            return false;
        });
</script>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCGLVJHR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>






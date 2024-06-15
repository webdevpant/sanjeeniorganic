<!DOCTYPE html>
<?php include('header.php'); ?>
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
   <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
   <title>"Payment > Sanjeevani Organics Barsana Magic"</title>
   <meta name="description" content="description" content="All faq's related to online payment issues like online ghee payment, milk, honey and dairy products" />
   <meta name="keywords" content="faq, customer support, online order, contact us">
   <meta property="og:locale" content="en_US" />
   <meta property="og:type" content="article" />
   <meta property="og:url" content="https://www.sanjeevaniagrofoods.com" />
   <meta property="og:site_name" content="Sanjeevani Agrofoods" />
   <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61556094441349" />
   <meta property="og:image" content="https://www.sanjeevaniagrofoods.com/beta/blog/uploads/post/sanjeevani-agrofoods.webp" />
   <meta property="og:image:height" content="1662" />
   <meta property="og:image:type" content="images/logo.webp" />
   <meta name="twitter:card" content="summary_large_image" />
   <meta name="twitter:site" content="@SAgrofoods" />
   <meta name="twitter:label1" content="Est. reading time" />
   <meta name="twitter:data1" content="9 minutes" />
   <script src="assets/js/jquery.min.js"></script>
</head>
<body>
   <div class="clearfix"></div>
   <div class="rv-breadcrumb pt-120 pb-120">
      <div class="container">
         <h1 class="rv-breadcrumb__title">Online Payment FAQ's</h1>
         <ul class="rv-breadcrumb__nav d-flex justify-content-center">
            <li><a href="index.php"><i class="fa-solid fa-sharp fa-home"></i> Home</a></li>
            <li class="current-page"><span class="dvdr"> &#47;</span><span>FAQ's</span></li>
         </ul>
      </div>
   </div>
   <section class="bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="carrer">
               <div class="first-career">
                  <h3>Payment related FAQ's</h3>
                  <div class="accordion">
                     <div class="accordion-section">
                        <a class="accordion-section-title" href="#accordion-1"> What are the modes of online payment that you offer?</a>
                        <div id="accordion-1" class="accordion-section-content">
                           <p>Our Payment Gateway is Razor Pay they offer UPI, Net Banking, Credit / Debit Card, Paytm, Jio, and various wallets, etc.</p>
                                    </div>
                                 </div>
                              </div>
                        <div class="accordion">
                           <div class="accordion-section">
                              <a class="accordion-section-title" href="#accordion-2"> I was paying online, but the screen hung. I received a message from my bank saying the money has been deducted but I haven't received any transaction ID.</a>
                              <div id="accordion-2" class="accordion-section-content">
                                 <p>Please contact your bank, our customer care or the Razor pay helpdesk for any further information. You could also email info@sanjeevaniagrofoods.com for any assistance. If the order hasn't been placed, money will get credited back into your account.</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion">
                                 <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-3"> Do you have a  Wallet?</a>
                                    <div id="accordion-3" class="accordion-section-content">
                                       <p>Yes, we do have a My Wallet. You can recharge the wallet. You can use any existing points against your purchases.</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion">
                                 <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-4"> Do you offer discounts on bulk purchases?</a>
                                    <div id="accordion-4" class="accordion-section-content">
                                       <p>Yes, we do. Please contact our Customer Care at info@sanjeevaniagrofoods.com or 135-4150929 for more information.</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion">
                                 <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-5"> Do you store my payment info?</a>
                                    <div id="accordion-5" class="accordion-section-content">
                                       <p>We do not store your bank/card details. Only transaction-related information like Transaction ID and Order ID, is stored.</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion">
                                 <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-6"> I want to pay for some of the items now, but some after delivery. Is that possible?</a>
                                    <div id="accordion-6" class="accordion-section-content">
                                       <p>Unfortunately, that is not possible.</p>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </section>
            <script>
                        //** Add this Script to the Custom Head section in the Additional Footer HTML **//
                        $(document).ready(function() {
                        
                            function close_accordion_section() {
                                $('.accordion .accordion-section-title').removeClass('active');
                                $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
                            }
                            $('.accordion-section-title').click(function(e) {
                                // Grab current anchor value
                                var currentAttrValue = $(this).attr('href');
                        
                                if($(e.target).is('.active')) {
                                    close_accordion_section();
                                } 
                                else {
                                    close_accordion_section();
                                    // Add active class to section title
                                    $(this).addClass('active');
                                    // Open up the hidden content panel
                                    $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
                                }
                                e.preventDefault();
                            });
                        });
                     </script>
</body>
</html>
<?php include('footer.php'); ?>
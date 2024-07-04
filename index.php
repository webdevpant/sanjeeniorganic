
<?php session_start()?>
<?php
$op = array(
    'prefix' => 'package',
    'cacheOption' => array(
        'cacheDir' => '/temp',
        'lifetime' => 3600
    )
);
// header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
// header("Pragma: no-cache"); // HTTP 1.0.
// header("Expires: 3600"); // Proxies.
?>
<?php include ('header.php'); ?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>Welcome to Sanjeevani Organics Agrofoods Farming Agriculture</title>

    <meta name="title" content="Sanjeevani Organics is  Uttarakhand based company dealing Organic Food">
    <meta name="description"
        content="Sanjeevani Organics is an Uttarakhand based organization dealing with Organic Food Products and producing organic products for last 10 years in India.">
    <meta name="keywords" content="organic food  , sanjeevani ,organic products">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="Sanjeevani Organics">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.sanjeevaniagrofoods.com" />
    <meta property="og:site_name" content="Sanjeevani Agrofoods" />
    <meta property="article:publisher" content="https://www.facebook.com/profile.php?id=61556094441349" />
    <meta property="og:image"
        content="https://www.sanjeevaniagrofoods.com/beta/blog/uploads/post/sanjeevani-agrofoods.webp" />
    <meta property="og:image:height" content="1662" />
    <meta property="og:image:type" content="images/logo.webp" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@SAgrofoods" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="9 minutes" />


      <!-- Cache-Control -->
      <meta http-equiv='Expires' content='0'>
    <meta http-equiv='Pragma' content='no-cache'>
    <meta http-equiv='Cache-Control' content='no-cache'>
    <meta http-equiv='imagetoolbar' content='no'>
    <meta http-equiv='x-dns-prefetch-control' content='on'>
    <!-- Cache-Control -->
</head>

<body>

    <!---------------------------------------------------------------------------------------
                                        SLIDER SECTION MAIN START
    --------------------------------------------------------------------------------------->

    <div class="indexSliderMain owl-carousel owl-theme" id="indexSlider">

        <div class="sliderItem">
            <div class="banner_content">
                <h1>SANJEEVANI ORGANICS</h1>
                <h2>"Growing with Purpose on a sustainable Journey"</h2>
                <h3><b>Sanjeevani Agrofoods Limited</b> is a leading Brand in
                    Organic Farming. We are Largest producers and exporters of Certified Organic Food –
                    Pulses, Cereals, Dairy Products, Indian Spices, Honey, Tea, Frozen Vegetables and
                    Many More.</h3>
            </div>

            <div class="sliderImage">
                <img src="assets/img/slider-1.webp" alt="organic food"
                    class="sliderResponvive" loading="lazy">
            </div>
        </div>




        <div class="sliderItem">
            <div class="sliderImage">
                <img src="assets/img/slider-2.webp"
                    alt="sanjeevani organic" class="sliderResponvive imgSecond" loading="lazy">
            </div>
        </div>


        <div class="sliderItem">
            <div class="sliderImage">
                <img src="assets/img/slider-3.webp" alt="barsana milk"
                    class="sliderResponvive thrImage">
            </div>
            <div class="buyNowbtn">
                <a href="https://www.barsanamagic.com/" class="btn btn-success btn-lg" target="_blank"> Buy Now</a>
            </div>
        </div>
    </div>

    <!-- <section class="rv-20-banner_section swiper">
        <div class="swiper-wrapper">
            <div class="rv-20-banner_slide swiper-slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="mobileSlider">
                            <div class="rv-20-banner_content">
                                <h1 class="rv-20-banner_content_heading rv-text-anime wow fadeInUp"
                                    data-wow-delay="0.3s" style="margin-bottom: 10px;">SANJEEVANI ORGANICS</h1>
                                <h2 class="rv-20-banner_content_heading rv-text-anime wow fadeInUp"
                                    data-wow-delay="3.6s" style="font-size: 19px; margin-bottom: 10px;">"Growing with
                                    Purpose on a sustainable Journey"</h2>
                                <h3 style="font-size: 17px;color:white;"><b>Sanjeevani Agrofoods Limited</b> is a leading Brand in
                                    Organic Farming. We are Largest producers and exporters of Certified Organic Food –
                                    Pulses, Cereals, Dairy Products, Indian Spices, Honey, Tea, Frozen Vegetables and
                                    Many More.</h3>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="rv-20-banner_slide rv-20-banner_slide-2 swiper-slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-11 col-md-10 col-lg-9 col-xl-8">
                            <div class="rv-20-banner_content">
                                <h2 class="rv-20-banner_content_heading rv-text-anime wow fadeInUp"
                                    data-wow-delay="0.3s" style="margin-bottom: 10px;">SAVE OUR SOILS</h2>
                                <h2 class="rv-20-banner_content_heading rv-text-anime wow fadeInUp"
                                    data-wow-delay="3.6s" style="font-size: 19px; margin-bottom: 10px;">"Preserve
                                    earth's essence act now to save our precious soils."</h2>
                                <h3 style="font-size: 17px;color:white;">"A Nation that destroys its soil destroys itself. Green
                                    Fields and Trees are the lungs of our land, purifying the air and giving fresh
                                    strength to our people.</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="rv-20-banner_slide rv-20-banner_slide-2 swiper-slide">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-11 col-md-10 col-lg-9 col-xl-8">
                            <div class="rv-20-banner_content">
                                <h2 class="rv-20-banner_content_heading rv-text-anime wow fadeInUp"
                                    data-wow-delay="0.3s" style="margin-bottom: 10px;">ORGANIC COW MILK</h2>
                                <h2 class="rv-20-banner_content_heading rv-text-anime wow fadeInUp"
                                    data-wow-delay="3.6s" style="font-size: 19px; margin-bottom: 10px;">"Sustainable
                                    Organic Cow Farming Thrives, Prioritizing Health & Environmental Harmony."</h2>
                                <h3 style="font-size: 17px;color:white;">"Organic Feed | No Synthetic Hormones or Antibiotics |
                                    Access to Pasture | No Genetically Modified Organisms (GMOs) | Environmental
                                    Sustainability"</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <div class="rv-20-banner_slide_button_area">
            <div class="rv-20-banner_slide_button_prev"> <i class="fas fa-arrow-left"></i> </div>
            <div class="rv-20-banner_slide_button_next"> <i class="fas fa-arrow-right"></i> </div>
        </div>
    </section> -->




    <!--------------------------------------------------------------------------
                                        SLIDER SECTION MAIN START
-------------------------------------------------------------------------------->






    <!----------------------------------------------------------------------------
                                        SECTION TWO START
--------------------------------------------------------------------------------->

    <section class="rv-20-service_section">
        <div class="container sectionTwo">
            <div class="row justify-content-center" data-aos="fade-down">
                <div class="indexPageText">
                    <div class="rv-20-service_section_heading">
                        <h3>Step into the World of Organics!</h3>
                        <h2 style="color:#72981d"><strong>Let the first step be firmly anchored!</strong></h2>
                        <p style="font-size:18px;text-align:center;"><b>Sanjeevani Agrofoods Limited</b> is a leading
                            Brand in Organic Farming. We are Largest
                            producers and exporters of Certified Organic Food – Pulses, Cereals, Dairy Products, Indian
                            Spices, Honey, Tea, Frozen Vegetables and Many More.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------------------------------------------------------
                                     SECTION TWO END
-------------------------------------------------------------------------------->





    <!-----------------------------------------------------------------------------
                            SECTION THREE START IMAGE BACKGROUND
------------------------------------------------------------------------------>

    <section class="rv-20-service_section">
        <div class="container-fluid">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-4 col-sm-10 col-md-6">
                    <div class="rv-20-single_service">
                        <div class="rv-20-single_service_iamge">
                            <img src="assets/img/home-6-service-6.webp"
                                alt="Sanjeevani Organic processing / www.barsanamagic.com">
                        </div>
                        <div class="rv-20-single_service_content_main visible">
                            <div class="visible-part">
                                <div class="rv-20-single_service_content_top">
                                    <div class="rv-20-single_service_icon">
                                        <img src="assets/img//home-6-service-icon-1.webp"
                                            alt="Organic Agriculture ecological production management">
                                    </div>
                                </div>

                                <div class="rv-20-single_service_content_title">
                                    <h4>Organic Agriculture</h4>
                                </div>
                            </div>

                            <p>Organic agriculture is an ecological
                                production management system that
                                promotes and enhances biodiversity,
                                biological cycles and soil biological
                                activity. It is based on minimal use of
                                off-farm inputs and on management practices
                                that restore, maintain and enhance ecological harmony.</p>
                            <a href="https://www.sanjeevaniagrofoods.com/beta/blog/sanjeevani-organics-farming.html"
                                class="rv-20-service_btn"> <span class="rv-20-service_btn_txt">Read More</span> <i
                                    class="fal fa-arrow-right"></i></a>



                            <div class="fontBottam">
                                <h4>SANJEEVANI ORGANICS</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-10 col-md-6">
                    <div class="rv-20-single_service">
                        <div class="rv-20-single_service_iamge">
                            <img src="assets/img/sanjeevani-organicsourcing.webp"
                                alt="Sanjeevani Organic sourcing / www.barsanamagic.com">
                        </div>
                        <div class="rv-20-single_service_content_main visible">
                            <div class="visible-part">
                                <div class="rv-20-single_service_content_top">
                                    <div class="rv-20-single_service_icon">
                                        <img src="assets/img//home-6-service-icon-2.webp"
                                            alt="Sanjeevani Organic sourcing / www.barsanamagic.com">
                                    </div>
                                </div>

                                <div class="rv-20-single_service_content_title">
                                    <h4>SOURCING</h4>
                                </div>
                            </div>
                            <p>Organic farming diverges from conventional methods by eschewing synthetic
                                pesticides, herbicides, and genetically modified organisms. Instead, it prioritizes
                                natural processes, biodiversity, and soil health. Organic farms employ crop rotation,
                                cover crops, & fostering resilient ecosystems.</p>
                            <div class="hidden-part">
                                <p>
                                    <a href="https://www.sanjeevaniagrofoods.com/beta/blog/organic-farming-and-its-sourcing-processing-methods.html"
                                        class="rv-20-service_btn"> <span class="rv-20-service_btn_txt">Read More</span>
                                        <i class="fal fa-arrow-right"></i></a>
                            </div>
                            <div class="fontBottam">
                                <h4>SANJEEVANI ORGANICS</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-10 col-md-6">
                    <div class="rv-20-single_service">
                        <div class="rv-20-single_service_iamge">
                            <img src="assets/img/logistics.webp"
                                alt="Sanjeevani Organic distribution / www.barsanamagic.com" >
                        </div>
                        <div class="rv-20-single_service_content_main visible">
                            <div class="visible-part">
                                <div class="rv-20-single_service_content_top">
                                    <div class="rv-20-single_service_icon">
                                        <img src="assets/img//home-6-service-icon-3.webp"
                                            alt="Sanjeevani Organic distribution / www.barsanamagic.com" loading="lazy">
                                    </div>
                                </div>

                                <div class="rv-20-single_service_content_title">
                                    <h4>DISTRIBUTION</h4>
                                </div>
                            </div>
                            <!-- <div class="hidden-part"> -->
                            <p>The organic food distribution market is experiencing robust growth,
                                driven by increasing consumer demand for sustainably sourced products. Distributors
                                play a pivotal role in connecting organic farmers with retailers and consumers,
                                fostering a supply chain that prioritizes transparency, quality & adherence to
                                organic standards.</p>
                            <a href="service-details.html" class="rv-20-service_btn"> <span
                                    class="rv-20-service_btn_txt">Read More</span> <i
                                    class="fal fa-arrow-right"></i></a>
                            <!-- </div> -->

                            <div class="fontBottam">
                                <h4>SANJEEVANI ORGANICS</h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="service-sh-1"><img src="assets/img/home-6-service-4.webp"
                alt="Sanjeevani agrofoods/ www.barsanamagic.com" loading="lazy"></span>
        <span class="service-sh-2"><img src="assets/img/home-6-service-5.webp"
                alt="Sanjeevani agrofoods / www.barsanamagic.com" loading="lazy"></span>
    </section>


    <!------------------------------------------------------------------------------
                            SECTION THREE END IMAGE BACKGROUND
------------------------------------------------------------------------------->





    <!-----------------------------------------------------------------------------------------
                            SANJEEVANI ORGANICS EXPORT SECTION START 
     ------------------------------------------------------------------------------------------>
    <div class="containerExport">
        <div class="mobileViewHeading">
            <h2 class="p-5 text-center text-success rv-20-price_section_title rv-text-anime special">
                SANJEEVANI ORGANICS EXPORT PROCESS</h2>
        </div>
        <div class="linee"></div>

        <div class="d-flex justify-content-between mobileViewExport">
            <div class="processBox">
                <!-- <div class="mobileViewImage">
                <img src="https://img.freepik.com/free-vector/colorful-farming-concept_1284-39258.jpg?t=st=1718604387~exp=1718607987~hmac=0520b01a48a4e2876dfa7c38ab0f2659d9eaef527af6c5c4cef799234de5d99e&w=740"
                    alt="Organic Agriculture ecological production management" class="rounded mr-5">
            </div> -->
                <div class="processBoxTwo">
                    <div class="rv-20-single_service_icon d-flex justify-content-center">
                        <!-- <img src="assets/img/services/home-6-service-icon-4-PhotoroomNew.png"
                        alt="Sanjeevani Organic processing/www.barsanamagic.com" class="iconImg"> -->
                        <svg height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 18.566 18.566" xml:space="preserve"
                            fill="#4ee119" stroke="#4ee119">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path style="fill:#4de515;"
                                        d="M17.705,11.452h-0.73v-3.65c0.929-0.352,1.591-1.247,1.591-2.299c0-1.359-1.102-2.46-2.461-2.46 c-1.044,0-1.936,0.651-2.291,1.568h-1.668V4.522c0-0.475-0.384-0.86-0.859-0.86h-5.2c-0.475,0-0.859,0.386-0.859,0.86V4.61H3.566 V2.924c0-0.475-0.385-0.86-0.859-0.86H1.24c-0.475,0-0.859,0.385-0.859,0.86v5.199c0,0.476,0.385,0.859,0.859,0.859h1.467 c0.474,0,0.859-0.384,0.859-0.859V5.9h1.663v0.089c0,0.475,0.384,0.86,0.859,0.86h5.199c0.476,0,0.859-0.385,0.859-0.86V5.9h1.533 c0.168,1.032,0.977,1.848,2.006,2.025v3.527h-3.179c-0.475,0-0.859,0.385-0.859,0.858v0.089H9.851v-1.955 c0-0.474-0.386-0.859-0.86-0.859H7.524c-0.475,0-0.859,0.386-0.859,0.859v1.955H4.833c-0.284-1.046-1.237-1.815-2.372-1.815 C1.102,10.584,0,11.686,0,13.044c0,1.359,1.102,2.46,2.461,2.46c1.136,0,2.088-0.769,2.372-1.815h1.832v1.955 c0,0.476,0.385,0.859,0.859,0.859h1.467c0.474,0,0.86-0.384,0.86-0.859v-1.955h1.796v0.089c0,0.476,0.385,0.859,0.859,0.859h5.199 c0.476,0,0.86-0.384,0.86-0.859v-1.467C18.565,11.837,18.18,11.452,17.705,11.452z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <div class="rv-20-single_service_content_title">
                            <h4 class="mt-5 text-center">PROCESSING</h4>
                        </div>
                    </div>
                    <div class="hidden-part">
                        <p>For food to bear the "organic" label, it must undergo processing in
                            facilities certified to organic standards. These certifications ensure compliance
                            with stringent regulations, including the exclusion of synthetic pesticides, GMOs,
                            and adherence to environmentally sustainable practices.</p>
                        <!-- <a href="service-details.html" class="rv-20-service_btn btn btn-outline-success"> <span
                            class="rv-20-service_btn_txt">Read
                            More</span> </a> -->
                    </div>
                    <div class="fontBottam">
                        <h3>SANJEEVANI ORGANICS</h3>
                    </div>
                </div>

            </div>

            <div class="processBox">
                <div class="processBoxTwo">
                    <div class="rv-20-single_service_icon d-flex justify-content-center">
                        <!-- <img src="assets/img/services/home-6-service-icon-5_processed.png"
                        alt="Sanjeevani Organic processing / www.barsanamagic.com" class="iconImg"> -->
                        <svg fill="#fff" height="50px" width="50px" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#12c41e">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>label</title>
                                <path
                                    d="M0 7.008v-3.008q0-1.632 1.184-2.816t2.816-1.184h4q1.664 0 2.816 1.184t1.184 2.816h4q2.496 0 4.256 1.76l9.984 10.016q1.76 1.728 1.76 4.224t-1.76 4.256l-5.984 6.016q-1.76 1.728-4.224 1.728t-4.256-1.728l-10.016-10.016q-1.76-1.76-1.76-4.256v-12h6.016q0-0.832-0.608-1.408t-1.408-0.576h-4q-0.832 0-1.408 0.576t-0.576 1.408v3.008q0 0.608-0.512 0.864t-0.992 0-0.512-0.864zM8 16q0 0.832 0.608 1.408l9.984 10.016q0.608 0.576 1.44 0.576t1.376-0.576l6.016-6.016q0.576-0.576 0.576-1.408t-0.576-1.408l-10.016-10.016q-0.576-0.576-1.408-0.576h-1.024q1.024 1.376 1.024 3.008 0 1.12-0.384 2.048t-0.992 1.536-1.472 0.992-1.728 0.416-1.76-0.192-1.664-0.832v1.024zM8 11.008q0 0.8 0.32 1.44t0.864 0.928 1.184 0.48 1.28 0 1.152-0.48 0.864-0.928 0.352-1.44q0-0.96-0.576-1.728t-1.44-1.056v2.784q0 0.608-0.512 0.864t-0.992 0-0.48-0.864v-2.784q-0.896 0.288-1.44 1.056t-0.576 1.728z">
                                </path>
                            </g>
                        </svg>
                        <div class="rv-20-single_service_content_title">
                            <h4 class="mt-5">PRIVATE LABELLING</h4>
                        </div>
                    </div>
                    <div class="hidden-part">
                        <p>Sanjeevaniorganics is committed to making your private brand program
                            a success. For years we’ve provided a wide variety of best in class products to
                            companies around the world. We have the capability to produce products based on your
                            Requirements from our large assortment of products available for immediate
                            production.</p>
                        <!-- <a href="service-details.html" class="rv-20-service_btn btn btn-outline-success"> <span
                            class="rv-20-service_btn_txt">Read
                            More</span></a> -->
                    </div>
                    <div class="fontBottam">
                        <h3>SANJEEVANI ORGANICS</h3>
                    </div>
                </div>
            </div>


            <div class="processBox">
                <!-- <div class="mobileViewImage">
                <img src="https://img.freepik.com/free-vector/transportation-cargo-merchandise-ship-cartoon_18591-52446.jpg?t=st=1718608400~exp=1718612000~hmac=59c31a0bb6f1e321891d953e08f857a308297b63301c79cd87fa4d9715c3fc89&w=826"
                    alt="Organic Agriculture ecological production management" class="rounded">
            </div> -->
                <div class="processBoxTwo">
                    <div class="rv-20-single_service_icon d-flex justify-content-center">
                        <!-- <img src="assets/img/services/home-6-service-icon-5_processed.png"
                        alt="Sanjeevani Organic processing / www.barsanamagic.com"> -->
                        <svg fill="#12c41e" height="50px" width="50px" version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 512 512" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <polygon
                                            points="62.11,376.467 62.11,360.776 0,360.776 0,399.506 62.11,399.506 62.11,383.815 15.691,383.815 15.691,376.467 ">
                                        </polygon>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M116.375,368.312c-12.875,0-23.35,10.475-23.35,23.349c0,12.876,10.475,23.35,23.35,23.35 c12.875,0,23.35-10.475,23.35-23.35C139.724,378.787,129.249,368.312,116.375,368.312z M116.375,399.321 c-4.223,0-7.659-3.436-7.659-7.659c0-4.223,3.436-7.658,7.659-7.658c4.223,0,7.659,3.435,7.659,7.658 S120.597,399.321,116.375,399.321z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M333.433,368.312c-12.875,0-23.35,10.475-23.35,23.349c0,12.876,10.475,23.35,23.35,23.35s23.35-10.475,23.35-23.35 C356.783,378.787,346.308,368.312,333.433,368.312z M333.433,399.321c-4.223,0-7.659-3.436-7.659-7.659 c0-4.223,3.436-7.658,7.659-7.658c4.223,0,7.659,3.435,7.659,7.658S337.656,399.321,333.433,399.321z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M410.954,368.312c-12.875,0-23.35,10.475-23.35,23.349c0,12.876,10.475,23.35,23.35,23.35s23.35-10.475,23.35-23.35 C434.304,378.787,423.829,368.312,410.954,368.312z M410.954,399.321c-4.223,0-7.659-3.436-7.659-7.659 c0-4.223,3.436-7.658,7.659-7.658c4.223,0,7.659,3.435,7.659,7.658S415.177,399.321,410.954,399.321z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="93.579" y="290.319" width="23.013" height="15.691"></rect>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M170.99,128.185v256.281h-8.009V159.005H15.504v193.895h15.691v-30.15h7.993v30.335h15.691v-46.026H31.195V283h85.4 V174.695h30.695v182.131c-8.233-7.315-19.062-11.771-30.916-11.771c-25.698,0-46.605,20.907-46.605,46.606 c0,25.699,20.907,46.607,46.605,46.607c22.796,0,41.809-16.456,45.816-38.11h24.49V143.877h153.768v-15.692H170.99z M100.905,267.309H54.879v-14.645H39.188v14.645h-7.993v-92.614h69.709V267.309z M116.375,422.576 c-17.046,0-30.915-13.868-30.915-30.916c0-17.047,13.868-30.916,30.915-30.916s30.916,13.868,30.916,30.916 C147.29,408.708,133.421,422.576,116.375,422.576z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M410.954,73.732c-34.248,0-62.11,27.862-62.11,62.11s27.862,62.11,62.11,62.11c34.247,0,62.11-27.862,62.11-62.11 S445.202,73.732,410.954,73.732z M418.902,181.566v-7.355h-15.691v7.391c-19.304-3.256-34.589-18.464-37.966-37.727h6.585v-15.691 h-6.652c3.242-19.442,18.603-34.826,38.033-38.104v6.723h15.691v-6.686c19.333,3.352,34.599,18.694,37.829,38.068h-7.494v15.691 h7.426C453.298,163.071,438.108,178.236,418.902,181.566z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <polygon
                                            points="403.211,104.126 403.211,132.556 382.296,153.155 393.305,164.334 418.902,139.127 418.902,104.126 ">
                                        </polygon>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M512,128.185h-31.381v15.691h15.691v177.827h-224.9v15.691h224.9v47.072h-39.306 c-3.47-22.294-22.796-39.412-46.049-39.412c-16.145,0-30.394,8.254-38.76,20.761c-8.367-12.506-22.617-20.761-38.761-20.761 c-23.253,0-42.579,17.117-46.049,39.412h-93.382v15.691h93.616c4.006,21.654,23.019,38.111,45.816,38.111 c16.145,0,30.394-8.254,38.761-20.761c8.366,12.507,22.617,20.761,38.76,20.761c22.796,0,41.808-16.456,45.816-38.111H512 L512,128.185L512,128.185z M333.433,422.576c-17.046,0-30.915-13.868-30.915-30.916c0-17.047,13.868-30.916,30.915-30.916 c17.046,0,30.916,13.868,30.916,30.916C364.349,408.708,350.48,422.576,333.433,422.576z M410.954,422.576 c-17.046,0-30.915-13.868-30.915-30.916c0-17.047,13.868-30.916,30.915-30.916c17.046,0,30.915,13.868,30.915,30.916 C441.869,408.708,428.002,422.576,410.954,422.576z">
                                        </path>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="201.322" y="344.713" width="38.704" height="15.691"></rect>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="201.322" y="321.7" width="16.737" height="15.691"></rect>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="225.381" y="321.7" width="14.645" height="15.691"></rect>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="248.394" y="321.7" width="14.645" height="15.691"></rect>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <div class="rv-20-single_service_content_title">
                            <h4 class="mt-5">EXPORT</h4>
                        </div>
                    </div>
                    <div class="hidden-part">
                        <p>Sanjeevani Organics Goes International. Sanjeevani organics Products
                            are now available in Bulk or White Label across the globe through our Export Sales
                            office at Head Office (+91 7895330903) or can be contacted at Sanjeevai USA Sales
                            Division, New Jersey, USA (+1 732-4213988).</p>
                        <!-- <a href="#" class="rv-20-service_btn btn btn-outline-success">
                        <span class="rv-20-service_btn_txt">Read More</span></a> -->
                    </div>
                    <div class="fontBottam">
                        <h3>SANJEEVANI ORGANICS</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-----------------------------------------------------------------------------------------
                            SANJEEVANI ORGANICS EXPORT SECTION END 
     ------------------------------------------------------------------------------------------>




    <!-----------------------------------------------------------------------------------------
                            SANJEEVANI DAIRY PRODUCT SECTION START 
     ------------------------------------------------------------------------------------------>
    <div class="bannerMain">
        <div class="bannerimageOrganicFarming container-fulid">
            <img src="" alt="">
            <div class="badge badge-success text-white fs-3 fst-italic">Organic Dairy Farming </div>
        </div>
    </div>


    <section class="rv-20-about_section m-5">
        <div class="dairyMobileView">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-7 col-12">
                    <div class="rv-20-about_section_content " data-aos="fade-up">
                        <div class="rv-20-about_section_heading">
                            <!-- <p class="badge badge-success text-white fs-3 fst-italic"> <span></span> Organic Dairy
                                Farming</p> -->
                            <h2 class="rv-20-about_section_title rv-text-anime special">DAIRY PRODUCTS</h2>
                            <div class="linee"></div>
                        </div>
                        <div class="rv-20-about_content_top_actions">
                            <div class="rv-20-about_content_single_top_actions">
                                <div class="rv-20-about_content_single_top_actions_left">
                                    <h3>Organic Cow Milk</h3>
                                    <p>Sanjeevani Organics Indian Cow Milk produced under Brand name “BARSANA MAGIC” Cow
                                        Milk at Sanjeevani Organics is USDA Organic Food compliant and also certified by
                                        NPOP Organic, and comes in UHT Tetra pack having shelf life of 6 months. <a
                                            href="https://www.barsanamagic.com/blogs/view_detail/indian-cow-milk-1">Read
                                            More or Buy Now</a></p>
                                </div>

                            </div>
                            <div class="rv-20-about_content_single_top_actions">
                                <div class="rv-20-about_content_single_top_actions_left">
                                    <h3>Organic Cow Ghee</h3>
                                    <p>Sanjeevani is working with farmers to promote Indian breed (Deshi) cows like Gir,
                                        Sahiwal, Sindhi and lower part in Himalayas is Badri cow. The milk from these
                                        cows are rich in all vitamins A,D and C as well as having more A2 protein, <a
                                            href="https://www.barsanamagic.com/blogs/view_detail/organic-bilona-ghee-1">Read
                                            More or Buy Now</a></p>
                                </div>

                            </div>
                        </div>

                        <div class="rv-20-about_list">
                            <ul>
                                <li>
                                    <h4><i class="far fa-chevron-double-right"></i><a
                                            href="https://www.barsanamagic.com/blogs/view_detail/lactose-free-milk-1">Organic
                                            Lactose Free Milk</a></h4>
                                    <p>Lactose Free Organic Cow Milk contains organic cow A2 milk, fats, milk solids and
                                        the enzyme Beta galactosidase</p>
                                </li>

                                <li>
                                    <h4><i class="far fa-chevron-double-right"></i></i><a
                                            href="https://www.barsanamagic.com/blogs/view_detail/skimmed-cow-milk-1">Organic
                                            Stay Fit Milk</a></h4>
                                    <p>Main ingredients of skimmed milk are Organic cow milk, low fat, & calories, SNF
                                        8-9 percent and no added sugars. </p>
                                </li>
                                <li>
                                    <h4><i class="far fa-chevron-double-right"></i><a
                                            href="https://www.barsanamagic.com/blogs/view_detail/double-toned-milk">Organic
                                            Double Toned Milk</a></h4>
                                    <p>Double Toned Milk contains less fat than regular whole milk & processed to remove
                                        some fat, so it is lighter and healthier.</p>
                                </li>
                                <li>
                                    <h4><i class="far fa-chevron-double-right"></i><a
                                            href="https://www.barsanamagic.com/blogs/view_detail/organic-bilona-ghee-1">Organic
                                            Cow Ghee</a></h4>
                                    <p>Barsana Magic Indian Bilona ghee for cooking, frying, or baking to impart a rich,
                                        buttery flavor to your favorite dishes</p>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-12  col-lg-6 col-xl-5">
                    <div class="rv-20-about_image">
                        <img data-aos="fade-down" src="assets/img/blog-banner.webp"
                            alt="Sanjeevani Organic 23 year old experiences / www.barsanamagic.com" loading="lazy">

                        <img data-aos="fade-up" src="assets/img/cow.webp"
                            alt="Sanjeevani agrofoods / www.barsanamagic.com" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
        <span class="about-sh-6"> <img src="assets/img/home-6-about-3.webp"
                alt="www.sanjeevaniagrofoods.com / www.barsanamagic.com" loading="lazy"></span>
    </section>
    <!-----------------------------------------------------------------------------------------
                            SANJEEVANI DAIRY PRODUCT SECTION END 
     ------------------------------------------------------------------------------------------>


    <!------------------------------------------------------------------------------------------
                                         START  VIDEO SECTION 
     ------------------------------------------------------------------------------------------->
    <section class="rv-20-video_section mobileViewVideo">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-7 col-sm-7">
                    <div class="rv-20-video_section_heading" data-aos="fade-up">
                        <a href="https://www.barsanamagic.com/" class="btn btn-outline-success text-white"> More
                            Information</a>
                        <div class="videoHeading">
                            "Crafted By Organic Means For Your Utmost
                            Care "
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-6">
                    <div class="" data-aos="fade-up">
                        <a href="https://www.youtube.com/watch?v=9AXqWDeRzC4" class="btn btn-success m-2"
                            data-vbtype="video" data-autoplay="true"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------------------------------
                                         START  VIDEO SECTION 
    ------------------------------------------------------------------------------------------->

    <!-----------------------------------------------------------------------------------------
                                         START  OUR PARTNER SECTION
    ----------------------------------------------------------------------------------------->
    <section class="rv-20-testimonial_section" data-aos="fade-up">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <div class="mt-5">
                        <img src="assets/img/client.webp"
                            alt="Sanjeevani agrofoods / www.barsanamagic.com" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-----------------------------------------------------------------------------------------
                                         END  OUR PARTNER SECTION
    ----------------------------------------------------------------------------------------->


    <div class="bannerMain">
        <div class="bannerimage container-fulid">

        </div>
    </div>

    <section class="sanjeevaniMoto">
        <div class="row justify-content-center">
            <div class="col-md-12 rv-20-price_section">

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="rv-20-price_section_heading " data-aos="fade-down">
                            <!-- <p class="badge badge-success text-white fs-3 fst-italic"> <span></span> Organic Farming
                                </p>
                                <h2 class="rv-20-price_section_title rv-text-anime">NATURE INSPIRES!</h2> -->
                            <h3 class="">Our motto: Protect Farmers, Planet and YOU !</h3>
                            <p class="">"Harmony with nature, sustainability at heart. Organic farming
                                nourishes the earth,
                                cultivates health, and champions a future of abundance."</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!---------------------------------------------------------------------------------------
                                 SECTION START NATURE INSPIRES! 
    ---------------------------------------------------------------------------------------->
    <div class="container-fulid mt-5">
        <div class="d-flex">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="col-12 d-flex">
                        <div class="col-5 sliderImg">
                            <div class="rv-20-single_service_image">
                                <img src="assets/img/grains.webp"
                                    alt="sanjeevaniagrofoods and barsana magic india dairy" loading="lazy">
                            </div>
                        </div>
                        <div class="sliderText">
                            <div class="rv-20-single_service_content_main">
                                <div class="visible-part">
                                    <div class="rv-20-single_service_content_title">
                                        <h4 class="text-white text-center bg-success borederRadius p-2">ORGANIC GRAINS
                                        </h4>
                                    </div>
                                </div>
                                <div class="naturepart sliderHidenPart mt-3">
                                    <p>Sustainably grown, nutrient-rich organic grains for a healthier planet.<br>At
                                        Sanjeevani we have introduced organic farming of following
                                        Cereals: Basmati Rice, Non Basmati Rice, Wheat, Jowar (Shorghum), Bajra (Pearl
                                        Millet), Ragi (Finger Millet), Amaranthus (Ramdana / Chaulai), Barley.
                                        All these products are available as per standards and organic regulation of NOP
                                        and
                                        NPOP.</p>
                                    <!-- <a href="https://www.sanjeevaniagrofoods.com/beta/blog/sanjeevani-organics-farming.html"
                                        class="rv-20-service_btn btn btn-outline-success mt-3"> <span
                                            class="rv-20-service_btn_txt">Read More</span>
                                        <i class="fal fa-arrow-right"></i></a> -->
                                </div>
                                <div class="hideText m-3">
                                    <h4 class="rv-20-service_drp_txt">SANJEEVANI ORGANICS</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="item ">
                    <div class="col-12 d-flex">
                        <div class="col-5 sliderImg">
                            <div class="rv-20-single_service_image">
                                <img src="assets/img/organic-pulses.webp" class="borederRadius"
                                    alt="Sanjeevani Organic / Barsana Magic Indian Cow Milk" loading="lazy">
                            </div>
                        </div>
                        <div class="sliderText">
                            <div class="rv-20-single_service_content_main">
                                <div class="visible-part">
                                    <div class="rv-20-single_service_content_title">
                                        <h4 class="text-white text-center bg-success p-2 borederRadius">ORGANIC PULSES
                                        </h4>
                                    </div>
                                </div>
                                <div class="naturepart mt-3">
                                    <p>Premium quality organic pulses, cultivating health, and nourishing
                                        communities
                                        with ethical farming practices.<br>SanjeevaniOrganics offer a complete range of
                                        organic pulses, beans
                                        and all our offerings are 100% certified organic. Pulses are also known as
                                        legumes
                                        or lentils. Pulses are a low fat source of protein with high levels of protein
                                        and
                                        fibre. Pulses also contain important vitamins and minerals like iron, potassium
                                        and
                                        folate. We promote good health and a healthy living.</p>
                                    <!-- <a href="service-details.html"
                                        class="rv-20-service_btn btn btn-outline-success mt-3"> <span
                                            class="rv-20-service_btn_txt">Read More</span> <i
                                            class="fal fa-arrow-right"></i></a> -->
                                </div>
                                <div class="hideText m-3">
                                    <h4 class="rv-20-service_drp_txt">SANJEEVANI ORGANICS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="col-12 d-flex">
                        <div class="col-5 sliderImg">
                            <div class="rv-20-single_service_image">
                                <img src="assets/img/oil-slider.webp"
                                    alt="Sanjeevani Agrofoods / Sanjeevani Barsana Magic Organic Milk"
                                    class="borederRadius" loading="lazy">
                            </div>
                        </div>
                        <div class="sliderText">
                            <div class="rv-20-single_service_content_main">
                                <div class="visible-part">
                                    <div class="rv-20-single_service_content_title">
                                        <h4 class="text-white text-center bg-success p-2 borederRadius">ORGANIC EDIBLE
                                            OILS</h4>
                                    </div>
                                </div>
                                <div class="naturepart mt-3">
                                    <p>Provide premium organic edible oils, cultivating health, sustainability, and
                                        culinary excellence responsibly. Sanjeevani Organic Edible oils are processed
                                        without the use of
                                        artificial and potentially harmful fertilizers chemicals, hormones, antibiotics
                                        and
                                        genetically manipulated material. All of our products are certified organic and
                                        pass
                                        strict quality controls. We offer a wide range of organic vegetable oils.</p>
                                    <!-- <a href="service-details.html"
                                        class="rv-20-service_btn btn btn-outline-success mt-3"> <span
                                            class="rv-20-service_btn_txt">Read More</span> <i
                                            class="fal fa-arrow-right"></i></a> -->
                                </div>
                                <div class="hideText m-3">
                                    <h4 class="rv-20-service_drp_txt">SANJEEVANI ORGANICS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="col-12 d-flex">
                        <div class="col-5 sliderImg">
                            <div class="rv-20-single_service_image">
                                <img src="assets/img/organic-spices.webp"
                                    alt="Sanjeevani Organic spices / www.barsanamagic.com" class="borederRadius" loading="lazy">
                            </div>
                        </div>
                        <div class="sliderText">
                            <div class="rv-20-single_service_content_main">
                                <div class="visible-part">
                                    <div class="rv-20-single_service_content_title">
                                        <h4 class="text-white bg-success p-2 text-center borederRadius">ORGANIC SPICES
                                        </h4>
                                    </div>
                                </div>
                                <div class="naturepart mt-3">
                                    <p>Exceptional organic spices, enhancing flavors sustainably, while supporting
                                        ethical farming and biodiversity.The word spice comes from the Old French word
                                        espice, which became
                                        epice and latter SPICE!! A spice is a dried seed, fruit, root, bark, or
                                        vegetative
                                        substance primarily used for flavoring, coloring or preserving food.
                                        Sanjeevaniorganics spices are available in several forms: fresh, whole dried, or
                                        pre-ground dried. Generally, spices are dried.</p>
                                    <!-- <a href="service-details.html"
                                        class="rv-20-service_btn btn btn-outline-success mt-3"> <span
                                            class="rv-20-service_btn_txt">Read More</span> <i
                                            class="fal fa-arrow-right"></i></a> -->
                                </div>
                                <div class="hideText m-3">
                                    <h4 class="rv-20-service_drp_txt">SANJEEVANI ORGANICS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="col-12 d-flex">
                        <div class="col-5 sliderImg">
                            <div class="rv-20-single_service_image">
                                <img src="assets/img/indian-cow-milk2.webp"
                                    alt="Sanjeevani Organic and Barsana Organic Cow Milk / www.barsanamagic.com"
                                    class="borederRadius" loading="lazy">
                            </div>
                        </div>
                        <div class="sliderText">
                            <div class="rv-20-single_service_content_main">
                                <div class="visible-part">
                                    <div class="rv-20-single_service_content_title">
                                        <h4 class="text-white text-center bg-success p-2 borederRadius">INDIAN COW MILK
                                        </h4>

                                    </div>
                                </div>
                                <div class="naturepart setContent p-3">
                                    <p>Deliver pure, organic cow milk, prioritizing animal welfare, sustainability,
                                        and
                                        health-conscious consumers.
                                        Sanjeevani Organic cow milk farming embodies a holistic approach,
                                        prioritizing sustainable and humane practices. Cows graze on organic pastures,
                                        consuming pesticide-free, non-GMO feed. This natural diet enhances the
                                        nutritional
                                        quality of the milk, rich in omega-3 fatty acids and antioxidants. Organic
                                        farmers
                                        avoid synthetic hormones and antibiotics, promoting the health and well-being of
                                        the
                                        animals. Emphasizing biodiversity and soil health, organic practices foster
                                        resilient ecosystems. Certification ensures adherence to strict organic
                                        standards,
                                        affirming the absence of harmful chemicals and genetically modified organisms.
                                        Beyond nutrition, organic cow milk farming reflects a commitment to ethical,
                                        environmentally conscious agriculture, offering consumers a wholesome, conscious
                                        choice for a sustainable future.</p>
                                    <!-- <a href="#" class="rv-20-service_btn btn btn-outline-success mt-3"> <span
                                            class="rv-20-service_btn_txt">Read More</span> <i
                                            class="fal fa-arrow-right"></i></a> -->
                                </div>
                                <div class="hideText m-3">
                                    <h4 class="rv-20-service_drp_txt">SANJEEVANI ORGANICS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="col-12 d-flex">
                        <div class="col-5 sliderImg">
                            <div class="rv-20-single_service_image">
                                <img src="assets/img/portfolio12.webp"
                                    alt="Sanjeevani Organic Product / barsana magic Organic Dairy"
                                    class="borederRadius" loading="lazy">
                            </div>
                        </div>
                        <div class="sliderText">
                            <div class="rv-20-single_service_content_main">
                                <div class="visible-part">
                                    <div class="rv-20-single_service_content_title">
                                        <h4 class="text-white text-center bg-success bg-success p-2 borederRadius">
                                            ORGANIC OTHER PRODUCTS</h4>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="naturepart p-3">
                                    <p>Elevate your culinary experience with our diverse selection of premium
                                        organic
                                        kitchen products for cooking. At Sanjeevani we offer a complete Kitchen Basket,
                                        Yes, Our motto is
                                        to convert your kitchen to a complete Organic Kitchen. We have more that 180
                                        Organic
                                        certified products and they are available in wholesale, Retail and online. Click
                                        to
                                        Explore the organic Basket</p>
                                    <!-- <a href="service-details.html"
                                        class="rv-20-service_btn btn btn-outline-success mt-3"> <span
                                            class="rv-20-service_btn_txt">Read More</span> <i
                                            class="fal fa-arrow-right"></i></a> -->
                                </div>
                                <div class="hideText m-3">
                                    <h4 class="rv-20-service_drp_txt">SANJEEVANI ORGANICS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------------------------------------------------------------------------------------
                                 SECTION START NATURE INSPIRES! 
    ---------------------------------------------------------------------------------------->




    <div class="ViewHeading">
        <h2 class="p-5 text-center  rv-20-price_section_title rv-text-anime special">
            100% pure, organic & natural products. Nothing else</h2>
    </div>

    <!----------------------------------------------------------------------------------------
                                         START PRICE SECTION 
    ------------------------------------------------------------------------------------------>
    <section class="rv-20-price_section">
        <div class="container-fulid">
            <div class="box">
                <div class="col-12 d-flex flex-row flex-wrap">

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/building.webp" alt="sanjeevni office"
                                    class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    HEAD-OFFICE
                                </div>
                                <!-- <div class="designation">Sanjeevani Agrofoods</div> -->
                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    At Sanjeevani Organics, the farming is not only agriculture practice but
                                    its holistic approach for sustainable development. Sanjeevani does not
                                    only work for commercial activity to grow crop but to make farmers more
                                    educated and concern for their generation to come. On the same time
                                    income of the farmer increases substantially whereas their living
                                    standards also being taken care by CSR at Sanjeevani Organics. In
                                    Sustainable approach model all stake holders grow together and company
                                    expand its market globally.
                                </div>
                                <a href="#" class="btn btn-outline-success mt-2">Read More</a>
                                <!-- <button class="btn btn-outline-success mt-2">Read More</button> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/team2.webp" alt="logo" class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    Organic Pulses (UNIT)
                                </div>

                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    Organic Pulses Suppliers Pulses are also known as legumes or lentils.
                                    Pulses are seeds from the legume plant family and lentils are a pulse.
                                    Legumes (beans) are among the oldest cultivated plants.
                                    Arhar Dal (Pigeon Pea), Chana Whole (Bengal Gram), Chana Dal (Bengal Gram
                                    Dal), Chana Besan (Gram Flour), Chickpea (Kabuli Channa), Masoor Whole
                                    (Black Lentil), Masoor Malka (Pink Lentil), Masoor Dal, Moong Whole
                                    (Green Gram), Moong Split Chilka, Moong Split Washed, Rajma Red (Red
                                    Kidney Beans), Rajma Chitra, Rajma Jammu, Urad Whole (Black Gram), Urad
                                    Split Chilka, Urad Dal Dhuli
                                </div>
                                <a href="#" class="btn btn-outline-success mt-2">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/frozen.webp" alt="logo" class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    Organic Farming
                                </div>
                                <!-- <div class="designation mt-2">Frozen Vegetable</div> -->

                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    Sanjeevani Organics 'Frozen food and frozen vegetable' is concept being
                                    adapted in the present kitchen practices. It’s high time that the
                                    concept of convenience at kitchen is picking up. As a matter of fact
                                    that the basic food remain same as raw ingredients, the only value
                                    addition is either with recipe or presentation. In presentation the
                                    "packing and self-life control" are covered but in recipe other lot of
                                    factors are involved beyond the collection of ingredients. “Convenience
                                    at Kitchen” comes under the category of value addition in your cooking
                                    methodology.
                                </div>
                                <a href="#" class="btn btn-outline-success mt-2">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/milk.webp" alt="logo" class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    Barsana Magic Cow Milk
                                </div>
                                <!-- <div class="designation mt-3">Organic Milk</div> -->
                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    Barsana is a small town (Tehesil) located in dist Mathura, Uttar Pradesh.
                                    This region is also known as Braj Bhumi. The place is birth place of
                                    goddesses Radharani and consort of Lord Krishna. In this region people
                                    domesticate animals especially cows religiously. They raise the animal
                                    in worship of Lord Krishna. Lord Krishna’s love for cows and dairy
                                    product is well known.
                                </div>
                                <a href="#" class="btn btn-outline-success mt-2">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/barsana-dairy.webp"
                                    style="height:300px width:500px" alt="logo" loading="lazy">
                                <div class="text-uppercase name mt-3 font-weight-bold">
                                    About Barsana Magic
                                </div>
                                <!-- <div class="designation">Barsana Magic</div> -->
                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    Barsana Magic Organic Cow milk is initiative of Sanjeevani Agrofoods
                                    Limited to serve the consumer with quality milk from Indian breed cows..
                                    In this region people domesticate animals especially cows religiously.
                                    They raise the animal in worship of Lord Krishna. Lord Krishna’s love
                                    for cows and dairy product is well known. Sanjeevani Organics is doing
                                    project with the farmer of Braj region in Organic Farming as well as
                                    livestock organic farming. In this project farmers are being trained for
                                    Organic farming practices whereas the domestication of animal is also
                                    part of the project.
                                </div>
                                <a href="https://www.barsanamagic.com/products/category/organic-milk-1" class="btn btn-outline-success mt-2" target="_blank">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/blog7.webp" alt="logo" class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    Organic Agriculture
                                </div>
                                <!-- <div class="designation">Organic Farming</div> -->
                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    Organic farming practices whereas the domestication of animal is also
                                    part of the project. These Projects are certified Organic Agriculture
                                    projects under the norms of NPOP and USADA NOP Organic standards. The
                                    Sanjeevai Agrofoods Limited is operating its Organic agriculture project
                                    across the country and improving not only the farmers life but also
                                    preserving planet.
                                </div>
                                <a href="#" class="btn btn-outline-success mt-2">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/dal.webp" alt="logo" class="profile" loading="lazy">
                                <div class="text-uppercase name p-3 font-weight-bold">
                                    Organic Pulses
                                </div>
                                <!-- <div class="designation">PULSES</div> -->
                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    Organic Pulses Suppliers Pulses are also known as legumes or lentils.
                                    Pulses are seeds from the legume plant family and lentils are a pulse.
                                    Legumes (beans) are among the oldest cultivated plants. In fact, fossil
                                    records demonstrate that prehistoric people domesticated and cultivated
                                    legumes for food. Today, this extremely large category of vegetables
                                    contains over 13,000 species and is second only to grains in supplying
                                    calories and protein to the world's population. There are various types
                                    of pulses which differ in colour, shape, size and taste. Pulses are
                                    important food crops due to their high protein and essential amino acid
                                    content.
                                </div>
                                <a href="#" class="btn btn-outline-success">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/blog8.webp" alt="logo" class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    Organic Ghee
                                </div>
                                <!-- <div class="designation mt-2">Indian Cow Ghee</div> -->
                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    With a firm determination and consistency in the implementation of the
                                    objectives, Sanjeevani gives you pure organic indian cow-ghee which is
                                    neither adulterated nor contaminated and is made from cow’s pure and
                                    fresh milk using the traditional standards at an unbeatable competition.
                                    Therefore, it is beneficial in retaining a good health .
                                </div>
                                <a href="https://www.barsanamagic.com/products/category/organic-ghee" class="btn btn-outline-success mt-2" target="_blank">Buy Now</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 innerbox">
                        <div class="officecard">
                            <div class="face front-face">
                                <img src="assets/img/honey2.webp" alt="logo" class="profile" loading="lazy">
                                <div class="pt-3 text-uppercase name font-weight-bold">
                                    Honey
                                </div>

                            </div>
                            <div class="face back-face">
                                <div class="testimonial">
                                    With a firm determination and consistency in the implementation of the
                                    objectives, Sanjeevani gives you pure organic indian cow-ghee which is
                                    neither adulterated nor contaminated and is made from cow’s pure and
                                    fresh milk using the traditional standards at an unbeatable competition.
                                    Therefore, it is beneficial in retaining a good health .
                                </div>
                                <a href="https://www.barsanamagic.com/products/category/natural-and-organic-honey" class="btn btn-outline-success mt-2" target="_blank">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!----------------------------------------------------------------------------------------
                                         START PRICE SECTION 
    ------------------------------------------------------------------------------------------>


    <!-------------------------------------------------------------------------------------------
                                 START  CONTACT SECTION 
   ------------------------------------------------------------------------------------------->
    <section class="rv-20-contact_main_section contactUsMain">
        <div class="container contactUsInner">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="rv-20-contact_image" data-aos="fade-up">
                        <img src="assets/img/sanjeevniagro-contactus-removebg-preview.webp"
                            alt="Sanjeevani Organic  / Barsana Magic Organic Dairy Products" class="profile" loading="lazy">
                    </div>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="rv-20-contact_form_area" data-aos="fade-up">
                        <div class="rv-20-contact_section_heading">
                            <p class="badge badge-success text-white fs-3 fst-italic"> <span></span>Get in Touch</p>
                            <h2 class="rv-20-contact_section_title rv-text-anime">Get Us To Call You Back</h2>
                        </div>
                        <form method="post" class="rv-20-contact_form" action="mail.php">
                            <div class="row rv-20-form_row">
                                <div class="">
                                    <input type="text" class="form-control" placeholder="Full Name" name="name"
                                        required>
                                </div>
                                <div class="">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                        required>
                                </div>
                            </div>
                            <div class="row rv-20-form_row">
                                <div class="">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email"
                                        required>
                                </div>
                            </div>
                            <textarea placeholder="Your Message" name="message"></textarea>
                            <div class="rv-20-contact_form_button">
                                <button name="submit">Send Message <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <span class="home-6-sh-1"> <img src="assets/img/home-6-sh-1.webp"
                alt="www.sanjeevaniagrofoods.com / www.barsanamagic.com" loading="lazy"></span>
        <span class="home-6-sh-2"> <img src="assets/img/home-6-sh-2.webp"
                alt="sanjeevani organic and barsana magic" loading="lazy"></span>
    </section>
    <!-------------------------------------------------------------------------------------------
                                 START END CONTACT SECTION 
            ------------------------------------------------------------------------------------------->


    <!-------------------------------------------------------------------------------------------
                                 START BLOG SECTION
            ------------------------------------------------------------------------------------------->

    <section class="rv-20-blog_section mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="rv-20-blog_section_heading" data-aos="fade-down">
                        <p class="rv-20-blog_sub_title rv-text-anime"> <span></span> Blogs and News</p>
                        <h2 class="rv-20-blog_section_title rv-text-anime">Latest News & Article</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="rv-20-single_blog" data-aos="fade-up">
                        <div class="rv-20-blog_image">
                            <img src="assets/img/blog1.webp"
                                alt="sanjeevani agrofoods and barsana magic dairy" loading="lazy">

                            <p class="rv-20-single_blog_date"> <i class="fal fa-calendar-alt"></i>April 02, 2024
                            </p>
                        </div>
                        <h4 class="rv-20-single_blog_content_title">
                            <a href="#">BARSANA Magic Dairy Products</a>
                        </h4>
                        <p class="rv-20-single_blog_content_desc">You don’t need to drive to a rural farmer to
                            get fresh milk any longer.
                        </p>
                        <a href="https://www.barsanamagic.com/blogs/" class="rv-20-single_blog_btn">Read More <i
                                class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="rv-20-single_blog" data-aos="fade-up">
                        <div class="rv-20-blog_image">
                            <img src="assets/img/team.webp"
                                alt="www.sanjeevaniagrofoods.com and www.barsanamagic.com" loading="lazy">

                            <p class="rv-20-single_blog_date"> <i class="fal fa-calendar-alt"></i>Jan 10, 2024
                            </p>
                        </div>
                        <h4 class="rv-20-single_blog_content_title">
                            <a href="https://sanjeevaniagrofoods.com/our-strength-our-team.php">Sanjeevani
                                Team</a>
                        </h4>
                        <p class="rv-20-single_blog_content_desc">Sanjeevani Organics working with ethos and
                            dedicating its produce to Barsana.
                        </p>
                        <a href="http://localhost/sanjeevani/our-strength-our-team.php"
                            class="rv-20-single_blog_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="rv-20-single_blog" data-aos="fade-up">
                        <div class="rv-20-blog_image">
                            <img src="assets/img/blog6.webp"
                                alt="sanjeevani agrofoods and sanjeevani barsana magic dairy products" loading="lazy">

                            <p class="rv-20-single_blog_date"> <i class="fal fa-calendar-alt"></i>Feb 25, 2024
                            </p>
                        </div>
                        <h4 class="rv-20-single_blog_content_title">
                            <a href="#">Our Organic Grocery Products</a>
                        </h4>
                        <p class="rv-20-single_blog_content_desc">Organic grocery products are fresher,
                            healthier & richer in taste.
                        </p>
                        <a href="#" class="rv-20-single_blog_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-------------------------------------------------------------------------------------------
                                 END BLOG SECTION
            ------------------------------------------------------------------------------------------->

    <?php include ('footer.php'); ?>
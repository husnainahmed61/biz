<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this free HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Vayzn Premium - E-Procurement Solution for Businesses</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="<?= base_url('assets_u/biz_homepage/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets_u/biz_homepage/css/fontawesome-all.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets_u/biz_homepage/css/swiper.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets_u/biz_homepage/css/magnific-popup.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets_u/biz_homepage/css/styles.css')?>" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="<?=base_url();?>"><img src="<?= base_url('assets_u/biz_homepage/images/Untitled design (7).png')?>" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#request">Request</a>
                </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">Terms Conditions</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">Privacy Policy</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=base_url('home/login')?>">Login</a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://web.facebook.com/vayznofficial">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://twitter.com/vayznofficial">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">Ease your Purchasing Process</span> <br/> With Vayzn E-Procurement Solution</h1>
                            <p class="p-large">Efficient and Effective Vendor Sourcing is our Mantra and we are here to help your Procurement Process</p>
                            <a class="btn-solid-lg page-scroll" href="#services">DISCOVER</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/header-teamwork.svg')?>" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Trusted By</h5>
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="<?= base_url('assets_u/biz_homepage/images/customer-logo-1.png')?>" alt="alternative">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="<?= base_url('assets_u/biz_homepage/images/customer-logo-2.png')?>" alt="alternative">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="<?= base_url('assets_u/biz_homepage/images/customer-logo-3.png')?>" alt="alternative">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="<?= base_url('assets_u/biz_homepage/images/customer-logo-4.png')?>" alt="alternative">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="<?= base_url('assets_u/biz_homepage/images/customer-logo-5.png')?>" alt="alternative">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-container">
                                        <img class="img-responsive" src="<?= base_url('assets_u/biz_homepage/images/customer-logo-6.png')?>" alt="alternative">
                                    </div>
                                </div>
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of customers -->


    <!-- Services -->
    <div id="services" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Procurement Improvement Services</h2>
                    <p class="p-heading p-large">We serve the procurement dept. of the companies by speeding up their purchasing cycle and sourcing efficiency</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="<?= base_url('assets_u/biz_homepage/images/services-icon-1.svg')?>" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">One RFQ, many Suppliers </h4>
                            <p>Using Emails to get Quotations takes alot of time in data compilation. Vayzn allows the users to raise multiple RFQs in bulk, by simple One Click, which saves time</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="<?= base_url('assets_u/biz_homepage/images//services-icon-2.svg')?>" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Supplier Sourcing</h4>
                            <p>Results are effective when you have more quotations per RFQ. Our Supplier sourcing will allow the users to reach out to most suppliers with right expertise</p> 
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="<?= base_url('assets_u/biz_homepage/images/services-icon-3.svg')?>" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">ERP Integration</h4>
                            <p>Users can easily connect with their respective ERP softwares with our simple integration. Vayzn is compatible with SAP and Oracle ERP Systems.
							</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->


    <!-- Details 1 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Vayzn's features facilitate Procurement
						</h2>
                        <p>Vayzn's features are focused on providing you best data for informed purchasing. Use our platform and our expertise to improve your buying decisions and save cost & time.</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">FEATURES</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/details-1-office-worker.svg')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->
    

    <!-- Details Lightbox 1 -->
	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img width="563px" height="auto" src="<?= base_url('assets_u/biz_homepage/images/demo1.png')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Premium Services</h3>
                    <hr>
                    <h5>Core features</h5>
                    <p>The Procurement module basically will speed up your purchasing operations while offering more reporting options.</p>
                    <p>Do you need to raise RFQs on emails? It just got easier with Vayzn.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">One RFQ, Multiple Quotations</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Vendor Sourcing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Chatting Option for Negotiation</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Files Import/Export option</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Bids Comparative Analysis</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">ERP Integration</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    
    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/details-2-office-team-work.svg')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Best Reporting Features on the Go</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Transparent & Detailed reporting of your purchases</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">You need Suppliers' Info? Easy access with Vayzn Dashboard</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Export in Excel format for your extensive reporting</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">REPORTING</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->


    <!-- Details Lightbox 2 -->
	<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img src="<?= base_url('assets_u/biz_homepage/images/details-lightbox-2.svg')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Dashboard & Reports</h3>
                    <hr>
                    <h5>Core feature</h5>
                    <p>Vayzn believes that reporting is one the most important tool to check and monitor your progress.</p>
                    <p>Data Compipation & reporting in excel is hectic! Vayzn makes it easy for you.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy Dashboard Access</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Suppliers' Infographic</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Monitor your KPIs & Targets</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Monthly Progress with metrics</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Data download for desired period</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Users Efficieny Management</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 -->


    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Multiple Pricing Options</h2>
                    <p class="p-heading p-large">We've prepared pricing plans for all budgets so you can get started right away. They're great for small companies and large organizations</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">BASIC</div>
                            <div class="card-subtitle">Speed up Procurement process</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency">$</span><span class="value">199</span>
                                <div class="frequency">per user, yearly</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">One RFQ, Multiple Quotations</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Quick Dashboard & Reporting</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Import/Export files</div>
								</li>
	                            <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Chatting Feature</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">ERP Integration</div>
                                </li>
								<li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Sourcing Vendors</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="#request">REQUEST</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">ESSENTIAL</div>
                            <div class="card-subtitle">Allows to source more suppliers</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency">$</span><span class="value">299</span>
                                <div class="frequency">per user, yearly</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">One RFQ, Multiple Quotations</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Quick Dashboard & Reporting</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Import/Export files</div>
								</li>
	                            <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Chatting Feature</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">ERP Integration</div>
                                </li>
								<li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Sourcing Vendors</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="#request">REQUEST</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="label">
                            <p class="best-value">Best Value</p>
                        </div>
                        <div class="card-body">
                            <div class="card-title">COMPLETE</div>
                            <div class="card-subtitle">Affordable, yet complete solution</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <span class="currency">$</span><span class="value">399</span>
                                <div class="frequency">per user, yearly</div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">One RFQ, Multiple Quotations</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Quick Dashboard & Reporting</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Import/Export files</div>
								</li>
	                            <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Chatting Feature</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">ERP Integration</div>
                                </li>
								<li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Sourcing Vendors</div>
                                </li>
								
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="#request">REQUEST</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->


    <!-- Request -->
    <div id="request" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Fill The Following Form To Request A Meeting</h2>
                        <p>Vayzn is one of the easiest and feature packed procurement tool in the market. Discover what it can do for your business organization right away.</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Improve your procurement</strong> cycle and get results today</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Reach out to</strong> targeted Suppliers with transparency</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Have more options</strong> quotations</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body"><strong class="blue">Save precious time</strong> and invest it where you need it the most</div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">

                    <!-- Request Form -->
                    <div class="form-container">
                        <form id="requestForm" data-toggle="validator" action="<?=base_url()?>home/contactForm_process" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="rname" name="rname" required>
                                <label class="label-control" for="rname">Full name</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="remail" name="remail" required>
                                <label class="label-control" for="remail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="rphone" name="rphone" required>
                                <label class="label-control" for="rphone">Phone</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <select class="form-control-select" id="rselect" required name="intrested_in">
                                    <option class="select-option" value="" disabled selected>Interested in...</option>
                                    <option class="select-option" value="Basic">Basic</option>
                                    <option class="select-option" value="Essential">Essential</option>
                                    <option class="select-option" value="Complete">Complete</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="rterms" value="Agreed-to-Terms" name="rterms" required>I agree with Vayzn's stated <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms & Conditions</a>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">REQUEST</button>
                            </div>
                            <div class="form-message">
                                <div id="rmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form-container -->
                    <!-- end of request form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of request -->


    <!-- Video -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Check Out The Demo</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Video Preview -->
                    <div class="image-container">
                        <div class="video-wrapper">
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=81D8iEDvDVE&t=4s" data-effect="fadeIn">
                                <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/video-frame.svg')?>" alt="alternative">
                                <span class="video-play-button">
                                    <span></span>
                                </span>
                            </a>
                        </div> <!-- end of video-wrapper -->
                    </div> <!-- end of image-container -->
                    <!-- end of video preview -->

                    <p>This video will show you a case study for one of our <strong>Major Customers</strong> and will help you understand why your business needs Vayzn</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of video -->


    <!-- Testimonials -->
    <div class="slider-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/testimonials-2-men-talking.svg')?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <h2>Testimonials</h2>

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="<?= base_url('assets_u/biz_homepage/images/testimonial-1.svg')?>" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">I just finished my demo trial and was so amazed with the support and results.</p>
                                            <p class="testimonial-author">Judy Edwards - Procurement Manager</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="<?= base_url('assets_u/biz_homepage/images/testimonial-2.svg')?>" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Vayzn has position itself in the highly competitive market of Procurement platform. You will not regret using it!</p>
                                            <p class="testimonial-author">Rizwana Khan - Senior Manager Purchasing</p>
                                        </div>
                                    </div>        
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="<?= base_url('assets_u/biz_homepage/images/testimonial-3.svg')?>" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Vayzn helps to speed up the procurement process. This will be developed into a great platform in the future.</p>
                                            <p class="testimonial-author">Sadiq Seyal - Sourcing Manager</p>
                                        </div>
                                    </div>        
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
                               
                            </div> <!-- end of swiper-wrapper -->
        
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
        
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-2 -->
    <!-- end of testimonials -->


    <!-- About -->
    <div style="display:none" id="about" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>About The Team</h2>
                    <p class="p-heading p-large">Meat our team of specialized marketers and business developers which will help you research new products and launch them in new emerging markets</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/team-member-1.svg')?>" alt="alternative">
                        </div> <!-- end of image-wrapper -->
                        <p class="p-large"><strong>Lacy Whitelong</strong></p>
                        <p class="job-title">Business Developer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/team-member-2.svg')?>" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Chris Brown</strong></p>
                        <p class="job-title">Online Marketer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/team-member-3.svg')?>" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Sheila Zimerman</strong></p>
                        <p class="job-title">Software Engineer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?= base_url('assets_u/biz_homepage/images/team-member-4.svg')?>" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Mary Villalonga</strong></p>
                        <p class="job-title">Product Manager</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of about -->


    <!-- Contact -->
    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Information</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">Don't hesitate to give us a call or send us a contact form message</li>
                        <li><i class="fas fa-map-marker-alt"></i>405, Continental Trade Centre, Karachi, SD 75600, PK</li>
                        <li><i class="fas fa-phone"></i><a class="turquoise" href="tel:+923442662866">+92 344 2662866</a></li>
                        <li><i class="fas fa-envelope"></i><a class="turquoise" href="mailto:helpdesk@vayzn.com">helpdesk@vayzn.com</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="map-responsive">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.9664494362187!2d67.03255861431944!3d24.830820952561645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33dc87e37f449%3A0x51612c4e1d140de2!2sRaahat!5e0!3m2!1sen!2s!4v1567068263722!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    
                    <!-- Contact Form -->
                    <form id="contactForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I have read and agree with Vayzn's stated <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a> 
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <h4>About Vayzn</h4>
                        <p>We're passionate about offering best procurement platform for businesses</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Our business partners <a class="turquoise" href="vayzn.com">vayzn.com</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Read our <a class="turquoise" href="terms-conditions.html">Terms & Conditions</a>, <a class="turquoise" href="privacy-policy.html">Privacy Policy</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Social Media</h4>
                        <span class="fa-stack">
                            <a href="https://facebook.com/vayznofficial">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://twitter.com/vayznofficial">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span style="display:none" class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.instagram.com/vayznofficial">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.linkedin.com/company/13386239">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © Vayzn - Vayzn Premium - E-Procurement Solution for Businesses <a style="display:none" href="https://vayzn.com">Inovatik</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="<?= base_url('assets_u/biz_homepage/js/jquery.min.js')?>"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?= base_url('assets_u/biz_homepage/js/popper.min.js')?>"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="<?= base_url('assets_u/biz_homepage/js/bootstrap.min.js')?>"></script> <!-- Bootstrap framework -->
    <script src="<?= base_url('assets_u/biz_homepage/js/jquery.easing.min.js')?>"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?= base_url('assets_u/biz_homepage/js/swiper.min.js')?>"></script> <!-- Swiper for image and text sliders -->
    <script src="<?= base_url('assets_u/biz_homepage/js/jquery.magnific-popup.js')?>"></script> <!-- Magnific Popup for lightboxes -->
    <script src="<?= base_url('assets_u/biz_homepage/js/validator.min.js')?>"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="<?= base_url('assets_u/biz_homepage/js/scripts.js')?>"></script> <!-- Custom scripts -->
</body>
</html>
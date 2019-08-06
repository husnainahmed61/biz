
<!-- BANNER 
<div class="banner-wrap banner-cs">
    <section class=" banner-v2 container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <h5>Register now and start</h5>
                <h1><span>Buying and Selling</span></h1>

                <form class="search-widget-form">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-lg-6 cetegory-cs">
                                <input class="" type="text" name="category_name" placeholder="Search goods or services here...">
                            </div>
                            <label for="categories" class="select-block col-lg-3 0 d-none d-lg-block d-xl-block">
                                <select name="categories" id="categories">
                                    <option value="0">All Categories</option>
                                    <option value="1">PSD Templates</option>
                                    <option value="2">Hero Images</option>
                                    <option value="3">Shopify</option>
                                    <option value="4">Icon Packs</option>
                                    <option value="5">Graphics</option>
                                    <option value="6">Flyers</option>
                                    <option value="7">Backgrounds</option>
                                    <option value="8">Social Covers</option>
                                </select>
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                            </label>
                            <div class="col-lg-3 btn-search">
                                <button class="button medium primary">Search Now!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </section>
</div>
/BANNER -->

<div class="carousel-wrap home-banner-main hidden-sm visible-md visible-lg">
  <div class="owl-carousel home-top-banner">
    
      <div class="item"><img class="full-width" src="<?=$base_resources_url_slider?>1.webp"></div>
      <div class="item"><img class="full-width" src="<?=$base_resources_url_slider?>2.webp"></div>
      <div class="item"><img class="full-width" src="<?=$base_resources_url_slider?>3.webp"></div>
    
  </div>
</div>

<!-- CATEGORY NAV -->

<!-- /CATEGORY NAV -->

<div class="category-nav-wrap tabs-cs main-tabs-cs hidden-sm visible-md visible-lg">
    <div class=" primary container">
        <div class="category-tabs col-lg-6 col-md-10 div-center">
            <div class="col-md-3 category-tab"><button value="trending" class="button medium primary categoryType">Trending</button></div>
            <div class="col-md-3 category-tab"><button value="recent" class="button medium primary categoryType active">Recent  </button></div>
            <div class="col-md-3 category-tab"><button value="nearest" class="button medium primary categoryType">Nearest </button></div>
            <div class="col-md-3 category-tab"><button value="following" class="button medium primary categoryType">Following</button></div>
        </div>
        
    </div>
</div>
<div class="category-nav-wrap tabs-cs main-tabs-cs hidden-md hidden-lg">
    <div class=" primary container">
        <div class="icon-bar">
          <a href="#" class="categoryType " value="trending"><i class="fa fa-flash"></i><span>Trending</span></a> 
          <a href="#" class="categoryType active" value="recent"><i class="fa fa-history"></i><span>  Recent  </span></a> 
          <a href="#" class="categoryType" value="nearest"><i class="fa fa-map-marker"></i><span> Nearest </span></a> 
          <a href="#" class="categoryType" value="following"><i class="fa fa-star-o"></i><span>Following</span></a>
        </div>
        <!-- <div class="row">
            
            <div class="col-sm-3 category-tab"><button value="trending" class="button medium primary categoryType">Trending h</button></div>
            <div class="col-sm-3 category-tab"><button value="recent" class="button medium primary categoryType active">Recent h </button></div>
            <div class="col-sm-3 category-tab"><button value="nearest" class="button medium primary categoryType">Nearest h</button></div>
            <div class="col-sm-3 category-tab"><button value="following" class="button medium primary categoryType">Followingh</button></div>
        </div> -->
    </div>
</div>


<div class=" tabs-cs inner-tabs-cs">
    <div class=" primary container">
        <div class="category-tabs col-lg-6 col-md-10 div-center">
            <div class="col-xs-6 col-6 category-tab"><button value="buy" class="button medium primary categoryMode f-right">For Buy</button></div>
            <div class="col-xs-6 col-6 category-tab"><button value="sell" class="button medium primary categoryMode f-left">For Sell</button></div>
        </div>

    </div>
</div>


<div class="container tabs-home-cs">
    <div class="product-showcase row">
        <!-- PRODUCT LIST -->
        <div class="product-list grid row" id="producstListResponse">
            <p id="demo"></p>
        </div>
        <!-- /PRODUCT LIST -->
        <button class="button big dark loadMore" style=""><span>Load More </span></button>
    </div>
</div>



<!-- <div class="container">
    <div class="row text-center">
        <div class="col-md-4"><button value="trending" class="button medium primary categoryType">Trending</button></div>
        <div class="col-md-4"><button value="recent" class="button medium primary categoryType">Recent  </button></div>
        <div class="col-md-4"><button value="nearest" class="button medium primary categoryType">Nearest </button></div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-md-6"><button value="buy" class="button medium primary categoryMode">Buy</button></div>
        <div class="col-md-6"><button value="sell" class="button medium primary categoryMode">Sell</button></div>
    </div>
</div>


<div class="container">
    <div class="product-showcase row">
        PRODUCT LIST
        <div class="product-list grid row" id="producstListResponse">

        </div>
        /PRODUCT LIST
        <button class="button big dark loadMore" style=""><span>Load More </span>trendingResponse</button>
    </div>
</div>

 -->

<!-- PRODUCT SIDESHOW -->
<div id="product-sideshow-wrap " class="container tab-content-cs" style="display: none;">
    <div id="product-sideshow">
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase tabbed">
            <!-- PRODUCT LIST -->
            <div class="product-list grid row" id="trendingResponse">
                <h3>trendingResponse</h3>
            </div>
            <!-- /PRODUCT LIST -->
            <button class="button big dark loadMore" style=""><span>Load More </span>trendingResponse</button>
        </div>
        <!-- /PRODUCT SHOWCASE -->
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase tabbed">
            <!-- PRODUCT LIST -->
            <div class="product-list grid row" id="recentResponse">
                <!-- PRODUCT ITEM -->
                <h3>recentResponse</h3>
                <!-- PRODUCT ITEM -->
            </div>
            <!-- /PRODUCT LIST -->
            <button class="button big dark loadMore" style=""><span>Load More </span>recentResponse</button>
        </div>
        <!-- /PRODUCT SHOWCASE -->
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase tabbed">
            <!-- PRODUCT LIST -->
            <div class="product-list grid row" id="nearResponse">
            </div>
            <!-- PRODUCT LIST -->
            <button class="button big dark loadMore" style=""><span>Load More </span>nearResponse</button>
        </div>
        <!-- /PRODUCT SHOWCASE -->
    </div>
</div>
<!-- /PRODUCT SIDESHOW -->

<!-- SERVICES -->
<div id="services-wrap" class="sevice-man-cs">
    <section id="" class="services-v2 container">
        <!-- SERVICE LIST -->
        <div class="service-list small row">
            <!-- SERVICE ITEM -->
            <div class="service-item column col-md-12 col-lg-4 col-xl-4">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <span class="icon-present"></span>
                </div>
                <h3>Buy &amp; Sell Easily</h3>
                <p>Browse & Search the items you want to Buy/Sell, and bid on the ads.</p>
            </div>
            <!-- /SERVICE ITEM -->

            <!-- SERVICE ITEM -->
            <div class="service-item column col-md-12 col-lg-4 col-xl-4">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <span class="icon-plus"></span>
                </div>
                <h3>Create Ad</h3>
                <p>Logon and Click on the button in header to create Ads (will take only 1 min).</p>
            </div>
            <!-- /SERVICE ITEM -->

            <!-- SERVICE ITEM -->
            <div class="service-item column col-md-12 col-lg-4 col-xl-4">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <span class="icon-like"></span>
                </div>
                <h3>Products Control</h3>
                <p>We monitor all the ads for you to keep quality products for you on the platform.</p>
            </div>
            <!-- /SERVICE ITEM -->

            <!-- SERVICE ITEM -->
            <div class="service-item column col-md-12 col-lg-4 col-xl-4">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <span class="icon-diamond"></span>
                </div>
                <h3>Quality Platform</h3>
                <p>Rating and Comments on Ads will allow you to assess the User’s profile.</p>
            </div>
            <!-- /SERVICE ITEM -->

            <!-- SERVICE ITEM -->
            <div class="service-item column col-md-12 col-lg-4 col-xl-4">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <span class="icon-earphones-alt"></span>
                </div>
                <h3>Assistance 24/7</h3>
                <p>We are open 24/7, contact us at email and WhatsApp for any assistance.</p>
            </div>
            <!-- /SERVICE ITEM -->

            <!-- SERVICE ITEM -->
            <div class="service-item column col-md-12 col-lg-4 col-xl-4">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <span class="icon-bubble"></span>
                </div>
                <h3>Support Forums</h3>
                <p>JJoin our Facebook Group for the support forum and discuss shopping trends.</p>
            </div>
            <!-- /SERVICE ITEM -->
        </div>
        <!-- /SERVICE LIST -->
        <div class="clearfix"></div>
    </section>
</div>
<!-- /SERVICES -->
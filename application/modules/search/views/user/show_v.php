<?php
// echo "<pre>";
// print_r($data);
// exit();
?>

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap section-headline-main">
    <div class="container">
        <div class="section-headline row">
            <div class="col-sm-6">
                <h2>Search</h2>
            </div>
            <div class="col-sm-6 s">
                <p >Search Results For : <span id="searchTerm"><?=$searchTerm?></span> </p>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION HEADLINE -->
<div class="container">
    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section">
            <div class="row">
                
                <!-- CONTENT -->
                <div class="col-lg-12 content search-content">
                    <!-- HEADLINE -->
                    
                    <div class="headline primary">
                        
                         <div class="row">
                            <div class="col-sm-6">
                        <h4 class="total_products"></h4>
                        </div>
                        <div class="col-sm-6">
                        <form id="shop_filter_form" name="shop_filter_form">
                            
                                <div class="col-lg-4 col-md-4 col-sm-3 box">
                                    <label for="itemspp_filter" class="select-block">
                                        <select name="itemspp_filter" id="input_post_type">
                                            <option selected disabled>Auction Type</option>
                                            <option value="sell">Selling Auctions</option>
                                            <option value="buy">Buying Posts</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-3 box">
                                    <label for="input-sort" class="select-block">
                                        <select id="input-sort">
                                            <?php foreach ($sort AS $key => $item) {
                                                $selected = ($key == 0) ? "selected" : "";
                                                if ($postType == 'sell' && ($key == 2 || $key == 3)) {
                                                    continue;
                                                    ?>

                                                    <option value="<?= $key + 1 ?>" <?= $selected ?> ><?= $item['text'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $key + 1 ?>" <?= $selected ?> ><?= $item['text'] ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-3 box">
                                    <label for="itemspp_filter" class="select-block">
                                        <select name="itemspp_filter" id="input-currency">
                                            <option selected value="">-Select Currency-</option>
                                            <?php foreach ($currency AS $key => $item) {
                                                //$selected = ($key == 0) ? "selected" : "" ;

                                                ?>
                                                <option value="<?= $item['name'] ?>" <?= $selected ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                            
                        </form>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        
                    </div>
                    
                    <!-- /HEADLINE -->

                    <!-- PRODUCT SHOWCASE -->
                    <div class="product-showcase tabbed">
                        <!-- PRODUCT LIST -->
                        <div class="product-list grid auctions-list">

                        </div>
                        <!-- /PRODUCT LIST -->
                    </div>



                    <!-- /PRODUCT SHOWCASE -->

                    <!-- PAGER -->
                    <!-- <div class="pagination pager primary" id="pagination">
                    </div> -->
                    <ul class="pager primary pagination" id="pagination">

<!--                         <div class="pager-item"><p>1</p></div>
                        <div class="pager-item active"><p>2</p></div>
                        <div class="pager-item"><p>3</p></div>
                        <div class="pager-item"><p>...</p></div>
                        <div class="pager-item"><p>17</p></div> -->
                    </ul>

                    <div class="pagination_details"></div>

                    <!-- <ul class="pager primary pagination">
                    </ul> -->
                    <input type="hidden" name="" id="input-limit" value="12">
                    <!-- /PAGER -->
                </div>
                <!-- CONTENT -->


            </div>
        </div>
    </div>
    <!-- /SECTION -->
</div>

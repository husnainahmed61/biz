<?php
// echo "<pre>";
// print_r($data);
// exit();
?>
<style>

</style>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap section-headline-main">
    <div class="container">
        <div class="section-headline row">
            <div class="col-sm-6">
                <h2><?= $name ?></h2>
            </div>
            <div class="col-sm-6 s">
                <p>Categories
                    <span class="separator">/</span>
                    <span class="current-section"><?= $name ?></span></p>
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
                <!-- SIDEBAR -->
                <div class="sidebar col-12 col-lg-3 ">

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item">
                        <h4>Filter Products</h4>
                        
                        <a href="#filter-popup" id="filter-pop" data-mfp-src="#filter-popup"
                           class="button secondary mid-short secondary filter-popup"
                        >Filters</a>
                    </div>
                        <?php
                        if (!empty($attributes)) {
                            ?>
                            
                            <?php
                            foreach ($attributes AS $key => $item) {
                                $class = $key == 0 ? "dcjq-current-parent" : "";
                                ?>
                                <div class="sidebar-item  filters-list">
                                    <li class="custom-parent-li  <?= $class ?>" style="list-style: none;">
                                        <h6><?= $item['name'] ?></h6>
                                        <ul>
                                            <?php
                                            foreach ($item['attr_values'] AS $key2 => $item2) {
                                                ?>
                                                <li class="attributes filter">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="<?= strtolower($item['name']) . "_" . $key2 ?>"
                                                               type="checkbox"
                                                               name="attr_<?= $item['id'] ?>[]"
                                                               value="<?= !empty($item2['id']) ? $item2['id'] : $item2['value']; ?>"/>
                                                        <label for="<?= strtolower($item['name']) . "_" . $key2 ?>">
                                                            <span class="checkbox primary primary"><span></span></span>
                                                            <?= $item2['value'] ?>
                                                            <span class="quantity"></span>
                                                        </label>
                                                    </div>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </li>
                                </div>
                                <?php
                            }

                            ?>
                            <?php
                        }
                        else {
                            ?>
                            <div class="sidebar-item">
                                <li class="custom-parent-li" style="list-style: none;font-family: 'Titillium Web', 'sans-serif' !important; "> No Filters Available</li>
                            </div>
                            <?php
                        }
                        ?>
                    
                    <!-- /SIDEBAR ITEM -->


                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item range-feature price-range-cs">
                        <h4>Price Range</h4>
                        <hr class="line-separator spaced">
                        <div class="">
                            <input type="hidden" class="price-range-slider" value="20000">
                        </div>
                        <button class="button mid primary filter_search">Update your Search</button>
                    </div>
                    <!-- /SIDEBAR ITEM -->
                </div>
                <!-- /SIDEBAR -->
                <!-- CONTENT -->
                <div class="content col-12 col-lg-9">
                    <!-- HEADLINE -->
                    <div class="headline primary">
                        <h4 class="total_products"></h4>
                        <!-- VIEW SELECTORS -->
                        <div class="view-selectors">
                        </div>
                        <!-- /VIEW SELECTORS -->
                        <form id="shop_filter_form" name="shop_filter_form">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 box">
                                    <label for="itemspp_filter" class="select-block">
                                        <select name="itemspp_filter" id="input_post_type">
                                            <option value="sell" selected>Selling Auctions</option>
                                            <option value="buy">Buying Posts</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 box">
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
                                <div class="col-lg-4 col-md-4 box">
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
                            </div>
                        </form>
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


<!-- FORM POPUP -->
<div id="filter-popup" class="form-popup login mfp-hide">
    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Filters</h4>
        <!-- LINE SEPARATOR -->
<!--        <hr class="line-separator">-->
        <!-- /LINE SEPARATOR -->
        <div class="sidebar col-12 col-lg-3 ">
            <?php
            if (!empty($attributes)) {
                foreach ($attributes AS $key => $item) {
                    $class = $key == 0 ? "dcjq-current-parent" : "";
                    ?>
                    <div class="sidebar-item  filters-list">
                        <li class="custom-parent-li  <?= $class ?>" style="list-style: none;">
                            <h6><?= $item['name'] ?></h6>
                            <ul>
                                <?php
                                foreach ($item['attr_values'] AS $key2 => $item2) {
                                    ?>
                                    <li class="attributes filter">
                                        <div class="checkbox checkbox-primary">
                                            <input id="<?= strtolower($item['name']) . "_" . $key2 ?>"
                                                   type="checkbox"
                                                   name="attr_<?= $item['id'] ?>[]"
                                                   value="<?= !empty($item2['id']) ? $item2['id'] : $item2['value']; ?>"/>
                                            <label for="<?= strtolower($item['name']) . "_" . $key2 ?>">
                                                <span class="checkbox primary primary"><span></span></span>
                                                <?= $item2['value'] ?>
                                                <span class="quantity"></span>
                                            </label>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                    </div>
                    <?php
                }
            }
            else {
                ?>
                <div class="sidebar-item">
                    <li class="custom-parent-li"> No Filters Available</li>
                </div>
                <?php
            }
            ?>
            <!-- /SIDEBAR ITEM -->

            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item range-feature price-range-cs">
                <h4>Price Range</h4>
                <hr class="line-separator spaced">
                <div class="">
                    <input type="hidden" class="price-range-slider" value="500">
                </div>
                <button class="button mid primary filter_search">Update your Search</button>
            </div>
            <!-- /SIDEBAR ITEM -->
        </div>


    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->

<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 05-Apr-18
 * Time: 11:49 PM
 */
?>

<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.html" itemprop="url"><span
                            itemprop="title"><i class="fa fa-home"></i></span></a></li>
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="category.html" itemprop="url"><span
                            itemprop="title">Electronics</span></a></li>
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="product.html" itemprop="url"><span
                            itemprop="title">Laptop Silver black</span></a></li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <div itemscope itemtype="http://schema.org/Product">
                    <h1 class="title" itemprop="name">Laptop Silver black</h1>
                    <div class="row product-info">
                        <div class="col-sm-4">
                            <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01"
                                                    src="<?= base_url("assets_u/image/product/macbook_air_1-350x350.jpg"); ?>"
                                                    title="Laptop Silver black" alt="Laptop Silver black"
                                                    data-zoom-image="<?= base_url("assets_u/image/product/macbook_air_1-500x500.jpg"); ?>"/>
                            </div>
                            <div class="center-block text-center"><span class="zoom-gallery"><i
                                            class="fa fa-search"></i> Click image for Gallery</span></div>
                            <div class="image-additional" id="gallery_01">
                                <a class="thumbnail" href="#"
                                   data-zoom-image="<?= base_url("assets_u/image/product/macbook_air_1-500x500.jpg"); ?>"
                                   data-image="<?= base_url("assets_u/image/product/macbook_air_1-350x350.jpg"); ?>"
                                   title="Laptop Silver black"> <img
                                            src="<?= base_url("assets_u/image/product/macbook_air_1-66x66.jpg"); ?>"
                                            title="Laptop Silver black" alt="Laptop Silver black"/></a> <a
                                        class="thumbnail"
                                        href="#"
                                        data-zoom-image="<?= base_url("assets_u/image/product/macbook_air_4-500x500.jpg"); ?>"
                                        data-image="<?= base_url("assets_u/image/product/macbook_air_4-350x350.jpg"); ?>"
                                        title="Laptop Silver black"><img
                                            src="<?= base_url("assets_u/image/product/macbook_air_4-66x66.jpg"); ?>"
                                            title="Laptop Silver black" alt="Laptop Silver black"/></a> <a
                                        class="thumbnail"
                                        href="#"
                                        data-zoom-image="<?= base_url("assets_u/image/product/macbook_air_2-500x500.jpg"); ?>"
                                        data-image="<?= base_url("assets_u/image/product/macbook_air_2-350x350.jpg"); ?>"
                                        title="Laptop Silver black"><img
                                            src="<?= base_url("assets_u/image/product/macbook_air_2-66x66.jpg"); ?>"
                                            title="Laptop Silver black" alt="Laptop Silver black"/></a> <a
                                        class="thumbnail"
                                        href="#"
                                        data-zoom-image="<?= base_url("assets_u/image/product/macbook_air_3-500x500.jpg"); ?>"
                                        data-image="<?= base_url("assets_u/image/product/macbook_air_3-350x350.jpg"); ?>"
                                        title="Laptop Silver black"><img
                                            src="<?= base_url("assets_u/image/product/macbook_air_3-66x66.jpg"); ?>"
                                            title="Laptop Silver black" alt="Laptop Silver black"/></a></div>
                        </div>
                        <div class="col-sm-8">
                            <ul class="list-unstyled list-inline details">
                                <li>
                                    <span class="name">no. of bids:</span>
                                    <span class="value" itemprop="brand">983</span>
                                </li>
                                <li>
                                    <span class="name">Start at: </span>
                                    <span class="value">15-Apr-18</span>
                                </li>
                                <li data-toggle="tooltip" title="" data-original-title="Bid Before">
                                    <span class="name">Expire at: </span>
                                    <span class="value">Apr 30 '18</span>
                                </li>
                            </ul>
                            <ul class="price-box">
                                <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span
                                            class="price-old">$1,202.00</span> <span itemprop="price">$1,142.00<span
                                                itemprop="availability" content="In Stock"></span></span></li>
                                <li></li>
                                <li>Ex Tax: $950.00</li>
                            </ul>
                            <div class="rating" itemprop="aggregateRating" itemscope
                                 itemtype="http://schema.org/AggregateRating">
                                <meta itemprop="ratingValue" content="0"/>
                                <p><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                class="fa fa-star-o fa-stack-1x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                class="fa fa-star-o fa-stack-1x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                class="fa fa-star-o fa-stack-1x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                class="fa fa-star-o fa-stack-1x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <a
                                            onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;"
                                            href=""><span itemprop="reviewCount">1 reviews</span></a> / <a
                                            onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;"
                                            href="">Write a review</a></p>
                            </div>

                            <form class="form-horizontal bid-form">
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="bid-amount" class="control-label">Bid Amount</label>
                                        <input type="text" class="form-control" id="bid-amount" value="" name="name">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="bid-description" class="control-label">Description</label>
                                        <textarea class="form-control" id="bid-description" rows="5"
                                                  name="text" ></textarea>
                                        <div class="help-block"><span class="text-danger">Note:</span> HTML is not
                                            translated!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="confirm_agree">
                                            <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                            <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="pull-right">
                                            <button class="btn btn-primary btn-lg" id="button_bid" type="button">Bid
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- AddThis Button BEGIN -->
                            <!--                            <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>-->
                            <!--                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>-->
                            <!-- AddThis Button END -->
                        </div>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                        <li><a href="#tab-specification" data-toggle="tab">Specification</a></li>
                        <li><a href="#tab-review" data-toggle="tab">Reviews (2)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div itemprop="description" id="tab-description" class="tab-pane active">
                            <div>
                                <p><b>Intel Core 2 Duo processor</b></p>
                                <p>Powered by an Intel Core 2 Duo processor at speeds up to 2.16GHz, the new MacBook is
                                    the fastest ever.</p>
                                <p><b>1GB memory, larger hard drives</b></p>
                                <p>The new MacBook now comes with 1GB of memory standard and larger hard drives for the
                                    entire line perfect for running more of your favorite applications and storing
                                    growing media collections.</p>
                                <p><b>Sleek, 1.08-inch-thin design</b></p>
                                <p>MacBook makes it easy to hit the road thanks to its tough polycarbonate case,
                                    built-in wireless technologies, and innovative MagSafe Power Adapter that releases
                                    automatically if someone accidentally trips on the cord.</p>
                                <p><b>Built-in iSight camera</b></p>
                                <p>Right out of the box, you can have a video chat with friends or family,2 record a
                                    video at your desk, or take fun pictures with Photo Booth</p>
                            </div>
                        </div>
                        <div id="tab-specification" class="tab-pane">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td colspan="2"><strong>Memory</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>test 1</td>
                                    <td>8gb</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td colspan="2"><strong>Processor</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>No. of Cores</td>
                                    <td>1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-review" class="tab-pane">
                            <form class="form-horizontal">
                                <div id="review">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong><span>harvey</span></strong></td>
                                                <td class="text-right"><span>20/01/2016</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a type
                                                        specimen book.</p>
                                                    <div class="rating"><span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong><span>Andrson</span></strong></td>
                                                <td class="text-right"><span>20/01/2016</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a type
                                                        specimen book.</p>
                                                    <div class="rating"><span class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star fa-stack-2x"></i><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                                class="fa fa-stack"><i
                                                                    class="fa fa-star-o fa-stack-2x"></i></span></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right"></div>
                                </div>
                                <h2>Write a review</h2>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="input-name" class="control-label">Your Name</label>
                                        <input type="text" class="form-control" id="input-name" value="" name="name">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="input-review" class="control-label">Your Review</label>
                                        <textarea class="form-control" id="input-review" rows="5"
                                                  name="text"></textarea>
                                        <div class="help-block"><span class="text-danger">Note:</span> HTML is not
                                            translated!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label class="control-label">Rating</label>
                                        &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                        <input type="radio" value="1" name="rating">
                                        &nbsp;
                                        <input type="radio" value="2" name="rating">
                                        &nbsp;
                                        <input type="radio" value="3" name="rating">
                                        &nbsp;
                                        <input type="radio" value="4" name="rating">
                                        &nbsp;
                                        <input type="radio" value="5" name="rating">
                                        &nbsp;Good
                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <button class="btn btn-primary" id="button-review" type="button">Continue
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h3 class="subtitle">Related Products</h3>
                    <div class="owl-carousel related_pro">
                        <div class="product-thumb">
                            <div class="image"><a href="product.html"><img
                                            src="<?= base_url("assets_u/image/product/samsung_tab_1-200x200.jpg"); ?>"
                                            alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop"
                                            class="img-responsive"/></a></div>
                            <div class="caption">
                                <h4><a href="product.html">Aspire Ultrabook Laptop</a></h4>
                                <p class="price"><span class="price-new">$230.00</span> <span
                                            class="price-old">$241.99</span> <span class="saving">-5%</span></p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i
                                                class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i
                                                class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image"><a href="product.html"><img
                                            src="<?= base_url("assets_u/image/product/macbook_pro_1-200x200.jpg"); ?>"
                                            alt=" Strategies for Acquiring Your Own Laptop "
                                            title=" Strategies for Acquiring Your Own Laptop " class="img-responsive"/></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html"> Strategies for Acquiring Your Own Laptop </a></h4>
                                <p class="price"><span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span>
                                    <span class="saving">-26%</span></p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i
                                                class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i
                                                class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image"><a href="product.html"><img
                                            src="<?= base_url("assets_u/image/product/macbook_1-200x200.jpg"); ?>"
                                            alt="Ideapad Yoga 13-59341124 Laptop"
                                            title="Ideapad Yoga 13-59341124 Laptop" class="img-responsive"/></a></div>
                            <div class="caption">
                                <h4><a href="product.html">Ideapad Yoga 13-59341124 Laptop</a></h4>
                                <p class="price"> $2.00 </p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i
                                                class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i
                                                class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image"><a href="product.html"><img
                                            src="<?= base_url("assets_u/image/product/ipod_shuffle_1-200x200.jpg"); ?>"
                                            alt="Hp Pavilion G6 2314ax Notebok Laptop"
                                            title="Hp Pavilion G6 2314ax Notebok Laptop" class="img-responsive"/></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">Hp Pavilion G6 2314ax Notebok Laptop</a></h4>
                                <p class="price"> $122.00 </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i
                                                class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i
                                                class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image"><a href="product.html"><img
                                            src="<?= base_url("assets_u/image/product/ipod_touch_1-200x200.jpg"); ?>"
                                            alt="Samsung Galaxy S4" title="Samsung Galaxy S4"
                                            class="img-responsive"/></a></div>
                            <div class="caption">
                                <h4><a href="product.html">Samsung Galaxy S4</a></h4>
                                <p class="price"><span class="price-new">$62.00</span> <span
                                            class="price-old">$122.00</span> <span class="saving">-50%</span></p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i
                                                class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i
                                                class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-thumb">
                            <div class="image"><a href="product.html"><img
                                            src="<?= base_url("assets_u/image/product/ipod_shuffle_1-200x200.jpg"); ?>"
                                            alt="Hp Pavilion G6 2314ax Notebok Laptop"
                                            title="Hp Pavilion G6 2314ax Notebok Laptop" class="img-responsive"/></a>
                            </div>
                            <div class="caption">
                                <h4><a href="product.html">Hp Pavilion G6 2314ax Notebok Laptop</a></h4>
                                <p class="price"> $122.00 </p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i
                                                class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i
                                                class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Middle Part End -->

        </div>
    </div>
</div>



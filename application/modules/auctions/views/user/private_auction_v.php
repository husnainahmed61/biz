<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 8/5/2018
 * Time: 8:18 PM
 */
$user_id = $this->session->userdata("user_login");
$user_id = $user_id['id'];
//echo $user_id;
if (!empty($user_id)) {
    $user_id = $user_id;
}
else {
    $user_id = '';
}
?>


<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.html" itemprop="url"><span
                        itemprop="title"><i class="fa fa-home"></i></span></a></li>
            <li><a href="<?= base_url('/profile') ?>"><span>My Profile</span></a></li>
            <li><a href="<?= base_url('/auctions') ?>"><span>My Auctions</span></a></li>
        </ul>
        <!-- Breadcrumb End-->
        <?php
        if (isset($post) && !empty($post)) {
            if ($type == 'sell') {
                if ($bidType == 'free' || $bidType == 'range') {
                    $price = $currency . ' ' . $amount;
                }

                else if ($bidType == 'incremental') {
                    $price = $currency . ' ' . $currentPrice;
                }
            }

            else {
                $price = '';
            }
            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php
                    $msgType = $this->session->flashdata('msgType');
                    $msg = $this->session->flashdata('msg');
                    if (!empty($msgType) && !empty($msg)) {
                        ?>
                        <div class="alert alert-<?= $msgType ?>" role="alert">
                            <?= $msg ?>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <div itemscope itemtype="http://schema.org/Product">
                        <h1 class="title" itemprop="name"><?= $post['name'] ?></h1>
                        <div class="row product-info">
                            <div class="col-sm-4">
                                <div class="image">
                                    <img class="img-responsive" itemprop="image" id="zoom_01"
                                        src="<?= $resources_path."images/auctions/".$images['image_md_1'] ?>"
                                        title="<?= $post['name'] ?>" alt="<?= $post['name'] ?>"
                                        data-zoom-image="<?= $resources_path."images/auctions/".$images['image_lg_1'] ?>"/>
                                </div>
                                <div class="center-block text-center"><span class="zoom-gallery"><i
                                            class="fa fa-search"></i> Click image for Gallery</span></div>
                                <div class="image-additional" id="gallery_01">

                                    <?php
                                    for($i=1; $i<=5; $i++):
                                        if(isset($images['image_lg_'.$i.'']) && !empty($images['image_lg_'.$i.''])):

                                            ?>
                                            <a class="thumbnail" href="#"
                                               data-zoom-image="<?= $resources_path."images/auctions/".$images['image_lg_'.$i.''] ?>"
                                               data-image="<?= $resources_path."images/auctions/".$images['image_md_'.$i.''] ?>"
                                               title="<?= $post['name'] ?>">
                                                <img
                                                    src="<?= $resources_path."images/auctions/".$post['image_sm_'.$i.''] ?>"
                                                    title="<?= $post['name'] ?>" alt="<?= $post['name'] ?>"/>
                                            </a>

                                            <?php
                                        endif;
                                    endfor;
                                    ?>


                                </div>
                            </div>
                            <div class="col-sm-8">
                                <ul class="price-box">
                                    <?php if(isset($price) && !empty($price)): ?>
                                    <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <span itemprop="price"><?= $price ?>
                                            <span
                                                itemprop="availability" content="In Stock"></span></span></li>
                                    <li></li> 
                                    <?php endif; ?>           
                                    <li data-toggle="tooltip" title="" data-original-title="Bid Before">
                                        <span class="name"><b>Expire at : </b></span>
                                        <span class="value"><?= $expiresAt[0] ?></span>
                                    </li>

                                    <li data-toggle="tooltip" title="" data-original-title="Bid Before">
                                        <span class="name"><b>Quantity : </b></span>
                                        <span class="value"><?= $post['qty'].' '. $post['qty_unit']?></span>
                                    </li>
                                    <li data-toggle="tooltip" title="" data-original-title="Bid Before">
                                        <span class="name"><b>Condition : </b></span>
                                        <span class="value"><?= $post['condition']?></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="name"><b>Code : </b></span>
                                        <span class="value"><?=$post['code'] ?></span>
                                    </li>
                                    <li>
                                        <span class="name"><b>Bids : </b></span>
                                        <span class="value" itemprop="brand"><?= $post['bid_count'] ?></span>
                                    </li>
                                    <li>
                                        <span class="name"><b>Start at : </b></span>
                                        <span class="value"><?= $startAt[0] ?></span>
                                    </li>
                                    
                                </ul>
                                
                                <div class="rating" itemprop="aggregateRating" itemscope
                                     itemtype="http://schema.org/AggregateRating">
                                    <meta itemprop="ratingValue" content="0"/>
                                    <p>
                                        <?php
                                        

                                    //$totalRating
                                    $formula = $post['average_rating'];
                                    $emptyStars = 5-$formula;
                                    //echo ceil($formula);
                                    //echo $emptyStars;
                                    for ($i=1; $i <= $formula; $i++) {
                                    ?>
                                    <span class="fa fa-stack">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    <?php
                                    }
                                    for ($i=1 ; $i <= $emptyStars; $i++) {
                                     ?>
                                     <span class="fa fa-stack">
                                            <i class="far fa-star"></i>
                                        </span>
                                     <?php
                                    }
                                     //print_r($c);
                                

                                ?>
                                        </p>
                                </div>



                                <!-- AddThis Button BEGIN -->
                                <!--                            <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>-->
                                <!--                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>-->
                                <!-- AddThis Button END -->
                            </div>
                        </div>

                        <ul class="nav nav-tabs" >
                            <li class="active"><a href="#tab-description" data-toggle="tab">Descriptions</a></li>
                            <li><a href="#tab-bids" data-toggle="tab">Bids</a></li>
                            <li style="display: none;"><a href="#tab-specification" data-toggle="tab">Specification</a></li>
                            <li ><a href="#tab-review" data-toggle="tab">Reviews ( <?=$post['rating_count'] ?> )</a></li>
                        </ul>

                        <div class="tab-content" >
                            <div itemprop="description" id="tab-description" class="tab-pane active">
                                <div>
                                    <p><?= $post['description'] ?></p>
                                </div>
                            </div>


                            <div itemprop="bids" id="tab-bids" class="tab-pane">
                                <?php if(isset($bids) && !empty($bids)){ ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover ">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Bidder Name</th>
                                                        <th>User Rating</th>
                                                        <th>Bidder Type</th>
                                                        <th>Submission Date</th>
                                                        <th>Bid Code</th>
                                                        <th>Bid Amount</th> <!-- UZair Edit -->
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = 1;

                                                    foreach ($bids AS $bid):
                                                        $submissionDate = date('d-M-y', strtotime($bid['created_at']));
                                                        $status = $bid['status'];
                                                        $check = $this->bids->checkAnyAccept($bid['id']);
                                                        if($status !== 'cancel'):
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><a href="<?= base_url($bid['bidder']['slug'].'/merchant/')?>" target="_blank"> <?= $bid['bidder']['first_name'].' '. $bid['bidder']['last_name']?></a></td>
                                                                <td>
                                                                    <div class="rating">
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                                                                        <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                                                                        <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                                                                        <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                                                                        <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                                                                    </div>
                                                                </td>
                                                                <td><?= $bid['bidder']['type'] ?></td>
                                                                <td><?= $submissionDate; ?></td>
                                                                <td><?= $bid['code']?></td> <!-- UZair Edit -->
                                                                <td><?= $bid['currency'].' '.$bid['amount'] ?></td>
                                                                <td>
                        <span class="input-group-btn">
                            <!-- UZair Works starts-->
                            <a data-toggle="tooltip" title="" class="btn btn-primary recent-bid-details" data-original-title="Description" data-title="" data-load-url="<?=base_url("auctions/biddetail/".$bid['id']);?>"><i class="fa fa-info-circle"></i></a>
                            <?php if ($bid['expires_at'] > $currentDate): ?>
                                <?php if (isset($check) && !empty($check)){?>
                                    <a data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Accept" disabled=""><i class="fa fa-check-circle"></i></a>
                                <?php } else { ?>
                                    <form id="bid-accept-form" action="<?=base_url('auctions/action/'.$bid['id'])?>" method="POST">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="status" value="accept">
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Accept" ><i class="fa fa-check-circle"></i></button>
                                    </form>

                                    <form id="bid-cancel-form" action="<?=base_url('auctions/action/'.$bid['id'])?>" method="POST">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="status" value="cancel">
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Cancel" ><i class="fa fa-times-circle"></i></button>
                                    </form>


                                <?php } ?>
                            <?php endif;?>
                            <!-- UZair Works Ends-->
                        </span>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                        endif;
                                                    endforeach;

                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                <?php } else {?>

                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <span>No bids found.</span>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>


                            <div id="tab-specification" class="tab-pane" style="display: none;">
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

                                    <div id="review">
                                        <div>

                                        <?php if (isset($auctionReview) && !empty($auctionReview)) {
                                         foreach ($auctionReview as $key => $review) {  ?>

                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong><span><?=$review['name']?></span></strong></td>
                                                    <td class="text-right"><span><?=$review['created_at']?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><p><?=$review['description']?></p>
                                                        <div class="rating">
                                                            <?php 
                                                            $stars = $review['rating'];
                                                                for ($i=1; $i <= $stars ; $i++) { 
                                                            ?>        
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-2x">
                                                                </i>
                                                            </span>
                                                            <?php  
                                                        }
                                                             ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <?php } } ?>
                                        </div>
                                        <div class="text-right"></div>
                                    </div>
                                    <?php if (!empty($user_id) != $post['user_id']  ) { ?>
                                    <h2>Write a review</h2>
                                    <?php echo validation_errors(); ?>
                                    <form id="review_form">
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label for="input-name" class="control-label">Your Name</label>
                                            <input type="hidden" name="auction_id" id="auction_id" value="<?= $post['id'] ?>">
                                            <input type="hidden" name="user_id" id="user_id" value="<?=$user_id?>">
                                            <input type="text" class="form-control" id="input-name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label for="input-review" class="control-label">Your Review</label>
                                            <textarea class="form-control" id="input-review" rows="5" name="text" required></textarea>
                                            <div class="help-block"><span class="text-danger">Note:</span> HTML is not
                                                translated!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label">Rating</label>
                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                            <input type="radio" value="1" name="rating" checked>
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
                            <?php  } ?>
                            </div>
                        </div>

                        <h3 class="subtitle" style="display: none;">Related Products</h3>

                        <div class="owl-carousel related_pro_" style="display: none;">
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
                                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span>
                                    </button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="">
                                            <i
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
                                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span>
                                    </button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="">
                                            <i
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
                                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span>
                                    </button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="">
                                            <i
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
                                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span>
                                    </button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="">
                                            <i
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
                                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span>
                                    </button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="">
                                            <i
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
                                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span>
                                    </button>
                                    <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="">
                                            <i
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

                <div class="col-md-3 text-right">
                    <?
                    $url = "";
                    $name = "";
                    if($post['status'] == 0 ){
                        /*Inactive*/
                        $url = base_url('auctions/active/'.$post['id']);
                        $name = "Active";
                    }
                    else if($post['status'] == 1){
                        /*Active*/
                        $url = base_url('auctions/inactive/'.$post['id']);
                        $name = "In Active";
                    }
                    ?>
                    <a href="<?=$url?>" data-toggle="tooltip" title="" class="btn btn-primary " data-original-title="" data-title="In Active Auction"><?=$name?></a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>



<div class="modal fade" id="bid-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Bid Description</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

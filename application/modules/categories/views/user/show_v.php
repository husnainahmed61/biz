<div class="container">
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <li><a href="<?= current_url();?>"><?= $name ?></a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <h1 class="title"><?= $name ?></h1>
                    <!--Left Part Start -->_
                <aside id="column-left" class="col-md-3 col-sm-12 " style="/*display: none;*/">
                    <h3 class="subtitle">Filters</h3>


                    <div class="box-category">
                        <ul id="cat_accordion">
                            <li class="dcjq-current-parent "><a href="javascript:;" class="">Clothing</a> <span
                                        class="down"></span>
                                <!--<div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-sm" placeholder="Buscar"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-sm" type="button">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>-->

                                <ul>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Filter Primary
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="" href="category.html">Electronics</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Laptops</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories New</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Desktops</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories New</a></li>
                                            <li><a href="category.html">Sub Categories New</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Cameras</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Mobile Phones</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">TV &amp; Home Audio</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories New</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">MP3 Players</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Shoes</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Men</a></li>
                                    <li><a href="category.html">Women</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Girls</a></li>
                                    <li><a href="category.html">Boys</a></li>
                                    <li><a href="category.html">Baby</a></li>
                                    <li><a href="category.html">Accessories</a><span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">Sub Categories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="category.html">Watches</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Men's Watches</a></li>
                                    <li><a href="category.html">Women's Watches</a></li>
                                    <li><a href="category.html">Kids' Watches</a></li>
                                    <li><a href="category.html">Accessories</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Jewellery</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Silver</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Gold</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">test 1</a></li>
                                            <li><a href="category.html">test 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Diamond</a></li>
                                    <li><a href="category.html">Pearl</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Men's Jewellery</a></li>
                                    <li><a href="category.html">Children's Jewellery</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">New Sub Categories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="category.html">Health &amp; Beauty</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Perfumes</a></li>
                                    <li><a href="category.html">Makeup</a></li>
                                    <li><a href="category.html">Sun Care</a></li>
                                    <li><a href="category.html">Skin Care</a></li>
                                    <li><a href="category.html">Eye Care</a></li>
                                    <li><a href="category.html">Hair Care</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Kids &amp; Babies</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Toys</a></li>
                                    <li><a href="category.html">Games</a> <span class="down"></span>
                                        <ul>
                                            <li><a href="category.html">test 25</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Puzzles</a></li>
                                    <li><a href="category.html">Hobbies</a></li>
                                    <li><a href="category.html">Strollers</a></li>
                                    <li><a href="category.html">Health &amp; Safety</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Sports</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Cycling</a></li>
                                    <li><a href="category.html">Running</a></li>
                                    <li><a href="category.html">Swimming</a></li>
                                    <li><a href="category.html">Football</a></li>
                                    <li><a href="category.html">Golf</a></li>
                                    <li><a href="category.html">Windsurfing</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Home &amp; Garden</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Bedding</a></li>
                                    <li><a href="category.html">Food</a></li>
                                    <li><a href="category.html">Furniture</a></li>
                                    <li><a href="category.html">Kitchen</a></li>
                                    <li><a href="category.html">Lighting</a></li>
                                    <li><a href="category.html">Tools</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Wines &amp; Spirits</a> <span class="down"></span>
                                <ul>
                                    <li><a href="category.html">Wine</a></li>
                                    <li><a href="category.html">Whiskey</a></li>
                                    <li><a href="category.html">Vodka</a></li>
                                    <li><a href="category.html">Liqueurs</a></li>
                                    <li><a href="category.html">Beer</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>
                <!--Left Part End -->

                <div class="col-md-9 col-sm-12  posts">
                    <div id="content" class="col-sm-12">
                        <div class="product-filter">
                            <div class="row">
                                <div class="col-md-4 col-sm-5">
                                    <div class="btn-group">
                                        <button type="button" id="list-view" class="btn btn-default"
                                                data-toggle="tooltip"
                                                title="List"><i class="fa fa-th-list"></i></button>
                                        <button type="button" id="grid-view" class="btn btn-default"
                                                data-toggle="tooltip"
                                                title="Grid"><i class="fa fa-th"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <label class="control-label" for="input-sort">Sort By:</label>
                                </div>
                                <div class="col-md-3 col-sm-2 text-right">
                                    <select id="input-sort" class="form-control col-sm-3">
                                        <option value="" selected="selected">Default</option>
                                        <option value="">Name (A - Z)</option>
                                        <option value="">Name (Z - A)</option>
                                        <option value="">Price (Low &gt; High)</option>
                                        <option value="">Price (High &gt; Low)</option>
                                        <option value="">Rating (Highest)</option>
                                        <option value="">Rating (Lowest)</option>
                                        <option value="">Model (A - Z)</option>
                                        <option value="">Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 text-right">
                                    <label class="control-label" for="input-limit">Show:</label>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <select id="input-limit" class="form-control">
                                        <option value="" selected="selected">20</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">75</option>
                                        <option value="">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                if(isset($posts) && !empty($posts)) {
                                    foreach ($posts AS $post) :
                                        $image = 'image_sm_'.$post['display_image'];
                                        $startAT = explode(' ', $post['starts_at']);
                                        $expiresAT = explode(' ', $post['expires_at']);
                                        ?>
                                        <div class="product-layout product-list col-md-4 col-xs-12">
                                            <div class="product-thumb">
                                                <div class="image"><a href="<?= base_url($post['slug'].'/post') ?>">
                                                        <img
                                                            src="<?= $post[$image] ?>"
                                                            alt="<?= $post['name'] ?>"
                                                            title="<?= $post['name'] ?>"
                                                            class="img-responsive" width="270" height="270"/></a>
                                                </div>
                                                <div>
                                                    <div class="caption">
                                                        <h4><a href="<?= base_url($post['slug'].'/post') ?>"> <?= $post['name'] ?> </a>
                                                        </h4>
                                                        <p class="description">
                                                            <?= $post['description'] ?>
                                                        </p>
                                                        <ul class="list-unstyled list-inline details">
                                                            <!-- form bids table -->
                                                            <li>
                                                                <span class="name">no. of bids:</span>
                                                                <span class="value" itemprop="brand">0</span>
                                                            </li>
                                                            <li>
                                                                <span class="name">Start at: </span>
                                                                <span class="value"><?= $startAT[0] ?></span>
                                                            </li>
                                                            <li data-toggle="tooltip"
                                                                title="Bid Before">
                                                                <span class="name">Expire at: </span>
                                                                <span class="value"><?= $expiresAT[0] ?></span>
                                                            </li>
                                                            <!--<li>
                                                                <span class="name">Availability:</span>
                                                                <span class="instock value ">In Stock</span>
                                                            </li>-->
                                                        </ul>
                                                        <h3 class="price" itemprop="offers" itemscope
                                                            itemtype="http://schema.org/Offer">
                                                            <span class="price-new" itemprop="price"><?= $post['currency'].' '.$post['current_price'] ?></span>
                                                            <span itemprop="availability" content="In Stock"></span>
                                                        </h3>
                                                    </div>
                                                    <div class="button-group">
                                                        <!--<button
                                                            data-load-url="<?/*= base_url("/products/quickview/1"); */?>"
                                                            class="btn btn-primary buy-now" data-toggle="tooltip"
                                                            title="Quick View">
                                                            <span>Bid Now</span>
                                                        </button>-->
                                                        <a href="<?= base_url($post['slug'].'/post') ?>" >
                                                            <button class="btn btn-primary">Bid Now</button>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                }
                                else
                                {
                                    ?>
                                    <div class="col-md-4 col-xs-12">
                                        <span>No posts found.</span>
                                    </div>
                            <?php
                                }
                            ?>

                        </div>



                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <ul class="pagination">
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">&gt;</a></li>
                                    <li><a href="#">&gt;|</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-right">Showing 1 to 12 of 15 (2 Pages)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="quick-bid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

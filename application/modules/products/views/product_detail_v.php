<h3 style="margin-bottom: 22px;">Select Your Wiper</h3>

<div class="row products-list">

    <?php foreach ($products

                   AS $item) {
        $image = "";
        if (strpos(strtolower($item['position']), 'driver') !== false) {
            $image = "driver";
        } else if (strpos(strtolower($item['position']), 'passenger') !== false) {
            $image = "passenger";
        } else if (strpos(strtolower($item['position']), 'center') !== false) {
            $image = "driver";
        } else if (strpos(strtolower($item['position']), 'rear') !== false) {
            $image = "rear";
        }
        ?>


        <div class="col-xs-12 col-sm-4 col-md-4 product">
            <a href="javascript:;">
                <div class="thumbnail">
                    <div class="media p-xs">
                        <div class="media-body media-middle">
                            <h6 class="media-heading mb-none"><?= $item['position'] ?></h6>
                        </div>
                        <div class="media-right">
                            <img class="media-object" src="<?= base_url("assets_u/images/" . $image . ".png") ?>"
                                 style="width:20px;">
                        </div>
                    </div>


                    <!--<div class="inline-block">
                        <h6 class="text-center"></h6>
                        <img class="img-thumbnail blog-img-thumb"  alt="">
                    </div>-->

                    <img style="border-radius: 0;" class="img-thumbnail"
                         src="<?= base_url("assets_u/images/product_thumb.jpg") ?>" alt="">
                    <div class="caption">
                        <p class="description"><strong>Part #: </strong><?= $item['part_number'] ?></p>
                        <p class="description"><?= $item['notes'] ?></p>
                    </div>
<!--                    <div class="checkbox checkbox-primary mt-md">-->
<!--                        <input class="product_id" id="checkbox--><?//= $item['id'] ?><!--" type="checkbox"-->
<!--                               name="products_id[]" value="--><?//= $item['id'] ?><!--">-->
<!--                        <label style="font-size: 11px" for="checkbox--><?//= $item['id'] ?><!--">-->
<!--                            Add To Cart-->
<!--                        </label>-->
<!--                    </div>-->
                    <div class="[ form-group ]">
                        <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
                        <div class="[ btn-group ]">
                            <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                                <span class="[ glyphicon glyphicon-ok ]"></span>
                                <span> </span>
                            </label>
                            <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                                Add
                            </label>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-lg-12 text-center">
        <button type="button" class="btn btn-default input-sm buy_all" style="font-size: 12px;">
            <span class="glyphicon glyphicon-shopping-cart"></span> Buy All
        </button>
    </div>
</div>


<div class="row" style="padding-top: 5%">
    <div class="col-lg-12">
        <h3 class="m-none">Images</h3>
    </div>
</div>

<div class="row" style="padding-top: 5%">
    <div class="col-lg-11 col-centered text-center">
        <div class="thumbnail " style="border: solid 0px;">
            <h6 class="text-center">Case</h6>
            <img src="<?= base_url("assets_u/images/product_thumb.jpg") ?>" alt="">
        </div>
    </div>
    <div class="col-lg-11 col-centered text-center">
        <div class="thumbnail" style="border: solid 0px;">
            <h6 class="text-center">Blade</h6>
            <img id="blade-image" src="<?= base_url($products[0]['thumb_blade']) ?>" alt="">
        </div>
    </div>
    <div class="col-lg-11 col-centered text-center">
        <div class="thumbnail" style="border: solid 0px;">
            <h6 class="text-center">Back</h6>
            <img src="<?= base_url($products[0]['thumb_back']) ?>" alt="">
        </div>
    </div>
</div>


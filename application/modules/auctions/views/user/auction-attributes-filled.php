<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 11-Aug-18
 * Time: 1:51 AM
 */

?>

<div class="row">
    <div class="col-md-12">
        <legend>Post Attributes</legend>
        <div class="row">
            <?php foreach ($attributes AS $key => $item) { ?>

                <?php if ($item['type'] == "select") { ?>

                    <div class="form-group required mb-lg col-md-6">

                        <!-- INPUT CONTAINER -->
                        <div class="input-container col-12">
                            <label for="category" class="rl-label required"><?= $item['name'] ?></label>
                            <label for="category" class="select-block">
                                <select id="attribute_<?=$item['id']?>" name="attribute_<?=$item['id']?>" title="Select <?= $item['name'] ?>">
                                    <?php foreach ($item['attribute_values'] AS $key2 => $item2) {
                                        $selected = ($auctionAttributes[$item['id']]['attribute_value_id'] == $item2['id'] &&
                                            $auctionAttributes[$item['id']]['attribute_value_id'] > 0) ? "selected" : ""; ?>
                                        <option value="<?= $item2['id'] ?>" <?= $selected ?>><?= $item2['value'] ?></option>
                                    <?php } ?>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                            </label>
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </div>
                <?php }
                else if ($item['type'] == "text") { ?>
                    <div class="form-group required mb-lg col-md-6">
                        <!-- INPUT CONTAINER -->
                        <div class="input-container col-12">
                            <label for="category" class="rl-label required"><?= $item['name'] ?></label>
                            <input type="text" id="attribute_<?=$item['id']?>" placeholder="<?= $item['name']?>"
                                   value="<?=$auctionAttributes[$item['id']]['value']?>" name="attribute_<?=$item['id']?>">
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </div>
                    <?php
                } ?>

            <?php } ?>

        </div>
    </div>
</div>


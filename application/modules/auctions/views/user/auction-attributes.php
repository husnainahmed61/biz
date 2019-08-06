<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 17-Jul-18
 * Time: 12:16 AM
 */
?>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <?php foreach ($attributes AS $key => $item) { ?>

                <?php if ($item['type'] == "select") { ?>
                    <div class="form-group required mb-lg col-md-6">
                        
                        <!-- INPUT CONTAINER -->
                        <div class="input-container col-12">
                            <label for="category" class="rl-label required"><?= $item['name'] ?></label>
                            <label for="category" class="select-block">
                                <select class="select2" id="attribute_<?=$item['id']?>" name="attribute_<?=$item['id']?>" title="Select <?= $item['name'] ?>">
                                    <?php foreach ($item['attribute_values'] AS $key2 => $item2) {?>
                                <option value="<?= $item2['id'] ?>" ><?= $item2['value'] ?></option>
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
                            <input type="text" id="attribute_<?=$item['id']?>" placeholder="<?= $item['name'] ?>" value="" name="attribute_<?=$item['id']?>">
                        </div>
                        <!-- /INPUT CONTAINER -->
                    </div>
                    <?php
                } ?>

            <?php } ?>

        </div>
    </div>
</div>

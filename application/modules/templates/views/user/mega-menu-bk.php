<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 29-Oct-18
 * Time: 11:52 PM
 */
?>

<li class="mega-menu dropdown"><a data-toggle="tooltip"
                                  data-original-title="Click To Open">Categories</a>

    <div class="dropdown-menu">
        <?php foreach ($navbar AS $cat1) : ?>
            <div class="column col-lg-2 col-md-3">
                <a href="<?= base_url($cat1['slug'].'/category1'); ?>"><?= $cat1['name'] ?></a>
                <div>
                    <ul>
                        <?php foreach ($cat1['categories2'] AS $cat2): ?>
                            <li><a href="<?= base_url($cat2['slug'].'/category2'); ?>"> <?= $cat2['name'] ?> <span>&rsaquo;</span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <?php foreach ($cat2['categories3'] AS $cat3): ?>
                                            <li><a href="<?= base_url($cat3['slug'].'/category3'); ?>"><?= $cat3['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</li>

<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 8/11/2018
 * Time: 11:12 PM
 */
?>

<div class="row">
    <div class="col-md-12">
        <?php if(isset($description) && !empty($description)): ?>
            <p>
                <?= $description; ?>
            </p>
        <?php endif; ?>

        <?php /*if(isset($expireAt) && !empty($expireAt)): */?><!--
            <?php /*if ($expireAt > $currentDate){ */?>

                <div class="alert alert-danger">
                    <span><strong>Note: </strong> This bid was expired at  <?/*= $expireAt */?>.</span>
                </div>


            <?php /*} else{*/?>
                <div class="alert alert-warning">
                    <span><strong>Note: </strong> This bid will expire at <?/*= $expireAt */?> .</span>
                </div>
            <?php /*}*/?>
        --><?php /*endif; */?>

        <span><strong>Note: </strong> Expire at <?= $expireAt ?> .</span>
    </div>
</div>

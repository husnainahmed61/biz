<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 23-Aug-18
 * Time: 9:31 PM
 */
?>

<div id="container">
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h1 class="title text-center text-uppercase" style="font-size: 100px;font-weight: bold; "><?= $title ?></h1>
                <p class="text-center lead"><?= $message ?></p>
                <div class="buttons text-center"> <a class="btn btn-primary btn-lg" href="<?= base_url("index"); ?>">Login</a> </div>
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>

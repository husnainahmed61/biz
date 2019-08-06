<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 8/12/2018
 * Time: 9:08 PM
 */
?>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap section-headline-main">
    <div class="container">
        <div class="section-headline row">
            <div class="col-sm-6">
                <h2>Forgot Your Password ?</h2>
            </div>

        </div>
    </div>
</div>
<!-- /SECTION HEADLINE -->
<!-- SECTION -->
<div class="section-wrap">
    <div class="section">
        <div class="container">
            <div class="form-popup-content">

            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h4 class="popup-title">Restore your Password</h4>
                    <!-- LINE SEPARATOR -->
                    <hr class="line-separator short">
                    <!-- /LINE SEPARATOR -->
                    <!--                    <p class="spaced">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>-->
                    <form id="reset_password" action="<?= base_url("password/update")?>" method="POST">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="token" value="<?= $token ?>">

                        <label for="password" class="rl-label">Password</label>
                        <input type="password" class="m" name="password" id="password" required style="margin-bottom: 20px">

                        <label for="confirm-password" class="rl-label">Password Confirm</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm-password" required style="margin-bottom: 20px">
                        <button type="submit" class="button mid dark no-space">Restore your <span class="primary">Password</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->

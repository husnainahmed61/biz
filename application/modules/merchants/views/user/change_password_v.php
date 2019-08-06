<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 10/13/2018
 * Time: 5:25 PM
 */
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" id="change_password" action="<?= base_url("password/update")?>" method="POST">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="token" value="<?= $token ?>">
                <div class="form-body">
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">Current Password</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control  mb-sm" name="current_password" id="old_password" required>
                            <span class="text-danger" id="old_password_error" style="display: none;">Old Password doesn't match</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">Password</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="password" id="password" required>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-4">Password Confirm</label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" name="confirm_password" id="confirm-password" required>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form action col-md-5 pull-right">
                        <button type="submit" class="btn btn-primary ">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


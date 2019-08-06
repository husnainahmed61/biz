<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 8/12/2018
 * Time: 8:43 PM
 */
?>

<h2> Reset Password </h2>
<br>
<p>Dear <?= $userDetails['users']['first_name'] . " " . $userDetails['users']['last_name'] ?>, </p>
<br>
<p>
    Its ok that you forgot your password. We are here to help you.
    Please click here to reset your password.<a href="<?= base_url('password/reset/' . $userDetails['email_token']) ?>">here</a>
</p>
<p>
    "And Hey!
    Stay Blessed"</p>

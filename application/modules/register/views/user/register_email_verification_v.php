<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 01-Jul-18
 * Time: 2:00 AM
 */
?>


<h2>Dear <?= $userFields['first_name']." ". $userFields['last_name']?></h2> <!-- username stillremains here -->
<br>
<p>Thanks for joining us. The experience will ease your life.
<p><a href="<?=base_url('sign-up/verifyEmail/'.$userDetailFields['email_token'])?>">Click here to start your Vayzn journey!</a>
</p>
<p>"And Hey!
Have a Great Day"</p>

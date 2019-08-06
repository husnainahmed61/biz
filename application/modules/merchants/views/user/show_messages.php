<?php
$user_id = $this->session->userdata("user_login");
$user_id = $user_id['id'];
 ?>
<?php foreach ($messages as $key => $value) { ?>

<?php if ($user_id == $value['sender_user_id']) {?>	
<!-- MESSAGE PREVIEW -->
<div class="message-preview user-msg">
    <figure class="user-avatar">
        <img src="<?=base_url();?>assets_u/images/avatars/avatar_06.jpg" alt="user-avatar">
    </figure>
    <p class="text-header">Your Message</p>
        <p class="timestamp"><?=date("M d,Y - h:mA ", strtotime($value['created_at']));?></p>
    <?php if ($value['type']  == "attach") { ?>
        <a href="<?=$base_resources_url_user_attach?><?=$value['message']?>" download="attachment">Download</a>
    <?php } else { ?>    
    <p><?=$value['message']?></p>
    <?php } ?>
</div>

<?php } else { ?>
	<div class="message-preview">
    <figure class="user-avatar">
        <img src="<?=base_url();?>assets_u/images/avatars/avatar_06.jpg" alt="user-avatar">
    </figure>
    <p class="text-header">Auctioneer Message</p>
        <p class="timestamp"><?=date("M d,Y - h:mA ", strtotime($value['created_at']));?></p>
    <?php if ($value['type']  == "attach") { ?>
        <a href="<?=$base_resources_url_user_attach?><?=$value['message']?>" download="attachment">Download</a>
    <?php } else { ?>    
    <p><?=$value['message']?></p>
    <?php } ?>
</div>
	
<?php } ?>


<!-- /MESSAGE PREVIEW -->

<?php } ?>

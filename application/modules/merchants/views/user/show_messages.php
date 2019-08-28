<?php
$user_id = $this->session->userdata("user_login");
$user_id = $user_id['id'];
 ?>
<?php foreach ($messages as $key => $value) { ?>

<?php if ($user_id == $value['sender_user_id']) { ?>	
<!-- MESSAGE PREVIEW -->
<div class="message-preview user-msg">
    <figure class="user-avatar">
        <?php if (isset($value['profile_picture']) && !empty($value['profile_picture'])) { ?>
            <img src="<?=$base_resources_url_userImage?><?=$value['profile_picture']?>" alt="user-avatar">
        <?php } else{ ?>
            <img src="<?=base_url();?>assets_u/images/avatars/avatar_06.jpg" alt="user-avatar">
        <?php } ?>
        
    </figure>
    <p class="text-header"><?=$value['first_name'].' '.$value['last_name']?></p>
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
        <?php if (isset($value['profile_picture']) && !empty($value['profile_picture'])) { ?>
            <img src="<?=$base_resources_url_userImage?><?=$value['profile_picture']?>" alt="user-avatar">
        <?php } else{ ?>
            <img src="<?=base_url();?>assets_u/images/avatars/avatar_06.jpg" alt="user-avatar">
        <?php } ?>
    </figure>
    <p class="text-header"><?=$value['first_name'].' '.$value['last_name']?></p>
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

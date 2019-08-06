<?php 
function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
foreach (array_reverse($Notifications) as $key => $noti) {
?>

	<!-- PROFILE NOTIFICATION -->
	<div class="profile-notification">
		<!-- NOTIFICATION CLOSE -->
		<div class="notification-close"></div>
		<!-- NOTIFICATION CLOSE -->
		<div class="profile-notification-date">
			<p><?php echo time_elapsed_string($noti['created_at']);?></p>
		</div>
		<?php if ($noti['notification_type_id'] == 1) {
                                 ?>
		<div class="profile-notification-body">
			<figure class="user-avatar">
				<img src="<?= base_url("assets_u/images/avatars/avatar_02.jpg");?>" alt="user-avatar">
			</figure>
			<p><a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> added <a href="<?=base_url().''.$noti['slug']?>/auction"><span><?=$noti['name']?></span> </a>to favourites</p>
		</div>
		<div class="profile-notification-type">
			<span class="type-icon icon-heart primary"></span>
		</div>
		<?php } if($noti['notification_type_id'] == 2) {?>
			<div class="profile-notification-body">
			<figure class="user-avatar">
				<img src="<?= base_url("assets_u/images/avatars/avatar_02.jpg");?>" alt="user-avatar">
			</figure>
			<p><a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> commented on <a href="<?=base_url().''.$noti['slug']?>/auction"><span><?=$noti['name']?></span></a></p>
		</div>
		<div class="profile-notification-type">
			<span class="type-icon icon-bubble primary"></span>
		</div>
		<?php } if($noti['notification_type_id'] == 3) {?>
			<div class="profile-notification-body">
			<figure class="user-avatar">
				<img src="<?= base_url("assets_u/images/avatars/avatar_02.jpg");?>" alt="user-avatar">
			</figure>
			<p><a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> bid on <a href="<?=base_url()?>bids/biddetail/?auction=<?php echo $this->my_encrypt->encode($noti['target_id']); ?>"><span><span><?=$noti['name'] ?></span></a></p>
		</div>
		<div class="profile-notification-type">
			<span class="type-icon icon-tag primary"></span>
		</div>
		<?php } if($noti['notification_type_id'] == 4) {?>
			<div class="profile-notification-body">
			<figure class="user-avatar">
				<img src="<?= base_url("assets_u/images/avatars/avatar_02.jpg");?>" alt="user-avatar">
			</figure>
			<p><a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> Followed you </p>
		</div>
		<div class="profile-notification-type">
			<span class="type-icon icon-star primary"></span>
		</div>
	<?php } ?>
	</div>
	<!-- PROFILE NOTIFICATION -->
<?php } ?>
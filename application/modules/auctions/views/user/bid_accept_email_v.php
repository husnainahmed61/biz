<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 8/26/2018
 * Time: 2:26 PM
 */
?>

<h2> Bid Accept </h2>
<br>
<p>Dear <?=$bidderName?></p>
<p>Your bid has been accepted on this <a href="<?= $auctionUrl?>">auction</a>. Below are the Auctioneer Contact Detail</p>

<p>Name: <?= $auctioneer['first_name'].' '.$auctioneer['last_name'] ?></p>
<p>Phone: <?= $auctioneer['phone']?></p>
<p>Email: <?= $auctioneerDetail['email']?></p>

<!-- /TRANSACTION LIST HEADER -->

<?php
if (isset($bids) && !empty($bids)) {
    $i = 1;
    foreach ($bids as $key => $bid) { ?>
        <!-- TRANSACTION LIST ITEM -->

        <div class="transaction-list-item">
            <div class="transaction-list-item-date">
                <p><?= $i ?></p>
            </div>
            <div class="transaction-list-item-author">
                <p class="text-header"><a
                            href="<?= base_url() ?><?= $bid['slug'] ?>/user"><?= $bid['first_name'] . ' ' . $bid['last_name'] ?></a>
                </p>

            </div>
            <div class="transaction-list-item-item">
                <div class="user-rating">
                    <ul class="rating tooltip" title="Author's Reputation" style="
    position: inherit;
    opacity: 1;
">
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="transaction-list-item-detail">
                <p><?php echo ucfirst($bid['bidder_type']) ?></p>
            </div>
            <div class="transaction-list-item-code">
                <p>
                    <span class="light"><?php echo date("M dS, Y", strtotime(substr($bid['created_at'], 0, 10))) ?></span>
                </p>
            </div>
            <div class="transaction-list-item-price">
                <p><?= $bid['code'] ?></p>
            </div>
            <div class="transaction-list-item-cut">
                <p><span class="light"><?= $bid['amount'] ?></span></p>
            </div>
            <div class="transaction-list-item-earnings">
                <div class="recommendation-wrap bid_actions">
                    <?php
                    $acceptColor = "";
                    $cancelColor = "";
                    if ($bid['status'] == "accepted") {
                        $acceptColor = "background-color:#00d7b3";
                        $cancelColor = "";
                    }
                    else if ($bid['status'] == "declined") {
                        $acceptColor = "";
                        $cancelColor = "background-color:#e61852";
                    }
                    ?>
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick <?= !empty($acceptColor) ? 'selected' : '' ?> <?= ($acceptedBids >= 1) ? '' : 'action' ?>"
                       style="<?=$acceptColor?>" data-method="accept" data-id="<?=$bid['id']?>">
                        <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick <?= !empty($cancelColor) ? 'selected' : '' ?> <?= ($acceptedBids >= 1) ? '' : 'action' ?>"
                    style="<?=$cancelColor?>" data-method="cancel" data-id="<?=$bid['id']?>" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
            </div>
            <div class="transaction-list-item-icon">
                <div class="transaction-icon primary">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
            </div>
        </div>
        <!-- /TRANSACTION LIST ITEM -->
        <?php
        $i++;
    }
}
?>
        
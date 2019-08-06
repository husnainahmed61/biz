<!--Accordion Starts -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Bidder Name</th>
                    <th>User Rating</th>
                    <th>Bidder Type</th>
                    <th>Submission Date</th>
                    <th>Bid Code</th> <!-- UZair Edit -->
                    <th>Bid Amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    if(isset($bids) && !empty($bids)):
                        foreach ($bids AS $bid):
                            $submissionDate = date('d-M-y', strtotime($bid['created_at']));
                            $status = $bid['status'];
                            $check = $this->bids->checkAnyAccept($bid['id']);
                            if($status !== 'cancel'):
                ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><a href="<?= base_url($bid['bidder']['slug'].'/merchant/')?>" target="_blank"> <?= $bid['bidder']['first_name'].' '. $bid['bidder']['last_name']?></a></td>
                    <td>
                        <div class="rating">
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                            <span class="fa fa-stack">
                                <i class="fa fa-star fa-stack-2x"></i>
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                            <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-2x"></i>
                            </span>
                        </div>
                    </td>
                    <td><?= $bid['bidder']['type'] ?></td>
                    <td><?= $submissionDate; ?></td>
                    <td><?= $bid['code'] ?></td> <!-- UZair Edit -->
                    <td><?= $bid['currency'].' '.$bid['amount'] ?></td>
                    <td>
                        <span class="input-group-btn">
                            <!-- UZair Works starts-->
                            <a data-toggle="tooltip" title="" class="btn btn-primary recent-bid-details" data-original-title="Description" data-title="" data-load-url="<?=base_url("auctions/biddetail/".$bid['id']);?>"><i class="fa fa-info-circle"></i></a>
                            <?php if ($bid['expires_at'] > $currentDate): ?>
                                <?php if (isset($check) && !empty($check)){?>
                                    <a data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Accept" disabled=""><i class="fa fa-check-circle"></i></a>
                                <?php } else { ?>
                                    <form id="bid-accept-form" action="<?=base_url('auctions/action/'.$bid['id'])?>" method="POST">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="status" value="accept">
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="Accept" ><i class="fa fa-check-circle"></i></button>
                                    </form>

                                    <form id="bid-cancel-form" action="<?=base_url('auctions/action/'.$bid['id'])?>" method="POST">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="status" value="cancel">
                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Cancel" ><i class="fa fa-times-circle"></i></button>
                                    </form>


                                <?php } ?>
                            <?php endif;?>
                            <!-- UZair Works Ends-->
                        </span>
                    </td>
                </tr>
                <?php
                        $i++;
                            endif;
                        endforeach;
                    endif;
                ?>

                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-12">
        <a  class="btn btn-primary btn-full"> View All</a>
    </div>
</div>
<!--Accordion Ends -->

<!-- UZair Works starts-->
<script type="text/javascript">
    $(document).ready(function () {
        /*var $bidDetailsModal = $('#bid-details');
        var detailModalContentUrl = "";

        $("#recent-bids").on("click",".recent-bid-details",function(e){

            var $modalBody = $bidDetailsModal.find('.modal-body');
            $modalBody.empty();

            detailModalContentUrl = $(this).data('load-url');
            console.log("detailModalContentUrl: "+ detailModalContentUrl);

            $bidDetailsModal.modal();
            console.log("bid info");
        });

        $bidDetailsModal.on('show.bs.modal',function(){
            $(this).find('.modal-body').load(detailModalContentUrl);
        });*/

        var $acceptForm = $('#bid-accept-form');
        var $cancelForm = $('#bid-cancel-form');

        $acceptForm.submit(function (e) {
            e.preventDefault();
            /*console.log("action = " + $form.attr('action'));
            console.log("method = " + $form.attr('method'));*/

            var $confirm = confirm("Are you sure to accept this bid, if you click 'Ok' then you all bid can't accept only this bid accepted.");

            if($confirm == true)
            {
                $.ajax({
                    url: $acceptForm.attr('action'),
                    type: $acceptForm.attr('method'),
                    data: $acceptForm.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        resetCSRF(response.csrf_token);
                        var type = '';
                        var message = response.message;
                        if (response.status){
                            type = 'success';
                        }
                        else {
                            type = 'danger';

                            if (response.hasOwnProperty('error_array')) {
                                message += '<ul class="simple-ul">';
                                response.error_array.forEach(function(el){
                                    message += "<li>" + el + "</li>";
                                });
                                message += '</ul>';
                                console.log(message);
                            }
                        }
                        showstatusMessage(type,response.title, message , 7000);
                        window.setTimeout(function(){location.reload()},3000);
                    },
                    error: function (response) {
                        showstatusMessage('danger',"Error", "Can't Bid", 7000);
                    }

                });
            }
        });

        $cancelForm.submit(function (e) {
            e.preventDefault();
            /*console.log("action = " + $form.attr('action'));
            console.log("method = " + $form.attr('method'));*/

            var $confirm = confirm("Are you sure to cancel this bid, if you click 'Ok' then bid remove form this list.");

            if($confirm == true)
            {
                $.ajax({
                    url: $cancelForm.attr('action'),
                    type: $cancelForm.attr('method'),
                    data: $cancelForm.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        resetCSRF(response.csrf_token);
                        var type = '';
                        var message = response.message;
                        if (response.status){
                            type = 'success';
                        }
                        else {
                            type = 'danger';

                            if (response.hasOwnProperty('error_array')) {
                                message += '<ul class="simple-ul">';
                                response.error_array.forEach(function(el){
                                    message += "<li>" + el + "</li>";
                                });
                                message += '</ul>';
                                console.log(message);
                            }
                        }
                        showstatusMessage(type,response.title, message , 7000);
                        window.setTimeout(function(){location.reload()},3000);
                    },
                    error: function (response) {
                        showstatusMessage('danger',"Error", "Can't Bid", 7000);
                    }

                });
            }
        });

    });
</script>
<!-- UZair Works Ends-->


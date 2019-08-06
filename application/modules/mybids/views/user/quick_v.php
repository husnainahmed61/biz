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
                    <th>Bid Amount</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<20;$i++){?>
                <tr>
                    <th scope="row">1</th>
                    <td>Aaron Paul</td>
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
                    <td>Individual</td>
                    <td>12-Jan-18</td>
                    <td>$1000</td>
                    <td>
                        <span class="input-group-btn">
                            <a data-toggle="tooltip" title="" class="btn btn-primary bid-details" data-original-title="Description"><i class="fa fa-info-circle"></i></a>
                            <a data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
                        </span>
                    </td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <a class="btn btn-primary btn-full"> View All</a>

    </div>
</div>
<!--Accordion Ends -->


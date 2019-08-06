<script type="text/javascript">
    $(document).ready(function () {
        var $recentBidModal = $('#recent-bids');
        var modalContentUrl = "";
        $(".buy-now").on("click",function(e){
            modalContentUrl = $(this).data('load-url');

            //e.preventDefault();

            var options = {

            };
            $('#recent-bids').modal();
        });

        $recentBidModal.on('show.bs.modal',function(){
            $(this).find('.modal-title').text("Recent Bids");
            $(this).find('.modal-body').load(modalContentUrl);
        });


        var bidDetailsModal = $("#bid-details-modal");

        $recentBidModal.on("click",".modal-body .bid-details",function () {
            bidDetailsModal.modal();
        });




        /*List Group Start*/

        $('.star').on('click', function () {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });

        /*List Group End*/
    });
</script>
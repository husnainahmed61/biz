(function($) {
	/*-----------
		RANGE
	-----------*/
	$('.price-range-slider').jRange({
	    from: 0,
	    to: 100000,
	    step: 1,
	    format: '%s',
	    width: 242,
	    showLabels: true,
	    showScale: false,
	    isRange : true,
	    theme: "theme-edragon"
	});
})(jQuery);
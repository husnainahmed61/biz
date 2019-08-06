(function($) {
	/*-----------------
		TWEETS
	-----------------*/	
	$('.tweets').tweet({
	    modpath: base_url+'assets_u/js/vendor/twitter/',
	    count: 2,
	    loading_text: 'Loading twitter feed...',
		username:'vayznofficial',
		template: '<p class="feed-text">{text}</p><p class="feed-timestamp">{time}</p>'
	});
})(jQuery);
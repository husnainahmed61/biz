(function($) {
	var tabCount = 3,
		currentTab,
		$navigation = $( '.category-nav' ),
		$tabNav = $( '#category_case' ).children(),
		$tabs = $('#product-sideshow').children(),
		$prevCtrl = $( '.slide-control.left' ),
		$nextCtrl = $( '.slide-control.right' );

		$nextCtrl.on( 'click', nextTab );
		$prevCtrl.on( 'click', prevTab );

		$tabNav.each( function( index ) {
			$( this ).on( 'click', { tabNumber: index }, showTabEvent );
		});

		function initTab( tabNumber ) {
			currentTab = tabNumber - 1;
			for( var i = 0; i < tabCount; i++ ) {
				$tabs.eq(i).addClass( 'hidden' );
			}
            console.log("initTab > tabNumber: "+tabNumber);
            console.log("initTab > currentTab: "+currentTab);
			showTab( currentTab );
		}

		function showTab( tabNumber ) {

            console.log(currentTab+'!=='+tabNumber);
		    if( currentTab !== tabNumber ){
                toggleTab( currentTab );
            }

			toggleTab( tabNumber );
			currentTab = tabNumber;

            console.log("tabNumber: "+tabNumber);
            console.log("currentTab: "+currentTab);
		}

		function showTabEvent( e ) {
			var tabNumber = e.data.tabNumber;

			if( currentTab === tabNumber ) return;

			if( currentTab !== tabNumber )
				toggleTab( currentTab );
			toggleTab( tabNumber );
			currentTab = tabNumber;
		}

		function nextTab() {
			var cTab = ( currentTab === ( tabCount - 1 ) ) ? 0 : currentTab + 1; 
			showTab( cTab );
		}

		function prevTab() {
			var cTab = ( currentTab === 0 ) ? ( tabCount - 1 ) : currentTab - 1; 
			showTab( cTab );
		}

		function toggleTab( tabNumber ) {
			$tabNav.eq(	tabNumber ).toggleClass('active');
			$tabs.eq( tabNumber ).toggleClass('visible');
			$tabs.eq( tabNumber ).toggleClass('hidden');
		}

		initTab( 2 );
})(jQuery);

(function($) {
    var tabCount = 2,
        currentTab,
        $navigation = $( '.category-nav' ),
        $tabNav = $( '#category_type' ).children(),
        $tabs = $('#product-sideshow').children(),
        $prevCtrl = $( '.slide-control.left' ),
        $nextCtrl = $( '.slide-control.right' );

    $nextCtrl.on( 'click', nextTab );
    $prevCtrl.on( 'click', prevTab );

    $tabNav.each( function( index ) {
        $( this ).on( 'click', { tabNumber: index }, showTabEvent );
    });

    function initTab( tabNumber ) {
        currentTab = tabNumber - 1;
        for( var i = 0; i < tabCount; i++ ) {
            $tabs.eq(i).addClass( 'hidden' );
        }
        showTab( currentTab );
    }

    function showTab( tabNumber ) {
        if( currentTab !== tabNumber )
            toggleTab( currentTab );
        toggleTab( tabNumber );
        currentTab = tabNumber;
    }

    function showTabEvent( e ) {
        var tabNumber = e.data.tabNumber;

        if( currentTab === tabNumber ) return;

        if( currentTab !== tabNumber )
            toggleTab( currentTab );
        toggleTab( tabNumber );
        currentTab = tabNumber;
    }

    function nextTab() {
        var cTab = ( currentTab === ( tabCount - 1 ) ) ? 0 : currentTab + 1;
        showTab( cTab );
    }

    function prevTab() {
        var cTab = ( currentTab === 0 ) ? ( tabCount - 1 ) : currentTab - 1;
        showTab( cTab );
    }

    function toggleTab( tabNumber ) {
        $tabNav.eq(	tabNumber ).toggleClass('active');
        $tabs.eq( tabNumber ).toggleClass('visible');
        $tabs.eq( tabNumber ).toggleClass('hidden');
    }

    initTab( 1 );
})(jQuery);




/* The scripts on this page are licensed under the GNU General Public License */
/* See https://www.gnu.org/licenses/gpl.html for more information */

// jQuery.noConflict();
// Use jQuery via jQuery(...)

( function( $ ) {
	/* menubar */
	var pageMenu = $( '#menubar .pagemenu' );
	var catMenu = $( '#menubar .catmenu' );
	var pagesTitle = $( '#menubar-pages' );
	var catsTitle = $( '#menubar-cats' );
	var pagesListItem = $( '.menubar-pages-list-item' );
	var catsListItem = $( '.menubar-cats-list-item' );

	// hide menubar .pagemenu and .catmenu divs on page load
	$( pageMenu ).hide();
	$( catMenu ).hide();

	// toggle the .pagemenu and .catmenu divs when clicking each h3 .menu-down-arrow buttons
	// Dynamically add the buttons to the menu titles
	pagesTitle.after( '<button class="menu-down-arrow"></button>' );
	catsTitle.after( '<button class="menu-down-arrow"></button>' );

	// Assign them to variables
	//var pagesMenuDownArrow = $( '#menubar-pages + .menu-down-arrow' );
	//var catsMenuDownArrow = $( '#menubar-cats + .menu-down-arrow' );

	// Toggle each when clicked
	/*pagesMenuDownArrow.click( function() {
		pageMenu.slideToggle( 'slow' );
	} );

	catsMenuDownArrow.click( function() {
		catMenu.slideToggle( 'slow' );
	} );*/

	pagesListItem.click( function() {
		pageMenu.slideToggle( 'slow' );
	} );

	catsListItem.click( function() {
		catMenu.slideToggle( 'slow' );
	} );

	// Hide .pagemenu and .catmenu when clicking outside of menus
	// Thanks go to prc322 on this Stack Overflow page for this variation
	// http://stackoverflow.com/questions/1403615/use-jquery-to-hide-a-div-when-the-user-clicks-outside-of-it

	$( document ).click( function( e ) {
		if ( !( pagesListItem ).is( e.target ) // if the target of the click is not the container.
			&& ( pagesListItem ).has( e.target ).length === 0 ) {
			pageMenu.slideUp( 'slow' );
		}
	} );

	jQuery(document).click(function(e) {
		if ( !( catsListItem ).is( e.target ) // if the target of the click is not the container.
			&& ( catsListItem ).has( e.target ).length === 0 ) {
			catMenu.slideUp( 'slow' );
		}
	} );

	/* primary and secondary sidebars */

	// find every second li tag that has ul below and add button .down-arrow-gray
	$( '#primary > ul > li > ul > li' ).filter( ':has(ul)' ).prepend( '<button class="down-arrow-gray"></button>' );
	$( '#secondary > ul > li > ul > li' ).filter( ':has(ul)' ).prepend( '<button class="down-arrow-gray"></button>' );

	// hide ul.children on page load
	$( '#primary ul.children' ).hide();
	$( '#secondary ul.children' ).hide();

	// toggle ul below second li tag when second li tag is clicked
	$( '#primary > ul > li > ul > li > ul.children' ).hide().end().find( 'div#primary > ul > li > ul > li .down-arrow-gray' ).click( function() {
		console.log( $( this ) );
		$( this ).siblings( '.children' ).slideToggle();
	} );

	$( '#secondary > ul > li > ul > li > ul.children' ).hide().end().find( '#secondary > ul > li > ul > li .down-arrow-gray' ).click( function() {
		$( '#secondary ul.children' ).slideToggle();
	} );

	/* Place smaller widget design behind .widgettitle only on 3-column layout */
	/* adapted from http://churchm.ag/dynamically-applying-stylesheets-using-jquery/ */
	var templateDir = jgd_bizelite_ScriptParams.templateDir;

	// check for blue stylesheet with 3-column stylesheets
	var blueExists = false;
	var threeColExists = false;
	$( 'link' ).each( function() {
		var myId = this.id;
		if (	myId === 'jgd-bizelite-3cr-css' ||
				myId === 'jgd-bizelite-3cl-css' ||
				myId === 'jgd-bizelite-3cr-mag-css' ||
				myId === 'jgd-bizelite-3cl-mag-css' ) {
			threeColExists = true;
		}
		if ( myId === 'jgd-bizelite-blue-css' ) {
			blueExists = true;
		}
	} );

	if( ( threeColExists === true ) && ( blueExists === true ) ) {
		$( 'head' ).append( '<style type="text/css"> .widgettitle { background: url(' + templateDir + '/images/jgd-bizelite-assets.svg) no-repeat -306px -206px #FFFFFF; } </style>' );
	}

	// check for green stylesheet with 3-column stylesheets
	var greenExists = false;
	var threeColExists = false;
	$( 'link' ).each( function() {
    	var myId = this.id;
    	if (	myId === 'jgd-bizelite-3cr-css' ||
    			myId === 'jgd-bizelite-3cl-css' ||
    			myId === 'jgd-bizelite-3cr-mag-css' ||
    			myId === 'jgd-bizelite-3cl-mag-css' ) {
    		threeColExists = true;
    	}
    	if ( myId === 'jgd-bizelite-green-css' ) {
    		greenExists = true;
    	}
	} );

	if( ( threeColExists === true ) && ( greenExists === true ) ) {
		$( 'head' ).append( '<style type="text/css"> .widgettitle { background: url(' + templateDir + '/images/jgd-bizelite-assets.svg) no-repeat -20px -250px #FFFFFF; } </style>' );
	}

	// check for red stylesheet with 3-column stylesheets
	var redExists = false;
	var threeColExists = false;

	$( 'link' ).each( function() {
		var myId = this.id;
		if (	myId === 'jgd-bizelite-3cr-css' ||
    			myId === 'jgd-bizelite-3cl-css' ||
    			myId === 'jgd-bizelite-3cr-mag-css' ||
    			myId === 'jgd-bizelite-3cl-mag-css' ) {
    		threeColExists = true;
    	}
    	if ( myId === 'jgd-bizelite-red-css' ) {
    		redExists = true;
    	}
	} );

	if( ( threeColExists === true ) && ( redExists === true ) ) {
		$( 'head' ).append( '<style type="text/css"> .widgettitle { background: url(' + templateDir + '/images/jgd-bizelite-assets.svg) no-repeat -306px -250px #FFFFFF; } </style>' );
	}

	// check for silver stylesheet with 3-column stylesheets
	var silverExists = false;
	var threeColExists = false;
	$( 'link' ).each( function() {
    	myId = this.id;
    	if (	myId === 'jgd-bizelite-3cr-css' ||
    			myId === 'jgd-bizelite-3cl-css' ||
    			myId === 'jgd-bizelite-3cr-mag-css' ||
    			myId === 'jgd-bizelite-3cl-mag-css') {
    		threeColExists = true;
    	}
    	if ( myId === 'jgd-bizelite-silver-css' ) {
    		silverExists = true;
    	}
	} );

	if( ( threeColExists === true ) && ( silverExists === true ) ) {
		$( 'head' ).append( '<style type="text/css"> .widgettitle { background: url(' + templateDir + '/images/jgd-bizelite-assets.svg) no-repeat -20px -297px #FFFFFF; </style>' );
	}

	// check for olive stylesheet with 3-column stylesheets
	var oliveExists = false;
	var threeColExists = false;
	$( 'link' ).each( function() {
    	var myId = this.id;
    	if (	myId === 'jgd-bizelite-3cr-css' ||
    			myId === 'jgd-bizelite-3cl-css' ||
    			myId === 'jgd-bizelite-3cr-mag-css' ||
    			myId === 'jgd-bizelite-3cl-mag-css' ) {
    		threeColExists = true;
    	}
    	if ( myId === 'jgd-bizelite-olive-css' ) {
			oliveExists = true;
		}
	} );

	if( ( threeColExists === true ) && ( oliveExists === true ) ) {
		$( 'head' ).append( '<style type="text/css"> .widgettitle { background: url(' + templateDir + '/images/jgd-bizelite-assets.svg) no-repeat -306px -297px #FFFFFF; } </style>' );
	}

	// Up and down button script to scroll to top and down to sidebar in tablet widths and below
	/* adapted from the code from the article "Using jQuery to add a dynamic Back To Top floating button with smooth scroll". See http://www.developerdrive.com/2013/07/using-jquery-to-add-a-dynamic-back-to-top-floating-button-with-smooth-scroll/ */

	var windowWidth = $( window ).width();

	function animateUpDownButtons() {
		var offset = 100;
		var duration250 = 250;
		var duration100 = 100;
		var upDownButtons = "#footer #up-down-buttons";
		var toTop = "#footer #to-top";
		var toBottom = "#footer #to-bottom";

		$( upDownButtons ).css( { "right" : "-72px" } );

		$( window ).scroll( function() {
			if ( $( this ).scrollTop() > offset ) {
				$( upDownButtons ).animate( { "right" : "0px" }, duration250 );
			} else {
				$( upDownButtons ).animate( { "right" : "-72px" }, duration100 );
			}
		} );

		$( toTop ).click( function ( event ) {
			event.preventDefault();
			$( "html, body" ).animate( { scrollTop: 0 }, duration250 );
			return false;
		} );

		$( toBottom ).click( function ( event ) {
			event.preventDefault();
			$( "html, body" ).animate( { scrollTop: $( "#primary" ).offset().top }, duration250 );
		} );
	}
	$( window ).load( animateUpDownButtons() );

	// Add separator to navigation dynamically, as WordPress's the_posts_navigation function does not support separators
	var navPrevious = ".nav-previous";

	$( navPrevious ).after( '<span class="nav-separator"></span>' );


	/* For the social media buttons in the header */
	/* This uses a modification of the method used in the tutorial "Social nav menus: Part 2" by Justin Tadlock */
	/* using the Themify icons for the social icons */
	/* http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2 */
	function socialMediaButtons() {
		if ( $( "#menu-social" ).length ) {
			var fbLink = $( '#menu-social li a[href*="facebook.com"]' );
			var twLink = $( '#menu-social li a[href*="twitter.com"]' );
			var instLink = $( '#menu-social li a[href*="instagram.com"]' );
			var pntLink = $( '#menu-social li a[href*="pinterest.com"]' );
			var ytLink = $( '#menu-social li a[href*="youtube.com"]' );
			var vimLink = $( '#menu-social li a[href*="vimeo.com"]' );
			var flkLink = $( '#menu-social li a[href*="flickr.com"]' );
			var gthbLink = $( '#menu-social li a[href*="github.com"]' );
			var gpLink = $( '#menu-social li a[href*="plus.google.com"]' );
			var tmbLink = $( '#menu-social li a[href*="tumblr.com"]' );
			var wpLink = $( '#menu-social li a[href*="wordpress.com"], #menu-social li a[href*="wordpress.org"]' );

			fbLink.addClass( 'ti-facebook' );
			twLink.addClass( 'ti-twitter-alt' );
			instLink.addClass( 'ti-instagram' );
			pntLink.addClass( 'ti-pinterest' );
			gthbLink.addClass( 'ti-github' );
			flkLink.addClass( 'ti-flickr-alt' );
			gpLink.addClass( 'ti-google' );
			tmbLink.addClass( 'ti-tumblr-alt' );
			wpLink.addClass( 'ti-wordpress' );
			ytLink.addClass( 'ti-youtube' );
			vimLink.addClass( 'ti-vimeo-alt' );
		}
	}
	$( window ).load( socialMediaButtons() );

	socialButtonUl = $( '#menu-social-items' );
	socialPanel = $( '#menu-social' );

	function addRevealButton() {
		socialPanel.append( '<button class="menu-down-arrow"></button>' );
	}

	function hideOverflow() {
		socialButtonUl.addClass( 'hide-overflow' ).removeClass( 'show-overflow' );
	}

	function showOverflow() {
		socialButtonUl.addClass( 'show-overflow' ).removeClass( 'hide-overflow' );
	}

	function socialMoreInit() {
		socialButtonUl.addClass( 'show-overflow' );
		if ( windowWidth >= 768 ) {
			overflowSwitch();
		}
	}

	function revealBtnHandler() {
		socialMoreButton = $( '#menu-social-items + .menu-down-arrow' );
		socialMoreButton.on( 'click', function() {
			socialButtonUl.toggleClass( 'hide-overflow show-overflow social-panel-expand' );
		} );
		//console.log( socialMoreButton );
	}

	function overflowSwitch() {
		if( socialPanel.width() === 200 ) {
			socialButtonUl.width( 164 ); // Social media ul width minus width of .menu-down-arrow button, styled to 36 x 36 px
			hideOverflow();
			socialMoreButton.css( 'display', 'inline-block' );
		} else if( socialPanel.width() === 280 ) {
			socialButtonUl.width( 280 );
			showOverflow();
			socialMoreButton.css( 'display', 'none' );
		} else {
			socialButtonUl.width( 'auto' );
			socialMoreButton.css( 'display', 'none' );
		}
	}

	var resizeId;

	$( window ).on( 'load', addRevealButton );
	$( window ).on( 'load', revealBtnHandler );
	$( window ).on( 'load', socialMoreInit );
	$( window ).resize( function() {
		clearTimeout(resizeId);
		resizeId = setTimeout( socialMoreInit, 500 );
	} );

} )( jQuery ); // ends function

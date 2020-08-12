( function ( $ ) {
	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.blog-title a' ).html( newval );
		} );
	} );

	// Update color schemes by adding and removing classes
	wp.customize( 'jgd_bizelite_style_choices', function( value ) {
		value.bind( function( newval ) {
			switch ( newval ) {
				case 'blue':
					$( 'body' ).addClass( 'blue' ).removeClass( 'green red silver olive' );
					break;
				case 'green':
					$( 'body' ).addClass( 'green' ).removeClass( 'blue red silver olive' );
					break;
				case 'red':
					$( 'body' ).addClass( 'red' ).removeClass( 'blue green silver olive' );
					break;
				case 'silver':
					$( 'body' ).addClass( 'silver' ).removeClass( 'blue green red olive' );
					break;
				case 'olive':
					$( 'body' ).addClass( 'olive' ).removeClass( 'blue green red silver' );
					break;
				default:
					$( 'body' ).removeClass( 'blue green red silver olive' );
			}
		} );
	} );

	wp.customize( 'jgd_bizelite_landing_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#main.texture' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'jgd_bizelite_light_text', function( value ) {
		value.bind( function( newval ) {
			var toggleText = ( true === newval ) ? $( 'body' ).addClass( 'light-text' ) : $( 'body' ).removeClass( 'light-text' );
		} );
	} );

	wp.customize( 'jgd_bizelite_hide_bg_texture', function( value ) {
		value.bind( function( newval ) {
			var toggleTexture = ( true === newval ) ? $( 'body' ).addClass( 'no-texture' ) : $( 'body' ).removeClass( 'no-texture' );
		} );
	} );

	wp.customize( 'jgd_bizelite_hide_decorations', function( value ) {
		value.bind( function( newval ) {
			var toggleDecs = ( true === newval ) ? $( 'body' ).addClass( 'no-decs' ) : $( 'body' ).removeClass( 'no-decs' );
		} );
	} );

	//Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.subtitle' ).html( newval );
		} );
	} );

	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( newval ) {
			if( 'blank' === newval ) {
				$( '.site-title-block' ).css( { 'padding' : '0px' } );
				$( '.site-title-block' ).css( { 'background-color' : 'transparent' } );
				/*$( '.site-title-block' ).css( { 'border-bottom' : 'transparent' } );*/
				$( '.blog-title a' ).css( { 'display' : 'block', 'text-indent' : '-9999px' } );
				$( '.subtitle' ).css( { 'text-indent' : '-9999px' } );
				$( '.blog-title a' ).css( { 'width' : '100%', 'height' : '240px' } );
			} else {
				$( '.site-title-block' ).css( { 'padding' : '20px 0px' } );
				if ( $( 'body' ).hasClass( 'blue' ) ) {
					$( 'body' ).addClass( 'blue' );
					$( '.site-title-block' ).css( { 'background-color' : 'rgba(0, 0, 83, 0.50)' } );
				} else if ( $( 'body' ).hasClass( 'green' ) ) {
					$( '.site-title-block' ).css( { 'background-color' : 'rgba(11, 61, 11, 0.50)' } );
				} else if ( $( 'body' ).hasClass( 'red' ) ) {
					$( '.site-title-block' ).css( { 'background-color' : 'rgba(90, 0, 0, 0.50)' } );
				} else if ( $( 'body' ).hasClass( 'silver' ) ) {
					$( '.site-title-block' ).css( { 'background-color' : 'rgba(128, 128, 128, 0.50)' } );
				} else if ( $( 'body' ).hasClass( 'olive' ) ) {
					$( '.site-title-block' ).css( { 'background-color' : 'rgba(83, 83, 0, 0.50)' } );
				} else {
					$( '.site-title-block' ).css( { 'background-color' : 'rgba(0, 0, 0, 0.50)' } );
				}
				$( '.site-title-block' ).css( { 'border-bottom' : '2px solid rgba(255, 255, 255, 0.25)' } );
				$( '.blog-title a, .subtitle' ).css( { 'position' : 'static', 'text-indent' : '0px' } );
				if ( jbeCustomizer.logo_alignment === 'center' ) {
					$( '.custom-logo-link + .site-title-block' ).css( { 'position' : 'absolute', 'left' : '-9999px' } );
				}
				$( '.blog-title a' ).css( { 'display' : 'inline', 'width' : 'auto', 'height' : 'auto' } );
			}
		} );
	} );

	//Update site title color in real time...
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( newval ) {
			$( '.blog-title a:link, .blog-title a:visited' ).css( 'color', newval );
			$( '.subtitle' ).css( 'color', newval );
		} );
	} );

	//Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'background-color', newval );
		} );
	} );

	/* Custom settings and controls */
	// Update content and sidebar background color
	wp.customize( 'jgd_bizelite_content_sidebar_bgcolor', function( value ) {
		value.bind( function( newval ) {
			$( '.texture' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'jgd_bizelite_footer_info', function( value ) {
		value.bind( function( newval ) {
			$( '.site-info > p' ).html( newval );
		} );
	} );

	// Update layouts by adding and removing classes
	wp.customize( 'jgd_bizelite_layout_choices', function( value ) {
		value.bind( function( newval ) {
			switch ( newval ) {
				case '3cr':
					$( 'body' ).addClass( 'three-col-r' ).removeClass( 'two-col-l three-col-l' );
					break;
				case '2cl':
					$( 'body' ).addClass( 'two-col-l' ).removeClass( 'three-col-r three-col-l' );
					break;
				case '3cl':
					$( 'body' ).addClass( 'three-col-l' ).removeClass( 'three-col-r two-col-l' );
					break;
				default:
					$( 'body' ).removeClass( 'three-col-r two-col-l three-col-l' );
			}
		} );
	} );

} ) ( jQuery );

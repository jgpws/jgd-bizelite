( function ( $ ) {
	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.blog-title a' ).html( newval );
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
				$( '#site-title-block' ).css( { 'padding' : '0px' } );
				$( '#site-title-block' ).css( { 'background-color' : 'transparent' } );
				$( '#site-title-block' ).css( { 'border-bottom' : 'transparent' } );
				$( '.blog-title a' ).css( { 'display' : 'block', 'text-indent' : '-9999px' } );
				$( '.subtitle' ).css( { 'text-indent' : '-9999px' } );
				$( '.blog-title a' ).css( { 'width' : '100%', 'height' : '240px' } );
			} else {
				$( '#site-title-block' ).css( { 'padding' : '20px 0px' } );
				if ( jbeCustomizer.color_styles === 'blue' ) {
					$( '#site-title-block' ).css( { 'background-color' : 'rgba(0, 0, 83, 0.50)' } );
				} else if ( jbeCustomizer.color_styles === 'green' ) {
					$( '#site-title-block' ).css( { 'background-color' : 'rgba(11, 61, 11, 0.50)' } );
				} else if ( jbeCustomizer.color_styles === 'red' ) {
					$( '#site-title-block' ).css( { 'background-color' : 'rgba(90, 0, 0, 0.50)' } );
				} else if ( jbeCustomizer.color_styles === 'silver' ) {
					$( '#site-title-block' ).css( { 'background-color' : 'rgba(128, 128, 128, 0.50)' } );
				} else if ( jbeCustomizer.color_styles === 'olive' ) {
					$( '#site-title-block' ).css( { 'background-color' : 'rgba(83, 83, 0, 0.50)' } );
				} else {
					$( '#site-title-block' ).css( { 'background-color' : 'rgba(0, 0, 0, 0.50)' } );
				}
				$( '#site-title-block' ).css( { 'border-bottom' : '2px solid rgba(255, 255, 255, 0.25)' } );
				$( '.blog-title a, .subtitle' ).css( { 'position' : 'static', 'text-indent' : '0px' } );
				if ( jbeCustomizer.logo_alignment === 'center' ) {
					$( '.custom-logo-link + #site-title-block' ).css( { 'position' : 'absolute', 'left' : '-9999px' } );
				}
				$( '.blog-title a' ).css( { 'display' : 'inline', 'width' : 'auto', 'height' : 'auto' } );
			}
		} );
	} );
	
	//Update site title color in real time...
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( newval ) {
			$('.blog-title a:link, .blog-title a:visited').css('color', newval );
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
			$( '#site-info > p' ).html( newval );
		} );
	} );
	
} ) ( jQuery );
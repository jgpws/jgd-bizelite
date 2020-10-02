/**
 * Scripts to alter the behavior of Customizer controls.
 */

( function( $ ) {

  wp.customize( 'jgd_bizelite_apply_landing_page_1', function( setting ) {
    setting.bind( function( pageId ) {
      pageId = parseInt( pageId, 10 );
      var url;
      if ( pageId > 0 ) {
        url = wp.customize.settings.url.home + '?page_id=' + pageId;
        wp.customize.previewer.previewUrl.set( url );
        //console.log( url );
      }

    } );
  } );

  wp.customize( 'jgd_bizelite_apply_landing_page_2', function( setting ) {
    setting.bind( function( pageId ) {
      pageId = parseInt( pageId, 10 );
      var url;
      if ( pageId > 0 ) {
        url = wp.customize.settings.url.home + '?page_id=' + pageId;
        wp.customize.previewer.previewUrl.set( url );
        //console.log( url );
      }
    } );
  } );

  wp.customize( 'jgd_bizelite_apply_landing_page_3', function( setting ) {
    setting.bind( function( pageId ) {
      pageId = parseInt( pageId, 10 );
      var url;
      if ( pageId > 0 ) {
        url = wp.customize.settings.url.home + '?page_id=' + pageId;
        wp.customize.previewer.previewUrl.set( url );
        //console.log( url );
      }
    } );
  } );

  wp.customize.bind( 'ready', function() {

    function hideLandingPageOptions1() {
      var lPControlIds1 = [
        'jgd_bizelite_apply_landing_page_1',
        'jgd_bizelite_landing_bg_1',
        'jgd_bizelite_show_landing_bg_gutenberg_1',
        'jgd_bizelite_landing_light_text_1'
      ];

      //console.log( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() );

      if ( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() !== 'lp_one' ) {
        $.each( lPControlIds1, function( i, value ) {
          $( '#customize-control-' + value ).hide();
        } );
      } else {
        $.each( lPControlIds1, function( i, value ) {
          $( '#customize-control-' + value ).show();
        } );
      }

      return hideLandingPageOptions1;
    }

    function hideLandingPageOptions2() {
      var lPControlIds2 = [
        'jgd_bizelite_apply_landing_page_2',
        'jgd_bizelite_landing_bg_2',
        'jgd_bizelite_show_landing_bg_gutenberg_2',
        'jgd_bizelite_landing_light_text_2'
      ];

      if ( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() !== 'lp_two' ) {
        $.each( lPControlIds2, function( i, value ) {
          $( '#customize-control-' + value ).hide();
        } );
      } else {
        $.each( lPControlIds2, function( i, value ) {
          $( '#customize-control-' + value ).show();
        } );
      }

      return hideLandingPageOptions2;
    }

    function hideLandingPageOptions3() {
      var lPControlIds3 = [
        'jgd_bizelite_apply_landing_page_3',
        'jgd_bizelite_landing_bg_3',
        'jgd_bizelite_show_landing_bg_gutenberg_3',
        'jgd_bizelite_landing_light_text_3'
      ];

      if ( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() !== 'lp_three' ) {
        $.each( lPControlIds3, function( i, value ) {
          $( '#customize-control-' + value ).hide();
        } );
      } else {
        $.each( lPControlIds3, function( i, value ) {
          $( '#customize-control-' + value ).show();
        } );
      }

      return hideLandingPageOptions3;
    }

    function loadLanding1Url() {
      //console.log( wp.customize.instance( 'jgd_bizelite_apply_landing_page_1' ).get() );
      //console.log( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() );

      if ( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() === 'lp_one' ) {
        var url;
        pageId = wp.customize.instance( 'jgd_bizelite_apply_landing_page_1' ).get();

        if ( pageId > 0 ) {
          url = wp.customize.settings.url.home + '?page_id=' + pageId;
          wp.customize.previewer.previewUrl.set( url );
          console.log( url );
        }

      }

    }

    function loadLanding2Url() {

      if ( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() === 'lp_two' ) {
        var url;
        pageId = wp.customize.instance( 'jgd_bizelite_apply_landing_page_2' ).get();

        if ( pageId > 0 ) {
          url = wp.customize.settings.url.home + '?page_id=' + pageId;
          wp.customize.previewer.previewUrl.set( url );
          console.log( url );
        }

      }

    }

    function loadLanding3Url() {

      if ( wp.customize.instance( 'jgd_bizelite_select_landing_page' ).get() === 'lp_three' ) {
        var url;
        pageId = wp.customize.instance( 'jgd_bizelite_apply_landing_page_3' ).get();

        if ( pageId > 0 ) {
          url = wp.customize.settings.url.home + '?page_id=' + pageId;
          wp.customize.previewer.previewUrl.set( url );
          console.log( url );
        }

      }

    }

    // Call functions on page load
    hideLandingPageOptions1();
    hideLandingPageOptions2();
    hideLandingPageOptions3();

    // Load these functions only if Landing Page section is is expanded
    wp.customize.section( 'jgd_bizelite_landing', function( section ) {
      section.expanded.bind( function( isExpanded ) {
        if ( isExpanded ) {
          loadLanding1Url();
          loadLanding2Url();
          loadLanding3Url();
        }
      } );
    } );

    // and on Change
    $( '#customize-control-jgd_bizelite_select_landing_page' ).on( 'change', hideLandingPageOptions1 );
    $( '#customize-control-jgd_bizelite_select_landing_page' ).on( 'change', loadLanding1Url );
    $( '#customize-control-jgd_bizelite_select_landing_page' ).on( 'change', hideLandingPageOptions2 );
    $( '#customize-control-jgd_bizelite_select_landing_page' ).on( 'change', loadLanding2Url );
    $( '#customize-control-jgd_bizelite_select_landing_page' ).on( 'change', hideLandingPageOptions3 );
    $( '#customize-control-jgd_bizelite_select_landing_page' ).on( 'change', loadLanding3Url );
  } );

} ) ( jQuery );

<?php
/*
 * Customizer overrides for the block editor.
  */

  function jgd_bizelite_custom_editor_style() {
    $css = '';
  	$preview_page_bg_1 = get_theme_mod( 'jgd_bizelite_show_landing_bg_gutenberg_1', 0 );
    $preview_page_bg_2 = get_theme_mod( 'jgd_bizelite_show_landing_bg_gutenberg_2', 0 );
    $preview_page_bg_3 = get_theme_mod( 'jgd_bizelite_show_landing_bg_gutenberg_3', 0 );

    $landing_page_id_1 = get_theme_mod( 'jgd_bizelite_select_landing_page_1' );
  	$landing_page_id_2 = get_theme_mod( 'jgd_bizelite_select_landing_page_2' );
  	$landing_page_id_3 = get_theme_mod( 'jgd_bizelite_select_landing_page_3' );

  	$landing_page_bg_1 = get_theme_mod( 'jgd_bizelite_landing_bg_1', '#ffffff' );
    $landing_page_bg_2 = get_theme_mod( 'jgd_bizelite_landing_bg_2', '#ffffff' );
    $landing_page_bg_3 = get_theme_mod( 'jgd_bizelite_landing_bg_3', '#ffffff' );

  	$light_text_landing_1 = get_theme_mod( 'jgd_bizelite_landing_light_text_1', 0 );
    $light_text_landing_2 = get_theme_mod( 'jgd_bizelite_landing_light_text_2', 0 );
    $light_text_landing_3 = get_theme_mod( 'jgd_bizelite_landing_light_text_3', 0 );

  	if ( $preview_page_bg_1 == 1 ) {
        $css = '
  .editor-styles-wrapper {
  	background-color: ' . esc_attr( $landing_page_bg_1 ) . ' !important;
  }';
    }

    if ( $preview_page_bg_2 == 1 ) {
      $css = '
  .editor-styles-wrapper {
  	background-color: ' . esc_attr( $landing_page_bg_2 ) . ' !important;
  }';
    }

    if ( $preview_page_bg_3 == 1 ) {
      $css = '
  .editor-styles-wrapper {
    background-color: ' . esc_attr( $landing_page_bg_3 ) . ' !important;
  }';
    }

  	if ( $light_text_landing_1 == 1 || $light_text_landing_2 == 1 || $light_text_landing_3 ) {
  		$css .= '
  .editor-styles-wrapper {
  	color: #f5f5f5 !important;
  }

  .editor-styles-wrapper a:link,
  .editor-styles-wrapper a:visited {
  	color: #ffffff !important;
  }

  .editor-styles-wrapper a:hover,
  .editor-styles-wrapper a:active {
  	color: #f5f5f5 !important;
  }

  .editor-styles-wrapper blockquote,
  .editor-styles-wrapper pre {
  	background-color: #404040 !important;
  }

  .editor-styles-wrapper pre {
  	color: #f5f5f5;
  }

  .editor-styles-wrapper figcaption {
  	color: #f5f5f5;
  }

  .editor-styles-wrapper table,
  .editor-styles-wrapper table th,
  .editor-styles-wrapper table td {
  	border-color: #808080 !important;
  }

  .editor-styles-wrapper .wp-block-quote__citation {
  	color: #f5f5f5;
  }

  .editor-styles-wrapper .wp-block-file {
  	background-color: #404040;
  }

  .editor-styles-wrapper .wp-block-pullquote.is-style-default blockquote,
  .editor-styles-wrapper .wp-block-pullquote.is-style-solid-color blockquote {
  	background-color: transparent !important;
  	color: #f5f5f5;
  }

  .editor-styles-wrapper .wp-block-table.is-style-stripes tbody tr:nth-child(2n + 1) {
  	background-color: #404040;
  }

  .editor-styles-wrapper .wp-block-calendar table th {
  	color: #333333;
  }

  .editor-styles-wrapper .wp-block-calendar .wp-calendar-table {
  	background-color: #404040 !important;
  }

  .editor-styles-wrapper .wp-block-calendar table tbody {
  	color: #f5f5f5;
  }';
  	}

  	return $css;
  }

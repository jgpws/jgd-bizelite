<?php
/*
 * Customizer overrides (Page Templates) for the block editor.
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

  	$light_text_landing_1 = get_theme_mod( 'jgd_bizelite_show_landing_fg_gutenberg_1', 0 );
    $light_text_landing_2 = get_theme_mod( 'jgd_bizelite_show_landing_fg_gutenberg_2', 0 );
    $light_text_landing_3 = get_theme_mod( 'jgd_bizelite_show_landing_fg_gutenberg_3', 0 );

  	if ( $preview_page_bg_1 == 1 ) {
        $css = '
  .editor-styles-wrapper {
  	background-color: ' . esc_attr( $landing_page_bg_1 ) . ';
  }';
    }

    if ( $preview_page_bg_2 == 1 ) {
      $css = '
  .editor-styles-wrapper {
  	background-color: ' . esc_attr( $landing_page_bg_2 ) . ';
  }';
    }

    if ( $preview_page_bg_3 == 1 ) {
      $css = '
  .editor-styles-wrapper {
    background-color: ' . esc_attr( $landing_page_bg_3 ) . ';
  }';
    }

  	if ( $light_text_landing_1 == 1 || $light_text_landing_2 == 1 || $light_text_landing_3 == 1 ) {
  		$css .= '
  .editor-styles-wrapper {
  	color: #cccccc;
  }

  .editor-styles-wrapper a {
  	color: #e6e6e6;
  }

  .editor-styles-wrapper a:hover,
  .editor-styles-wrapper a:active {
  	color: #ffffff;
  }

  .editor-styles-wrapper blockquote,
  .editor-styles-wrapper pre {
  	background-color: #4d4d4d;
  }

  .editor-styles-wrapper pre {
  	color: #ffffff;
  }

  .editor-styles-wrapper table,
  .editor-styles-wrapper table th,
  .editor-styles-wrapper table td {
  	border-color: #666666;
  }

  .editor-styles-wrapper hr,
  .editor-styles-wrapper .wp-block-separator {
    border-color: rgba(255, 255, 255, 0.25);
  }

  .editor-styles-wrapper .wp-block-quote__citation {
  	color: #f5f5f5;
  }

  .editor-styles-wrapper .wp-block-file {
  	background-color: #4d4d4d;
  }

  .editor-styles-wrapper .wp-block .is-style-outline .wp-block-button__link {
    color: #ffffff;
  }

  .editor-styles-wrapper .wp-block .is-style-outline .wp-block-button__link:hover,
  .editor-styles-wrapper .wp-block .is-style-outline .wp-block-button__link:active {
    color: #333333;
  }

  .editor-styles-wrapper .wp-block-pullquote.is-style-default blockquote,
  .editor-styles-wrapper .wp-block-pullquote.is-style-solid-color blockquote {
  	background-color: transparent !important;
  	color: #cccccc;
  }

  .editor-styles-wrapper .wp-block-table figcaption {
    color: #cccccc;
  }

  .editor-styles-wrapper .wp-block-table.is-style-stripes tbody tr:nth-child(2n + 1) {
  	background-color: #4d4d4d;
  }

  .editor-styles-wrapper .wp-block-table.is-style-stripes th,
  .editor-styles-wrapper .wp-block-table.is-style-stripes td {
    border-color: #666666;
  }

  .editor-styles-wrapper .wp-block-calendar table th {
  	color: #333333;
  }

  .editor-styles-wrapper .wp-block-calendar .wp-calendar-table {
  	background-color: #4d4d4d;
  }

  .editor-styles-wrapper .wp-block-calendar table tbody {
  	color: #cccccc;
  }';
    }

  	return $css;
  }

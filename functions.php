<?php
function jgd_bizelite_setup() {
	/* for theme localization */
	load_theme_textdomain( 'jgd-bizelite' );

	/* WordPress page/post title tags */
	add_theme_support( 'title-tag' );

	/* Post thumbnails */
	add_theme_support( 'post-thumbnails' );

	/* automatic feed links */
	add_theme_support( 'automatic-feed-links' );

	/* Selective refresh */
  add_theme_support( 'customize-selective-refresh-widgets' );

  /* HTML5 markup */
  add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'gallery',
    'caption',
    'style',
    'script'
  ) );

  /* Responsive embeds */
 add_theme_support( 'responsive-embeds' ); 

	/* Custom menus */
	register_nav_menus(
		array(
			'header_one' => __( 'Header First Menu', 'jgd-bizelite' ),
			'header_two' => __( 'Header Second Menu', 'jgd-bizelite' ),
			'social_profiles' => __( 'Social Profiles', 'jgd-bizelite' ),
		)
	);

	/* Custom Background */
	add_theme_support( 'custom-background' );

	/* Custom Header */
	// gets included in the site header
	// also see the function jgd_bizelite_header_style, below
	$args = array(
		'default-image' => get_template_directory_uri() . '/images/waves-bg-large.png',
		'width' => 1920,
		'height' => 240,
		'uploads' => true,
		'header-text' => true,
		'default-text-color' => 'ffffff'
	);
	add_theme_support( 'custom-header', $args );

	$defaults = array(
		'flex-height' => true,
		'flex-width' => true,
	);
	add_theme_support( 'custom-logo', $defaults );

	$header_images = array(
		'waves' => array(
			'url' => get_template_directory_uri() . '/images/waves-bg-large.png',
			'thumbnail_url' => get_template_directory_uri() . '/images/waves-bg-large-thumbnail.png',
			'description' => 'Waves',
		),
	);
	register_default_headers( $header_images );

	/* WooCommerce compatibility */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

	/* Gutenberg */
  add_theme_support( 'align-wide' );

  // Editor Color palette
  // Found in inc/gutenberg-colors.php 
  jgd_bizelite_gutenberg_colors();
}
add_action( 'after_setup_theme', 'jgd_bizelite_setup' );

/* Enqueue all styles */
function jgd_bizelite_enqueue_styles() {
	wp_register_style( 'jgd-bizelite-main-stylesheet', get_template_directory_uri() . '/style.min.css' );
	wp_enqueue_style( 'jgd-bizelite-main-stylesheet' );
  wp_enqueue_style( 'jgd-bizelite-gutenberg-colors-frontend', get_template_directory_uri() . '/css/gutenberg-colors.min.css' );
  wp_enqueue_style( 'jgd-bizelite-icons', get_template_directory_uri() . '/vendor/themify-icons.css' );
  if ( is_woocommerce_activated() ) {
    wp_enqueue_style( 'jgd-bizelite-woocommerce', get_template_directory_uri() . '/css/jgd-woocommerce.min.css', array(), filemtime( get_template_directory() . '/css/jgd-woocommerce.min.css' ) );
    wp_enqueue_style( 'jgd-bizelite-woocommerce-colors', get_template_directory_uri() . '/css/jgd-woocommerce-colors.min.css', array(), filemtime( get_template_directory() . '/css/jgd-woocommerce-colors.min.css' ) );
  }
}

/* Enqueue JavaScript files */
function jgd_bizelite_enqueue_scripts() {
	wp_register_script(
		'jgd-bizelite-script',
		get_template_directory_uri() . '/scripts/jgd-bizelite-scripts.min.js',
		array('jquery'),
      filemtime( get_template_directory() . '/scripts/jgd-bizelite-scripts.min.js' ), true
	);

	$params = array(
		'templateDir' => get_template_directory_uri(),
	);
	wp_localize_script( 'jgd-bizelite-script', 'jgd_bizelite_ScriptParams', $params );
	//enqueue the script
	wp_enqueue_script( 'jgd-bizelite-script' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'jgd_bizelite_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_enqueue_scripts' );

/* Individual stylesheets for our color schemes */
function jgd_bizelite_color_schemes() {
  $color_choices = get_theme_mod( 'jgd_bizelite_style_choices', 'none' );
  $light_text = get_theme_mod( 'jgd_bizelite_light_text', 0 );
  $no_texture = get_theme_mod( 'jgd_bizelite_hide_bg_texture', 0 );
  $hide_decs = get_theme_mod( 'jgd_bizelite_hide_decorations', 0 );
  
  switch ( $color_choices ) {
    case 'blue':
      wp_enqueue_style( 'jgd-bizelite-blue', get_theme_file_uri( 'css/color-schemes/blue.min.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/blue.min.css' ) );
      break;
    case 'green':
      wp_enqueue_style( 'jgd-bizelite-green', get_theme_file_uri( 'css/color-schemes/green.min.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/green.min.css' ) );
      break;
    case 'red': 
      wp_enqueue_style( 'jgd-bizelite-red', get_theme_file_uri( 'css/color-schemes/red.min.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/red.min.css' ) );
    case 'silver':
      wp_enqueue_style( 'jgd-bizelite-silver', get_theme_file_uri( 'css/color-schemes/silver.min.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/silver.min.css' ) );
      break;
    case 'olive':
      wp_enqueue_style( 'jgd-bizelite-olive', get_theme_file_uri( 'css/color-schemes/olive.min.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/olive.min.css' ) );
      break;
    default:
      // Do nothing.
      break;
  }

  if ( $light_text == 1 ) {
    wp_enqueue_style( 'jgd-bizelite-light-text', get_theme_file_uri( 'css/color-schemes/light-text.min.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/light-text.min.css' ) );
  }

  if ( $hide_decs == 1 || $no_texture == 1 ) { 
    wp_enqueue_style( 'jgd-bizelite-hide-decorations', get_theme_file_uri( 'css/color-schemes/no-decs.css' ), array( 'jgd-bizelite-main-stylesheet' ), filemtime( get_template_directory() . '/css/color-schemes/no-decs.css' ) );
  }
}
add_action( 'wp_enqueue_scripts', 'jgd_bizelite_color_schemes' );

/* Gutenberg editor styles that match front end */
function jgd_bizelite_editor_style() {
	wp_enqueue_style( 'jgd-bizelite-editor-styles', get_theme_file_uri( '/css/editor-style.css' ), false );
	wp_add_inline_style( 'jgd-bizelite-editor-styles', jgd_bizelite_custom_editor_style() );
}
add_action( 'enqueue_block_editor_assets', 'jgd_bizelite_editor_style' );

require_once get_template_directory() . '/inc/gutenberg-colors.php';

function jgd_bizelite_gutenberg_overrides() {
	$color_choices = get_theme_mod( 'jgd_bizelite_style_choices', 'none' );
	wp_enqueue_style( 'jgd-bizelite-gutenberg-style', get_template_directory_uri() . '/css/gutenberg-editor-style.css', false );
	wp_enqueue_style( 'jgd-bizelite-gutenberg-colors', get_template_directory_uri() . '/css/gutenberg-colors.css', false );

	switch ( $color_choices ) {
		case 'blue':
			wp_enqueue_style( 'jgd-bizelite-gutenberg-override-blue', get_template_directory_uri() . '/css/editor-style-blue.css', array( 'jgd-bizelite-gutenberg-style' ), '', false );
			break;
		case 'green':
			wp_enqueue_style( 'jgd-bizelite-gutenberg-override-green', get_template_directory_uri() . '/css/editor-style-green.css', array( 'jgd-bizelite-gutenberg-style' ), '', false );
			break;
		case 'red':
			wp_enqueue_style( 'jgd-bizelite-gutenberg-override-red', get_template_directory_uri() . '/css/editor-style-red.css', array( 'jgd-bizelite-gutenberg-style' ), '', false );
			break;
		case 'silver':
			wp_enqueue_style( 'jgd-bizelite-gutenberg-override-silver', get_template_directory_uri() . '/css/editor-style-silver.css', array( 'jgd-bizelite-gutenberg-style' ), '', false );
			break;
		case 'olive':
			wp_enqueue_style( 'jgd-bizelite-gutenberg-override-olive', get_template_directory_uri() . '/css/editor-style-olive.css', array( 'jgd-bizelite-gutenberg-style' ), '', false );
			break;
		default:
			// do nothing
			break;
	}
}
add_action( 'enqueue_block_editor_assets', 'jgd_bizelite_gutenberg_overrides' );

require_once get_template_directory() . '/inc/page-template-customizer-overrides.php';


/* content width */
if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

/* widgetizing for the sidebars */
// Primary sidebar
function jgd_bizelite_primary_sidebar_init() {
	register_sidebar( array (
	'name' => esc_html__( 'Primary Widgets', 'jgd-bizelite' ),
	'id' => 'primary_widget_area',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
	) );
}

// Secondary sidebar
function jgd_bizelite_secondary_sidebar_init() {
	register_sidebar( array (
	'name' => esc_html__( 'Secondary Widgets', 'jgd-bizelite' ),
	'id' => 'secondary_widget_area',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
	) );
}

// WooCommerce sidebar
function jgd_bizelite_wc_sidebar_init() {
	if ( is_woocommerce_activated() ) {
		register_sidebar( array(
			'name' => esc_html__( 'WooCommerce Widgets', 'jgd-bizelite' ),
			'id' => 'wc_widget_area',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		) );
	}
}

add_action( 'widgets_init', 'jgd_bizelite_primary_sidebar_init' );
add_action( 'widgets_init', 'jgd_bizelite_secondary_sidebar_init' );
add_action( 'widgets_init', 'jgd_bizelite_wc_sidebar_init' );

/* WooCommerce functions */
/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/* Template hooks */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Begins Main Wrapper
add_action( 'woocommerce_before_main_content', function() {
  echo '<main id="main" class="main texture">';
}, 5 );

// Begins Inner Content Container (before breadcrumbs)
add_action( 'woocommerce_before_main_content', function() {
  echo '<section id="content" class="content">';
}, 15 );

// Ends Inner Container (after pagination)
add_action( 'woocommerce_after_shop_loop', function() {
  echo '</section><!-- #content -->';
}, 20 );

/* Custom sidebar */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action( 'woocommerce_after_main_content', 'jgd_bizelite_wc_sidebar_switcher', 5 );

// Ends Main Wrapper
add_action( 'woocommerce_after_main_content', function() {
  echo '</main><!-- #main -->';
}, 10 );


/* Jetpack Responsive Videos- Requires the Jetpack plugin to be installed and activated */
function jgd_bizelite_responsive_videos_setup() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'jgd_bizelite_responsive_videos_setup' );

/* Add a class to the content "more" link */
function jgd_bizelite_add_morelink_class( $link ) {
	return str_replace(
		'more-link',
		'more-link button-primary',
		$link
	);
}
add_action( 'the_content_more_link', 'jgd_bizelite_add_morelink_class' );

/* Add a class to the comment reply link */
function jgd_bizelite_add_comment_reply_link_class( $content ) {
	$classes = 'button-primary';
	return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $classes, $content );
}
add_filter( 'comment_reply_link', 'jgd_bizelite_add_comment_reply_link_class', 99 );

/* Functions for the Customizer */
function jgd_bizelite_pages_default() {
	wp_page_menu( array(
    'menu_class' => 'pagemenu pagemenu-vertical is-zero-height',
    'menu_id' => 'menu-one',
		'before' => '<ul class="menu">',
		'after' => '</ul>',
	) );
}

function jgd_bizelite_cats_default() { ?>
	<div id="menu-two" class="pagemenu pagemenu-vertical is-zero-height">
		<ul class="menu">
			<?php wp_list_categories('title_li='); ?>
		</ul>
	</div><!-- .catmenu -->
<?php
}

/* Filters for the body class and Customizer */
function jgd_bizelite_body_classes( $classes ) {
	// Color choices
	$color_scheme = get_theme_mod( 'jgd_bizelite_style_choices', 'none' );

	switch ( $color_scheme ) {
		case 'blue':
			$classes[] = 'blue';
			break;
		case 'green':
			$classes[] = 'green';
			break;
		case 'red':
			$classes[] = 'red';
			break;
		case 'silver':
			$classes[] = 'silver';
			break;
		case 'olive':
			$classes[] = 'olive';
			break;
		default:
			$classes[] = '';
			break;
	}

	// Layout choices
	$column_layout = get_theme_mod( 'jgd_bizelite_layout_choices', 'none' );
	$layout_style = get_theme_mod( 'jgd_bizelite_mag_choices', 'blog' );
	$wc_sidebar = get_theme_mod( 'jgd_bizelite_woocommerce_sidebar', 'default_sidebar' );

	if ( ( is_woocommerce_activated() && is_woocommerce() ) && $wc_sidebar == 'wc_sidebar' ) {
		switch ( $column_layout ) {
			case '3cr':
				$classes[] = '';
				break;
			case '3cl':
				$classes[] = 'two-col-l';
				break;
			default:
				$classes[] = '';
				break;
		}
	} else {
		switch( $column_layout ) {
			case '3cr':
				$classes[] = 'three-col-r';
				break;
			case '2cl':
				$classes[] = 'two-col-l';
				break;
			case '3cl':
				$classes[] = 'three-col-l';
				break;
			default:
				$classes[] = '';
				break;
		}
	}

	switch( $layout_style ) {
		case 'blog_wide':
			$classes[] = 'blog-wide';
			break;
		case 'magazine_1':
			if ( ! is_singular() ) {
				$classes[] = 'mag-grid';
			}
			break;
		case 'magazine_2':
			if ( ! is_singular() ) {
				$classes[] = 'mag-featured';
			}
			break;
		default:
			$classes[] = '';
			break;
	}

	if ( get_header_image() != '' ) {
		$classes[] = 'custom-header';
	}

	$light_text = get_theme_mod( 'jgd_bizelite_light_text', 0 );
	$light_text_landing_1 = get_theme_mod( 'jgd_bizelite_landing_light_text_1', 0 );
	$light_text_landing_2 = get_theme_mod( 'jgd_bizelite_landing_light_text_2', 0 );
	$light_text_landing_3 = get_theme_mod( 'jgd_bizelite_landing_light_text_3', 0 );
	$texture = get_theme_mod( 'jgd_bizelite_hide_bg_texture', 0 );
	$decorations = get_theme_mod( 'jgd_bizelite_hide_decorations', 0 );
	$landing_page_id_1 = get_theme_mod( 'jgd_bizelite_apply_landing_page_1', 0 );
	$landing_page_id_2 = get_theme_mod( 'jgd_bizelite_apply_landing_page_2', 0 );
	$landing_page_id_3 = get_theme_mod( 'jgd_bizelite_apply_landing_page_3', 0 );

	if( $light_text == 1 ) {
		$classes[] = 'light-text';
	}

	if ( is_page_template( 'page-templates/landing.php' ) && $light_text_landing_1 == 1 && is_page( $landing_page_id_1 ) ) {
		$classes[] = 'light-text';
	}

	if ( is_page_template( 'page-templates/landing.php' ) && $light_text_landing_2 == 1 && is_page( $landing_page_id_2 ) ) {
		$classes[] = 'light-text';
	}

	if ( is_page_template( 'page-templates/landing.php' ) && $light_text_landing_3 == 1 && is_page( $landing_page_id_3 ) ) {
		$classes[] = 'light-text';
	}

	if ( $texture == 1 ) {
		$classes[] = 'no-texture';
	}

	if ( $decorations == 1 ) {
		$classes[] = 'no-decs';
	}

	return $classes;
}
add_filter( 'body_class', 'jgd_bizelite_body_classes' );

function jgd_bizelite_post_classes( $classes ) {
	$layout_style = get_theme_mod( 'jgd_bizelite_mag_choices', 'blog' );

	switch ( $layout_style ) {
		case 'blog':
			$classes[] = 'post-blog';
			break;
		case 'blog_wide':
			$classes[] = 'post-blog';
			break;
		case 'magazine_1':
			if( !is_singular() ) {
				$classes[] = 'post-grid';
				break;
			} else {
				$classes[] = 'post-blog';
				break;
			}
		case 'magazine_2':
			$classes[] = 'clearfix';
			if ( is_singular() ) {
				$classes[] = 'post-blog';
				break;
			}
		default:
			$classes[] = '';
			break;
	}

	return $classes;
}
add_filter( 'post_class', 'jgd_bizelite_post_classes' );

/* Exclude pages from search results */
/* https://www.wpbeginner.com/wp-tutorials/how-to-exclude-pages-from-wordpress-search-results/
 */
if ( !is_admin() ) {
	function jgd_bizelite_search_filter( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post_type', 'post' );
		}
		return $query;
	}
	add_filter( 'pre_get_posts', 'jgd_bizelite_search_filter' );
}

/* Remove inline styling in gallery code when a gallery is displayed, so the code validates */
add_filter( 'use_default_gallery_style', '__return_false' );

/* Remove 10px to the right of captions */
function jgd_bizelite_remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'jgd_bizelite_remove_caption_padding' );

/* load external theme options file */
include ( get_template_directory() . '/options/jgd_bizelite_customizer.php' );

include ( get_template_directory() . '/options/jgd_bizelite_customizer-frontend.php');
